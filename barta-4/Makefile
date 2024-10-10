# Makefile for Laravel project setup

# Variables
PHP_ARTISAN = php artisan
COMPOSER = composer

# Default target: install everything
install: clone-env composer-install generate-key migrate storage-link serve

# Step 1: Clone environment file
clone-env:
	cp .env.example .env

# Step 2: Install composer dependencies
composer-install:
	$(COMPOSER) install

# Step 3: Generate application key
generate-key:
	$(PHP_ARTISAN) key:generate

# Step 4: Run database migrations
migrate:
	$(PHP_ARTISAN) migrate

# Step 5: Create symbolic link for storage
storage-link:
	$(PHP_ARTISAN) storage:link

# Step 6: Serve the application
serve:
	$(PHP_ARTISAN) serve
