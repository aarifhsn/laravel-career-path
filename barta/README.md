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

## Installation

To set up this project locally, follow these steps:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/aarifhsn/laravel-career-path.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd barta
    ```

3. **Install dependencies:**

    ```bash
    composer install
    ```

4. **Set up environment file:**

    Copy the example environment file and set up your environment variables:

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run migrations (if applicable):**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

8. **Access the application:**

    Open your browser and go to [http://localhost:8000](http://localhost:8000).
