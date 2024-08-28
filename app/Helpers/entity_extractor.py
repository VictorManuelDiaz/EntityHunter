import sys
import json
from google.cloud import language_v1


client = None

def initialize_client():
    global client
    client = language_v1.LanguageServiceClient()

def fetch_url_content(url):
    return "This is a sample content from the URL."

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

    return entities

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "URL not provided"}))
        sys.exit(1)

    url = sys.argv[1]
    content = fetch_url_content(url)
    entities = extract_entities(content)
    print(json.dumps(entities))

if __name__ == '__main__':
    initialize_client()
    main()
