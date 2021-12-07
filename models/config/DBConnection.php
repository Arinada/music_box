<?php

namespace MusicBoxApp\Models\Configs;

class DBConnection
{
    private string $hostname = "localhost";
    private string $username = "phpmyadmin";
    private string $password = "phpmyadmin";
    private string $dbname = "music_box";
    private $connection;

    public function getConnection()
    {
        $connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname)
                                     or die("Connection failed: " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->connection = $connection;
        }
        return $this->connection;
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
    }
}

?>
