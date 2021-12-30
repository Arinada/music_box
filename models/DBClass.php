<?php

namespace MusicBoxApp\Models;

use mysqli;

class DBClass
{
    private $connection;

    public function getConnection($config)
    {
        if ($this->connection === null) {
            $connection = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
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
        $this->connection->close();
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

    public function getAllRows($table_name): ?array
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

    public function insertRowUser($fields): bool
    {
        $table_name = 'Users';
        if (!$this->isUserExist($fields)) {
            $prepared_query = $this->getInsertRowQuery($table_name, $fields);
            $stmt = $this->connection->prepare($prepared_query);
            $stmt->bind_param('ssss', $name, $email, $password, $role);

            $name = $fields['name'];
            $email = $fields['email'];
            $password = md5($fields['password']);
            $role = $fields['role'];

            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    private function bindParamsForUsersTable(&$stmt, $fields)
    {
        $stmt->bind_param('ssss', $name, $email, $password, $role);

        $name = $fields['name'];
        $email = $fields['email'];
        $password = $fields['password'];
        $role = $fields['role'];
    }

    private function isUserExist($fields): bool
    {
        $table_name = 'Users';
        $prepared_query = $this->getSelectRowQuery($table_name, $fields);
        $stmt = $this->connection->prepare($prepared_query);
        $stmt->bind_param('ssss', $name, $email, $password, $role);

        $name = $fields['name'];
        $email = $fields['email'];
        $password = md5($fields['password']);
        $role = $fields['role'];

        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        if ($result) {
            return true;
        }
        return false;
    }

    private function getSelectRowQuery($table_name, $fields): string
    {
        $values_cond = null;
        $query = "SELECT 1 FROM $table_name WHERE ";
        $counter = 0;

        foreach ($fields as $key => $value) {
            $values_cond = $values_cond . $key . '=?';

            if ($counter != count($fields) - 1) {
                $values_cond = $values_cond . ' AND ';
            }
            $counter++;
        }
        return $query . $values_cond;
    }

    private function getInsertRowQuery($table_name, $fields): string
    {
        $fields_str = '(';
        $values_cond = '(';
        $counter = 0;

        foreach ($fields as $key => $value) {
            $fields_str = $fields_str . $key;
            $values_cond = $values_cond . '?';

            if ($counter != count($fields) - 1) {
                $fields_str = $fields_str . ',';
                $values_cond = $values_cond . ',';
            }
            $counter++;
        }
        $fields_str = $fields_str . ')';
        $values_cond = $values_cond . ')';
        return "INSERT INTO $table_name $fields_str VALUES $values_cond";
    }
}
