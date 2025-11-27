Important: Import the Database Before Using the Application

Before running this application, you must import the SQL database file included in the project.

The SQL file is located in the private/ folder.

✅ Steps to Import the SQL File in XAMPP (phpMyAdmin):

1. Start Apache and MySQL from the XAMPP Control Panel.

2. Open your browser and go to:
    http://localhost/phpmyadmin

3. Create a new database (use the same name mentioned in the project configuration).

4. Click on the created database → go to the Import tab.

5. Click Choose File and select the SQL file located at:
    private/your-database-file.sql

6. Click Go to import the database.

Once the import is completed, the application will be ready to use.

----------------------------------------------------------------------------------------
⚠️ Note: Comments Must Be Added Manually in the Database

The project does not include a frontend module for team login or for adding comments to tickets.
Therefore, the following fields must be inserted directly in the database:

ticket_id

team_id

comment

If you need to add comments or assign a team to a ticket, please open phpMyAdmin and manually insert the required details into the corresponding table.

No UI or panel has been developed for these features, as they were not included in the project instructions.