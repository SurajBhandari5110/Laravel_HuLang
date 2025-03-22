Email Verification Setup for Laravel
To enable email verification in your Laravel project, follow these steps:

1️⃣ Configure SMTP in .env
Add the following email configuration to your .env file:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-gmail-id
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-gmail-id
MAIL_FROM_NAME="Your App Name"

2️⃣ Install Dependencies
Run the following command to install required dependencies:

composer install

3️⃣ Generate Application Key
Generate a new application key by running:

php artisan key:generate

4️⃣ Update Dependencies (if needed)
If required, update your dependencies with:

composer update

5️⃣ Start Apache Server
Ensure your Apache server is running before proceeding.

6️⃣ Run Migrations
Execute the following command to create the necessary database tables:

php artisan migrate


All rights reserved by Suraj Bhandari.