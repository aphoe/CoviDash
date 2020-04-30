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
    > If you are you using MAMP on Mac, type `DB_SOCKET="/Applications/MAMP/tmp/mysql/mysql.sock"` in the `.env` file then save it.
4. Go back to the terminal (in the folder of cloned or download CoviDash app), run `composer install`. Wait for it to finish.
5. Still in the terminal, run `php artisan key:generate`.
5. Go to your MySQL terminal or **phpMyAdmin**, create a database for CoviDash. <br>
    Also note (or create) the database user and password for your MySQL server.
6. Open your browser and go to the URL of your app. You should see the setup page.
    > Wrongly filling any field in setup page, will ruin the app installation.
8. If all goes well, you should see a login page. Login with the email and password you entered in the step above.

### Using the App

#### Login
There is no direct link to the login page anywhere on the site, so you have to go to `http://your-domain.ext/login` to login.

### Admin Area
To access the admin area, go to `http://your-domain.ext/admin`.

#### Province
Provinces (or states) are added automatically during setup. You can add more if you need, or edit the ones there. If need be, you can deactivate a province. Deactivating a province means it will not show in the front end.

#### Incidences
This is were you add, edit, or delete data related to incidences.

##### Edit vs New
Instead of editing an already entered incidence, you can just create a new one with a counter value. For instance, if you added 25 critical state for a province, instead of 19, you can just create a new incidence with a value of `-6`, instead of editing the already saved incidence.

##### Bulk addition
You can upload bulk data for a a day for all the provinces (aka states).

#### Users
Users management on the app. 
> All users have the same privileges, so be mindful of who you add.

#### External links
Create important links that will appear on the front end.

#### News and information
Post news articles and information URLs.

### Sitemap
A sitemap at `http://your-domain.ext/sitemap.xml` is automatically generated. You can submit the link to RSS readers and search engines.

## Troubleshooting
> **WARNING:** Troubleshooting the app requires being an expert.

### Setup error 
If you made any mistake during setup, you can **attempt salvage** the situation by editing the `.env` file, whose content would have changed.

### Using for other diseases
This app can also be used to visualise other diseases and ailments. Go to `.env` and change the value of **CODA_DISEASE**

### Change logos
You can change logos by going to the `public/theme/assets/img` folder. Try to maintain the same dimension and colours for the newn images.

#### Favicons
To change favicons, go to <https://realfavicongenerator.net/>

Download the images created and put them in `public/theme/assets/img/favicons`

## Credits
- [Laravel](https://laravel.com/)
- [covid19api.com](https://covid19api.com/)
- [Start Bootstrap - SB Admin 2](https://startbootstrap.com/themes/sb-admin-2/)
- [Boostrap 4](https://getbootstrap.com/)

## License
CoviDash is released under MIT License.
