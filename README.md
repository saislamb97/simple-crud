### README.md

```markdown
# Web Tech Lab Test 3

This project includes a backend application built with the Slim framework and a frontend application built with Vue.js. The backend provides a RESTful API to manage users, and the frontend provides a user interface to interact with the backend.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Backend Setup](#backend-setup)
- [Frontend Setup](#frontend-setup)
- [Running the Applications](#running-the-applications)
- [API Endpoints](#api-endpoints)

## Prerequisites

Ensure you have the following installed on your machine:

- PHP (version 7.4 or later)
- Composer
- Node.js (version 14 or later)
- npm (version 6 or later)
- MySQL

## Backend Setup

1. **Clone the repository:**
   ```sh
   git clone git@github.com:saislamb97/simple-crud.git
   cd backend
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Create the database and users table:**
   ```sql
   CREATE DATABASE your_database_name;

   USE your_database_name;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Configure the database connection:**
   Edit the `app/settings.php` file with your database credentials:
   ```php
   'db' => [
       'host' => 'localhost',
       'dbname' => 'your_database_name',
       'user' => 'your_database_user',
       'pass' => 'your_database_password',
   ],
   ```

5. **Run the backend server:**
   ```sh
   php -S localhost:8081 -t public
   ```

## Frontend Setup

1. **Navigate to the frontend directory:**
   ```sh
   cd frontend
   ```

2. **Install dependencies:**
   ```sh
   npm install
   ```

3. **Run the frontend development server:**
   ```sh
   npm run serve
   ```

## Running the Applications

1. **Start the backend server:**
   ```sh
   php -S localhost:8081 -t public
   ```

2. **Start the frontend development server:**
   ```sh
   npm run serve
   ```

3. **Open your browser and go to the frontend URL:**
   ```
   http://localhost:8080
   ```

## API Endpoints

The backend application provides the following API endpoints:

- **GET /users**: View all users
- **GET /users/{id}**: View a user by ID
- **POST /users**: Save a user
  - Request body: `{ "name": "John Doe", "email": "john.doe@example.com" }`
- **PUT /users/{id}**: Update a user by ID
  - Request body: `{ "name": "John Doe", "email": "john.doe@example.com" }`
- **DELETE /users/{id}**: Delete a user by ID

## Notes

- Ensure your backend server is running on `http://localhost:8081` to match the frontend configuration.
- Make sure to configure your database connection in `app/settings.php` before running the backend server.
- The frontend uses Vuex for state management and Bootstrap for styling.

## Troubleshooting

- If you encounter any issues with missing dependencies, ensure you have installed all prerequisites listed above.
- Check the browser console and backend server logs for any error messages that can help identify issues.