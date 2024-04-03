**XML Datafeed Importer**

This project is a PHP application for importing XML datafeeds into a MySQL database.

**Prerequisites**

- PHP 7.x or higher
- MySQL database
- XML datafeed file
- A Test Data file

**Installation**

- Clone the repository to your local machine.
- Create a MySQL database and import the provided SQL script (product.sql) to create the required table.
- Update the database connection details in the config/config.php file.
- Place your XML datafeed file in the data/ directory.
- Install PHPUnit if you haven't already. This is necessary for unit tests.


**Usage**

- Run the datafeed.php script to import the XML datafeed into the database.
- Check the error.log file for any errors encountered during the import process.

**Configuration**

You can modify the database connection details and other configurations in the config/config.php file.