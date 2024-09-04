import sys
import json
import requests
from bs4 import BeautifulSoup
from google.cloud import language_v1


client = None

def initialize_client():
    global client
    client = language_v1.LanguageServiceClient()

def fetch_url_content(url):
    try:
        response = requests.get(url)
        response.raise_for_status()

        soup = BeautifulSoup(response.text, 'html.parser')

        content = soup.get_text(separator=' ', strip=True)
        return content
    except requests.exceptions.RequestException as e:
        print(json.dumps({"error": f"Error fetching URL content: {str(e)}"}))
        sys.exit(1)

def extract_entities(content):
    document = language_v1.Document(content=content, type_=language_v1.Document.Type.PLAIN_TEXT)
    response = client.analyze_entities(document=document)

    entities = []
    for entity in response.entities:
        entities.append({
            'name': entity.name,
            'type': language_v1.Entity.Type(entity.type_).name,
            'salience': entity.salience,
        })
    
    entities = sorted(entities, key=lambda x: x['salience'], reverse=True)[:5]

    return entities

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "URL not provided"}))
        sys.exit(1)

    url = sys.argv[1]
    content = fetch_url_content(url)
    entities = extract_entities(content)
    print(json.dumps(entities, ensure_ascii=False, indent=2))

if __name__ == '__main__':
    initialize_client()
    main()
