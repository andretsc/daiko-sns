<?php

class Database
{

    // used to connect to the database
    private $host = "sddb0040289152.cgidb";
    private $db_name = "sddb0040289152";
    private $username = "sddbNDI4NDMw";
    private $password = '1yvzAv$U';
    public $db_conn;

/*
private $host = "10.56.224.35";
    private $db_name = "caps";
    private $username = "capsadmin";
    private $password = "JZx9B*QlnDbw";
    public $db_conn;
	*/
    // get the database connection
    public function getConnection()
    {
        $this->db_conn = null;

        try {
            $this->db_conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Database Connection Error: " . $exception->getMessage();
        }
        return $this->db_conn;
    }
}

