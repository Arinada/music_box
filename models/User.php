<?php

namespace MusicBoxApp\Models;

class User extends Entity
{
    public int $id;
    public string $name;
    public string $email;
    public string $role;
    public string $password;

    protected array $fields;

    protected static array $fields_description = [
        'id' => ['type' => 'INT', 'attributes' => 'AUTO_INCREMENT PRIMARY KEY'],
        'name' => ['type' => 'VARCHAR', 'length' => 200, 'attributes' => 'NOT NULL'],
        'email' => ['type' => 'VARCHAR', 'length' => 150, 'attributes' => 'NOT NULL UNIQUE'],
        'role' => ['type' => 'VARCHAR', 'length' => 100, 'attributes' => 'NOT NULL'],
        'password' => ['type' => 'VARCHAR', 'length' => 80, 'attributes' => 'NOT NULL'],
        'constraints' => 'UNIQUE(name, password, email)'
    ];

    protected static string $table_name = 'Users';

    public function __construct($data)
    {
        parent::__construct();
        $this->name = $data[0]['name'];
        $this->email = $data[0]['email'];
        $this->password = $data[0]['password'];
        $this->role = $data[0]['role'];

        $this->fields = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

    public function insert(): bool
    {
        $isInsert = parent::getDbObj()->insertRowUser($this->fields);
        if ($isInsert) {

        }
        return $isInsert;
    }
}
