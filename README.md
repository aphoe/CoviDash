# CoviDash
CoviDash is a simple data visualisation web based app for displaying statistics for Covid-19 for a single country and its states (or provinces).

> Country can **only** be chosen during setup. 

## System Requirements

### Recommended
- Latest Windows, Mac OS or Linux distro
- 5GB disk space
- PHP 7.4
- Apache 2.4
- Maria DB 10.2.6 (or MySQL 5.7) 
- Composer
- Git

### Minimum
- PHP 7.2
- Apache 2.2

### Installation
1. Open your terminal or command line, navigate to the folder you want to install app to.
2. Type `git clone https://github.com/aphoe/CoviDash.git` <br >
    You can also go to `https://github.com/aphoe/CoviDash` to download the zip file.<br>
    This folder should be in your web server's websites root folder.
3. Open the folder of the app, make a copy of `.env.example` and save it as `.env`.
4. Go back to the terminal (in the folder of cloned or download CoviDash app), type `composer install`. Wait for it to finish
5. Still in the terminal, type `php artisan key:generate`.
5. Go to your MySQL terminal or **phpMyAdmin**, create a database for CoviDash. <br>
    Also note (or create) the database user and password for your MySQL server.
6. Open your browser and go to the URL of your app. You should see the setup page
    > Wrongly filling any field in setup page, will ruin the app installation.
8.
