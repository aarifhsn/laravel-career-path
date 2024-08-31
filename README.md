# Static Portfolio

## Overview

[This is a static portfolio website built with Laravel, showcasing work experiences and projects.]

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- Home Page: [A welcoming page that introduces you and gives a brief overview of your professional background.]
- Work Experiences: [A dedicated page that outlines your work experiences, showcasing your journey, roles, and contributions in various organizations.]
- Projects: [A page that lists your projects. Each project is clickable and opens a new page providing detailed information]

## Installation

To set up this project locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/aarifhsn/laravel-career-path.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd static-portfolio
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

## Contributing

We welcome contributions to this project! To ensure a smooth process, please follow these guidelines:

### How to Contribute

1. **Fork the Repository:**

   - Click the "Fork" button at the top right of the repository page on GitHub to create a copy of this repository under your own account.

2. **Clone Your Fork:**

   - Clone your forked repository to your local machine:
     ```bash
     git clone https://github.com/your-username/laravel-career-path.git
     ```

3. **Create a New Branch:**

   - Navigate to the project directory and create a new branch for your changes:
     ```bash
     cd laravel-career-path
     git checkout -b feature-branch
     ```
   - Replace `feature-branch` with a descriptive name for your branch.

4. **Make Your Changes:**

   - Make the necessary changes or additions in your local repository. Be sure to follow the coding standards used in the project.

5. **Commit Your Changes:**

   - Commit your changes with a meaningful commit message:
     ```bash
     git add .
     git commit -m 'Add a descriptive message about your changes'
     ```

6. **Push to Your Fork:**

   - Push your changes to your forked repository:
     ```bash
     git push origin feature-branch
     ```

7. **Create a Pull Request:**
   - Go to the original repository on GitHub.
   - Click on "New Pull Request" and select your branch.
   - Provide a clear description of the changes you have made and submit the pull request.

### Reporting Issues

If you encounter any issues or have suggestions for improvements, please:

1. **Open an Issue:**

   - Navigate to the "Issues" tab of the repository.
   - Click "New Issue" and provide a detailed description of the problem or suggestion.

2. **Provide Details:**
   - Include steps to reproduce the issue, any error messages, and any relevant screenshots.

### Coding Standards

To maintain consistency and quality, please adhere to the following coding standards:

- **Code Style:** Follow the PSR-12 coding standard for PHP.
- **Documentation:** Ensure that your code is well-documented with comments and that any new features are reflected in the documentation.
- **Testing:** Add tests for any new features or bug fixes. Run the test suite to ensure all tests pass before submitting a pull request.
- **Commit Messages:** Use clear and descriptive commit messages to explain the purpose of your changes.

Thank you for contributing to this project!

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---
