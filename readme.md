```markdown
# PHP CRUD Application

This project is a simple PHP application that demonstrates CRUD (Create, Read, Update, Delete) operations using a MySQL database. It is designed to help beginners understand how to interact with a database through PHP.

---

## Project Structure
```

db_config.php - Handles database connection setup.
delete.php - Deletes a user record from the database.
edit.php - Displays a form to edit an existing user record.
index.php - Main page for adding new user records.
style.css - Contains the styling for the application.
update.php - Updates user records in the database.
view_data.php - Displays all user records in a table format.

````

---

## Features

1. **Create**: Add new user records through a form on the `index.php` page.
2. **Read**: View all user records on the `view_data.php` page.
3. **Update**: Edit existing user records using the `edit.php` page.
4. **Delete**: Remove user records using the `delete.php` page.

---

## Prerequisites

Before running this project, ensure you have the following installed:
- A web server (e.g., XAMPP, WAMP, or LAMP).
- PHP (version 7.4 or higher recommended).
- MySQL database.

---

## Database Setup

1. Create a MySQL database and a table named `users` with the following structure:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
````

2. Update the database credentials in the [`db_config.php`](db_config.php) file:

```php
<?php
$mysqli = new mysqli("hostname", "username", "password", "database_name");

// Check if the connection was successful
if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno . '<br>';
    echo 'Error: ' . $mysqli->connect_error;
    exit();
}
?>
```

Replace `hostname`, `username`, `password`, and `database_name` with your database details.

---

## How to Run the Application

1. Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP).
2. Start your web server and MySQL database.
3. Open your browser and navigate to `http://localhost/index.php`.

---

## File Descriptions

### 1. [`db_config.php`](db_config.php)

- **Purpose**: Establishes a connection to the MySQL database.
- **Key Functionality**:
  - Checks if the connection is successful.
  - Displays error messages if the connection fails.

### 2. [`index.php`](index.php)

- **Purpose**: Allows users to add new records to the database.
- **Key Functionality**:
  - Accepts user input (name and email) through a form.
  - Inserts the data into the `users` table.

### 3. [`view_data.php`](view_data.php)

- **Purpose**: Displays all user records in a table format.
- **Key Functionality**:
  - Fetches all rows from the `users` table.
  - Provides links to edit or delete each record.

### 4. [`edit.php`](edit.php)

- **Purpose**: Displays a form to edit an existing user record.
- **Key Functionality**:
  - Fetches a specific record based on the ID.
  - Pre-fills the form with the current data for editing.

### 5. [`update.php`](update.php)

- **Purpose**: Updates a user record in the database.
- **Key Functionality**:
  - Accepts updated data from `edit.php`.
  - Executes an SQL query to update the record in the `users` table.

### 6. [`delete.php`](delete.php)

- **Purpose**: Deletes a user record from the database.
- **Key Functionality**:
  - Deletes a specific record based on the ID provided.

### 7. [`style.css`](style.css)

- **Purpose**: Contains the styling for the application.
- **Key Functionality**:
  - Defines the layout, colors, and fonts for the web pages.

---

## How the Application Works

1. **Insert Data**:

   - Open `index.php` in your browser.
   - Fill in the form with a name and email.
   - Click the submit button to add the data to the database.

2. **View Data**:

   - Open `view_data.php` to see all the records stored in the database.

3. **Edit Data**:

   - Click the "Edit" button next to a record in `view_data.php`.
   - Modify the data in the form and save the changes.

4. **Update Data**:

   - The updated data is saved in the database using `update.php`.

5. **Delete Data**:
   - Click the "Delete" button next to a record in `view_data.php` to remove it from the database.

---

## Error Handling

- The [`db_config.php`](db_config.php) file includes error handling for database connection issues.
- Each operation (insert, update, delete) provides feedback on success or failure.

---

## Notes

- Always validate and sanitize user inputs to prevent SQL injection.
- Use prepared statements (as shown in the code) for secure database interactions.
- Ensure your database credentials in `db_config.php` are correct before running the application.

---

## License

This project is open-source and available for educational purposes. Feel free to modify and use it as needed.

```

```
