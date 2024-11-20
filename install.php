<!-- PHP script that is only used when the website is created, moved och replicated -->
<?php
include('includes/secrets.php');

//Database connection with variables from secrets
    $db = new mysqli(DbCredentials::$dbHost, DbCredentials::$dbUser, DbCredentials::$dbPassword, DbCredentials::$dbDatabase);

    //The table that the website uses in the sql database
    $sql = "CREATE TABLE IF NOT EXISTS BUCKET_LIST (
        ID                  INTEGER NOT NULL AUTO_INCREMENT,
        POST_NAME           VARCHAR(100) NOT NULL,
        POST_DESCRIPTION    VARCHAR(1000),
        POST_PRIORITY       INTEGER NOT NULL,
        COMPLETED           BOOL DEFAULT FALSE NOT NULL,
        CREATED_AT          DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (ID)
        );";

    //Checks for connection errors
    if ($db->connect_error) {
        die("Connection to database failed: " . $db->connect_error);
    }

    // Sends a SQL query to the db-server.
    if ($db->query($sql)) {
        echo "OK: Tabell BUCKET_LIST fanns redan eller skapades.";
    } else {
        echo "Fel: Tabellen BUCKET_LIST kunde inte skapas.";
    }

    //Then closes the db connection
    $db->close();
?>


