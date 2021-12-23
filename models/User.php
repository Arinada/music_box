<?php

namespace MusicBoxApp\Models;

class User extends Entity
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    protected static array $fields_description = [
        'id' => ['type' => 'INT', 'attributes' => 'AUTO_INCREMENT PRIMARY KEY'],
        'name' => ['type' => 'VARCHAR', 'length' => 200, 'attributes' => 'NOT NULL'],
        'email' => ['type' => 'VARCHAR', 'length' => 150, 'attributes' => 'NOT NULL UNIQUE'],
        'password' => ['type' => 'VARCHAR', 'length' => 80, 'attributes' => 'NOT NULL'],
        'constraints' => 'UNIQUE(name, password)'
    ];

    protected static string $table_name = 'User';
}
