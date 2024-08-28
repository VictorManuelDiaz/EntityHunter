# Entity Hunter

**Entity Hunter** is a web application that allows users to extract and analyze entities from URLs using Google Cloud's Natural Language API. The application is built with Laravel, Python, and jQuery, and utilizes Python for processing.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP 8.0 or higher**
- **Composer**
- **Node.js and npm**
- **Python 3.12.5**
- **Google Cloud account and API credentials**

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/entity-hunter.git
cd entity-hunter
```
### 2. Install PHP Dependencies
Ensure you have Composer installed, then run:

```bash
composer install
```
### 3. Install JavaScript Dependencies
Ensure you have Node.js and npm installed, then run:

```bash
npm install
```
### 4. Configure Environment
Create a .env file in the root of the project by copying from the .env.example file:

```bash
cp .env.example .env
```
Update the .env file with your configuration:

- APP_KEY: Generate an application key with php artisan key:generate.
- DB_CONNECTION: Set up your database connection.
- GOOGLE_APPLICATION_CREDENTIALS: Set this variable to the path of your Google Cloud service account JSON file.
### 5. Run Migrations
```bash
php artisan migrate
```
### 6. Set Up Python Script
##### 1. Install Python Dependencies:
Ensure your Python environment is activated, then install the required libraries:
```bash
pip install google-cloud-language
```
##### 2. Set Up Google Cloud Authentication:

Set the GOOGLE_APPLICATION_CREDENTIALS environment variable to point to your Google Cloud service account JSON file:

For Windows:
```bash
set GOOGLE_APPLICATION_CREDENTIALS="C:\path\to\your\service-account-file.json"
```
For macOS/Linux:
```bash
export GOOGLE_APPLICATION_CREDENTIALS="/path/to/your/service-account-file.json"
```
##### 3. Ensure the Python script is executable and located in app/Helpers/entity_extractor.py.


### 7. Start the Laravel Development Server
```bash
php artisan serve
```
The application should now be running at http://localhost:8000.

### 8. Access the Web Interface

Open a web browser and navigate to http://localhost:8000 to access the web interface.

### 9. Troubleshooting
- **Python Not Recognized**: Ensure Python is added to your system's PATH.

- **Missing Python Modules**: Install any missing modules using pip.

- **Google Cloud Authentication Errors**: Verify that your GOOGLE_APPLICATION_CREDENTIALS environment variable is correctly set and points to the valid JSON file.