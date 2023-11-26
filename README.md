# Scolarité - College Project

## Overview
This project is a robust and dynamic web application built with PHP, designed to handle, manipulate, and present data in a user-friendly and efficient manner. The application focuses on the "Session" table from a database resembling the ISET de Sousse college's database.

## Features

### Data Filtering
The application provides advanced data filtering capabilities, allowing users to narrow down the data displayed based on specific criteria.

### Data Printing
A print-friendly view is available, formatting the data for optimal printing. Certain elements, such as specific columns, are hidden in this view for clarity and conciseness.

### User Interface
The application boasts a clean and intuitive user interface, making it easy for users to interact with the data. The interface includes a header and footer on each page, two columns for data display, and action buttons for user commands.

## Task 1: Basic OOP CRUD Operations (PHP)
The first task involves implementing basic CRUD (Create, Read, Update, and Delete) operations using Object-Oriented Programming (OOP) principles in PHP. The operations are as follows:

- **Create:** Add new sessions to the database.
- **Read:** Retrieve and display session information from the database.
- **Update:** Modify existing session data in the database.
- **Delete:** Remove sessions from the database.

## Task 2: Enhancing User Interface (JS and CSS Bootstrap)
The second task is about enhancing the user interface. This involves:

- **Filter Implementation:** Develop filters to refine the data displayed based on user preferences or criteria.
- **Styling with CSS Bootstrap:** Use Bootstrap to style the application, making it more visually appealing and user-friendly.

## Database Structure
The "Session" table in the database has the following structure:

| Field   | Type   | Constraints   |
| ------- | ------ | ------------- |
| Numero  | int    | PRIMARY KEY   |
| Annee   | char(5)| NOT NULL      |
| Sem     | char(1)| NOT NULL      |
| SemAb   | char   |               |
| Debut   | date   |               |
| Fin     | date   |               |
| Debsem  | date   |               |
| Finsem  | date   |               |
| Annea   | char(5)|               |
| Anneab  | char(5)|               |

You can find the "session.sql" file in this project, which you can use to create the 'Scolarite' database, and session table and insert initial data.
## Installation
To get this application up and running, follow these steps:

1. Ensure you have a PHP server environment set up (e.g., XAMPP, MAMP, or WAMP).
2. Clone or download the project repository to your local machine.
3. Move the project files to your server's document root directory (e.g., 'htdocs' for XAMPP).
4. Start your server software and open the project in your web browser.

## Usage
Navigate to the application in your web browser. Use the action buttons to interact with the data, and the filters to refine the data displayed. To print the data, click the 'Print' button for a print-optimized view of the data.

## Project tree
d-----config
    -a----config.php
    -a----init.php
d-----css
    -a----styles.css
d-----helpers
    -a----system_helper.php
d-----lib
    -a----database.php
    -a----Session.php
    -a----template.php
d-----templates
    d-----inc
        -a----footer.php
        -a----header.php
    -a----frontpage.php
    -a----session-create.php
    -a----session-edit.php
    -a----session-single.php
-a----create.php
-a----edit.php
-a----index.php
-a----README.md
-a----session.php
-a----session.sql

#### tree description
## Project tree
- **config:** This directory contains configuration files for your application.
    - `config.php:` This file likely contains configuration settings for your application.
    - `init.php:` This file is typically used to initialize your application, such as setting up autoloaders or establishing database connections.

- **css:** This directory contains CSS files for your application.
    - `styles.css:` This is the main CSS file that contains styles for your application.

- **helpers:** This directory contains helper scripts for your application.
    - `system_helper.php:` This file likely contains utility functions that are used throughout your application.

- **lib:** This directory contains the core library files of your application.
    - `database.php:` This file likely contains the logic for connecting to and interacting with your database.
    - `Session.php:` This file likely contains the logic for managing sessions in your application.
    - `template.php:` This file likely contains the logic for rendering templates in your application.

- **templates:** This directory contains the template files for your application.
    - **inc:** This subdirectory likely contains included files that are used in multiple templates.
        - `footer.php:` This file likely contains the HTML for the footer of your application.
        - `header.php:` This file likely contains the HTML for the header of your application.
    - `frontpage.php:` This file likely contains the template for the front page of your application.
    - `session-create.php:` This file likely contains the template for creating a new session.
    - `session-edit.php:` This file likely contains the template for editing an existing session.
    - `session-single.php:` This file likely contains the template for displaying a single session.

- `create.php:` This file likely contains the logic for creating a new session.
- `edit.php:` This file likely contains the logic for editing an existing session.
- `index.php:` This is the main entry point of your application.
- `README.md:` This file contains documentation for your project.
- `session.php:` This file likely contains the logic for displaying sessions.
- `session.sql:` This file likely contains SQL commands for setting up your 'Session' table in your database.


## Contributing
Contributions to this project are welcome. Please feel free to submit a pull request or open an issue to discuss any changes or fix bugs.

## License
ISET of Sousse.

## Contact Information

younes.ben.dhiab1@gmail.com
