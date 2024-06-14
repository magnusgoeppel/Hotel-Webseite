# Hotel Website

## Description

The "Hotel Website" is a web application that allows users to visit various pages such as the homepage, help center, imprint, and many others. It uses PHP for backend logic and Bootstrap for frontend design.

## Main Features

### Session Management:
The website checks if a session exists and starts a new session if necessary. It also includes a function to check if the user is logged in.

### Navigation:
Navigation is included through a separate `nav.php` file.

### Dynamic Page Loading:
Depending on the `site` GET variable, the corresponding page from the `inc` folder is loaded. There is a predefined list of valid pages, and if an invalid page is requested, an error page is displayed.

### Styling:
The website uses Bootstrap for styling and includes additional custom styles, especially for the background.

### Responsive Design:
The website is optimized for different screen sizes, ensuring it looks and functions well on desktops, tablets, and mobile devices.

## Database
A MySQL database is used for data management. The database was created and configured using phpMyAdmin. The configuration file for the database connection is located in the `db` directory of the project.

## Usage

An Apache web server is required to use the website.
