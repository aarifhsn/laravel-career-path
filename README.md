# Barta - Social Networking Application

Barta is a simple social networking platform where users can post content, update profiles, and interact with each other, similar to platforms like Facebook. The platform is built using Laravel, and it includes features like user registration, authentication, profile management, and a search feature to find posts based on users' name, username, or email.

## Features

-   User registration, login, and logout functionality
-   Profile management (bio, avatar, etc.)
-   Post creation with image uploads
-   Search functionality to find posts by users' full name, username, or email
-   User-friendly interface with responsive design

## Installation

### Prerequisites

-   PHP 7.4 or higher
-   Composer
-   Laravel 8.x or higher
-   sqlite or another supported database

## Installation

To set up this project locally, follow these steps:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/aarifhsn/laravel-career-path.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd laravel-career-path/barta-3
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
