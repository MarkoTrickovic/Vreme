<?php

/*
    This class is singleton design pattern type of class. You can use the class
    to establish connection to the MySQL database and achieve write and read
    from the database.



*/

class DBAccess
{
    private $conn;

    private $conn_established;

    public __construct()
    {
        $conn_established = false;
    }

    public __construct($server, $username, $password)
    {
        
    }

    public function EstablishConnection($server_host)
    {
        $conn = mysqli_connect("localhost", "root", "");
        if ($conn->connect_error)
        {
            print("<h2>Failed to connect to database!</h2>");
        }
        else
        {
            print("<p>Connection established</p>");
        }
    }

    public function WriteData($query)
    {

    }

    public function ReadData($data)
    {

    }
}

?>