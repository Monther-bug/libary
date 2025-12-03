# Library Management System

A modern, feature-rich Library Management System built with Laravel. This application provides a comprehensive admin panel for managing books, categories, classifications, and types, featuring a sleek, responsive UI with dark mode support.

## Features

### Admin Panel
-   **Authentication**: Secure admin login and logout functionality with "Remember Me" support.
-   **Dashboard**: Overview of library statistics, recent activity, top authors, and quick actions.
-   **Book Management**: Create, read, update, and delete books with cover image uploads and real-time previews.
-   **Category Management**: Manage book categories.
-   **Classification Management**: Manage book classifications.
-   **Type Management**: Manage book types.
-   **Search**: Global search functionality to quickly find resources.
-   **Dark Mode**: Fully integrated dark mode with a toggle switch, persisting user preference.
-   **Responsive Design**: Optimized for desktop and mobile devices.
-   **Modern UI**: Glassmorphism effects, smooth transitions, and a polished aesthetic using Tailwind CSS.

### Key Technical Highlights
-   **Framework**: Laravel 10.x
-   **Styling**: Tailwind CSS (with custom configuration for dark mode and glass effects).
-   **Interactivity**: Alpine.js for modals, dropdowns, and toast notifications.
-   **Icons**: Heroicons.
-   **Database**: SQLite (default) / MySQL.

## Installation

1.  **Clone the repository**
    ```bash
    git clone <repository-url>
    cd library-management-system
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure your database settings.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Migration & Seeding**
    Run migrations and seed the database with the default admin user.
    ```bash
    php artisan migrate --seed
    ```
    *Default Admin Credentials:*
    -   **Email**: `monther@gmali.com`
    -   **Password**: `12345678`

5.  **Build Assets**
    Compile the frontend assets.
    ```bash
    npm run build
    ```

6.  **Run the Application**
    Start the local development server.
    ```bash
    php artisan serve
    ```

## Usage

-   Access the admin panel at `/admin/login`.
-   Log in using the credentials provided above.
-   Use the sidebar to navigate between different management sections.
-   Toggle dark mode using the sun/moon icon in the header.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
