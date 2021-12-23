<?php

namespace MusicBoxApp\Models;

class DBClass
{
    private $connection;

    public function getConnection($config)
    {
        if ($this->connection === null) {
            $connection = mysqli_connect($config['hostname'], $config['username'], $config['password'], $config['dbname'])
            or die("Connection failed: " . mysqli_connect_error());

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
                $this->connection = $connection;
            }
        }
        return $this->connection;
    }

    public function createCreateTableQuery($table_name, $fields_description): string
    {
        $ar_size = count($fields_description);
        $ar_keys = array_keys($fields_description);
        $fields = null;

        for ($i = 0; $i < $ar_size - 1; $i++) {
            $field_name = $ar_keys[$i];
            $type = $fields_description[$field_name]['type'];
            $length = $fields_description[$field_name]['length'];
            $attributes = $this->fields_description[$field_name]['attributes'];
            $fields = $fields . $field_name . ' ' . $type . ' ';
            if ($length !== null) {
                $fields = $fields . '(' . $length . ') ';
            }
            $fields = $fields . $attributes . ', ';
        }

        $constraints = $fields_description['constraints'];
        if ($constraints) {
            $fields = $fields . $constraints;
        }

        return "CREATE TABLE $table_name ($fields)";
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
    }

    public function execute($query)
    {
        $stmt = mysqli_prepare($this->connection, $query) or die("Statement is bad: " . mysqli_connect_error());
        return mysqli_stmt_execute($stmt) or die('Query doesn\'t execute: ' . mysqli_error($this->connection));
    }

    public function isTableExist($table_name): bool
    {
        $query = "select 1 from $table_name LIMIT 1";
        try {
            mysqli_execute($query);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function getAllRows($table_name)
    {
        $query = "SELECT * FROM $table_name";
        return $this->getDataByQuery($query);
    }

    public function getAllRowsByCondition($table_name, $condition, $parameter): ?array
    {
        $query = $this->getQueryByCondition($table_name, $condition, $parameter);
        return $this->getDataByQuery($query);
    }

    private function getQueryByCondition($table_name, $condition, $parameter): string
    {
        $query = "Select * from $table_name WHERE ";
        $fields_array = ['name', 'author'];
        $or_condition = null;

        if (count($fields_array) !== 0) {
            $or_condition = ' OR ';
        }

        for ($i = 0; $i < count($fields_array); $i++) {
            $query = $query . $fields_array[$i];

            if ($parameter === null || $parameter === '') {
                $query = "Select * from $table_name";
                break;
            }

            if ($condition === 'Equal') {
                $query = $query . "='$parameter'";
            } elseif ($condition === 'Start with') {
                $query = $query . " LIKE '$parameter%'";
            } elseif ($condition === 'Contain') {
                $query = $query . " LIKE '%$parameter%'";
            }

            if ($i !== count($fields_array) - 1) {
                $query = $query . $or_condition;
            }
        }
        return $query;
    }

    private function getDataByQuery($query)
    {
        $result = mysqli_query($this->connection, $query) or die("Bad request: " . mysqli_connect_error());
        $songs_data = null;

        $counter = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs_data[$counter] = $row;
                $counter++;
            }
        }
        return $songs_data;
    }

}
