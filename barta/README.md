# Barta

Barta is a web application template built with Laravel. It provides essential features for user management, including login, registration, and profile management. Users can update their profile information, change their bio, and set their avatar.

## Features

-   **User Authentication**: Secure login and registration functionality.
-   **Profile Management**: View and edit user profile information.
-   **Bio Update**: Users can update their bio from the profile page.
-   **Avatar Management**: Set and display avatars sourced from GitHub or a default image.

## Installation

### Prerequisites

-   PHP 7.4 or higher
-   Composer
-   Laravel 8.x or higher
-   MySQL or another supported database

### Setup

1. **Clone the Repository**

    ```bash
    git clone https://github.com/aarifhsn/laravel-career-path.git
    cd barta
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

3. **Setup Environment**

-   Copy the .env.example file to .env:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**

    ```bash
    php artisan migrate
    ```

6. **Serve the Application**

    ```bash
    php artisan serve
    ```
