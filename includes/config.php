<!-- PHP script to set websites name -->
<?php
    $sitename = "Bucket List";
    $divider = " | ";

// activate error report for testing purposes
/*error_reporting(-1);
ini_set("display_errors", 1);*/

//includes all files in classes folder that starts with a classname and ends with .class.php
spl_autoload_register(function ($class_name) {
    include'classes/' . $class_name . '.class.php';
});

//Includes connection info to the SQL-database
include("secrets.php");
?>
