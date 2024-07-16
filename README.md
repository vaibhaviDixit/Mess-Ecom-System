# Mess E-Commerce Website

Welcome to our Mess E-Commerce Website! This platform allows users to browse and order meals from a mess, with a backend built using PHP and MySQL.

## Features

- **User Registration and Authentication**: Secure user sign-up and login functionalities.
- **Product Catalog**: Displays a list of available meals with images, descriptions, and prices.
- **Shopping Cart**: Allows users to add meals to their cart and manage their orders.
- **Order Management**: Users can view their order history and track current orders.
- **Admin Panel**: For managing meals, categories, orders, and users.
- **Responsive Design**: Ensures the website looks great on all devices, from desktops to mobile phones.

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Styling**: Bootstrap or custom CSS
- **Deployment**: Apache web server

## Getting Started

To get a local copy of the website up and running, follow these steps.

### Prerequisites

Ensure you have the following installed on your machine:
- PHP (>= 7.4)
- MySQL
- A web server (Apache)

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/mess-ecommerce-website.git
    ```
2. Navigate to the project directory:
    ```bash
    cd mess-ecommerce-website
    ```

### Database Setup

1. Create a new MySQL database:
    ```sql
    CREATE DATABASE mess_db;
    ```
2. Import the database schema from the `database` directory:
    ```bash
    mysql -u yourusername -p mess_db < database/schema.sql
    ```
3. Configure the database connection in the `config.php` file:
    ```php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'mess_db');
    define('DB_USER', 'yourusername');
    define('DB_PASS', 'yourpassword');
    ```

### Running Locally

1. Start your web server and ensure it points to the project directory.
2. Open your browser and navigate to `http://localhost//mess` to see the website in action.

### Deployment

You can deploy this website using any web hosting service that supports PHP and MySQL. Here are general steps for deployment:

1. Upload your project files to the web server.
2. Set up the database on the server and import your schema.
3. Configure the environment variables for your production environment.
4. Ensure the web server points to the project directory.

## Usage

1. Register as a new user or log in with your credentials.
2. Browse the available meals and add them to your cart.
3. Proceed to checkout and place your order.
4. Track your orders and view order history from your account dashboard.


Thank you for using our Mess E-Commerce Website! Enjoy ordering your meals online.
