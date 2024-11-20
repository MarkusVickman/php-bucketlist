<?php

//Class that creates database connections, sets variables and sends queries a sql database.
class DbBucketList
{

    private $db;
    private $POST_NAME;
    private $POST_DESCRIPTION;
    private $POST_PRIORITY;

    //Constructor that connects to a mySQL database and saves the connection is a variable
    function __construct()
    {
        //error reporting activated
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->db = new mysqli(DbCredentials::$dbHost, DbCredentials::$dbUser, DbCredentials::$dbPassword, DbCredentials::$dbDatabase);
    }

    //Method that creates new input in a the sql database
    public function InsertToBucketList($name, $description, $priority): bool
    {
        //Checks if parameters is correctly provided
        if ($this->SetBucketlist($name, $description, $priority)) {

            // Prepare sql statement 
            $stmt = $this->db->prepare("INSERT INTO BUCKET_LIST(POST_NAME, POST_DESCRIPTION, POST_PRIORITY) VALUES (?, ?, ?)");

            // Binds the prepared statement and execute id 
            $stmt->bind_param("ssi", $this->POST_NAME, $this->POST_DESCRIPTION, $this->POST_PRIORITY);
            $stmt->execute();

            return true;
        } else {
            return false;
        }
    }

    //A combined setter that checks if parameters is correctly provided. I feel like a combined setter is fitting for this task
    private function SetBucketlist($name, $description, $priority): bool
    {
        if (($name == NULL || "") || ($description  == NULL || "") || ($priority == NULL || "")) {
            return false;
        } else {

            $this->POST_NAME = $name;
            $this->POST_DESCRIPTION = $description;
            $this->POST_PRIORITY = $priority;

            return true;
        }
    }

    // Method that retrieves the bucket list from the database
    public function GetBucketList(): array
    {

        $sql = "SELECT * FROM BUCKET_LIST ORDER BY POST_PRIORITY;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Method that deletes a row from the database
    public function DeleteBucketList($Id) : bool
    {
        // Prepare sql statement 
        $stmt = $this->db->prepare("DELETE FROM BUCKET_LIST WHERE ID=?");

        // Binds the prepared statement and execute id 
        $stmt->bind_param("i", $Id);
        $stmt->execute();

        return true;
    }

    //Method that updates a row in the sql database
    public function UpdateBucketList($name, $description, $priority, int $id): bool
    {
        //Checks if parameters is correctly provided
        if ($this->SetBucketlist($name, $description, $priority)) {

            //Checks if id exists - SQL injection not possible because the method only takes int and the value is converted on bucket_list.php page
            $query = "SELECT * FROM BUCKET_LIST WHERE ID = '$id'";
            $result = $this->db->query($query);
            if (mysqli_num_rows($result) > 0) {
            }

            //If not exists return false and writes error to screen
            else {
                echo '<p style="color:red" class="has-text-centered">Inlägg med ID:' . $id  . ' hittades inte.';
                return false;
            }

            // Prepare sql statement 
            $stmt = $this->db->prepare("UPDATE BUCKET_LIST SET POST_NAME=?, POST_DESCRIPTION=?, POST_PRIORITY=? WHERE ID=?");

            // Binds the prepared statement and execute id 
            $stmt->bind_param("ssii", $this->POST_NAME, $this->POST_DESCRIPTION, $this->POST_PRIORITY, $id);
            $stmt->execute();

            return true;

            //If provided parameters are bad return false and writes error to screen
        } else {
            echo '<p style="color:red" class="has-text-centered">Data saknas. Fyll i alla fält!</p>';
            return false;
        }
    }

    //Method that updates row in table and sets column completed = true
    public function CompleteBucketList($Id) : bool
    {
        // Prepare sql statement 
        $stmt = $this->db->prepare("UPDATE BUCKET_LIST SET COMPLETED=true WHERE ID=?");

        // Binds the prepared statement and execute id 
        $stmt->bind_param("i", $Id);
        $stmt->execute();

        return true;
    }

    /* Destructor that ends the database connection */
    function __destruct()
    {
        $this->db->close();
    }
}

?>