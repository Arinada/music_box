<?php

namespace MusicBoxApp\Models;

class Song extends Entity
{
    public int $id;
    public string $name;
    public string $author;
    public string $date_added;
    public string $path_on_server;

    protected static array $fields_description = [
        'id' => ['type' => 'INT', 'attributes' => 'AUTO_INCREMENT PRIMARY KEY'],
        'name' => ['type' => 'VARCHAR', 'length' => 100, 'attributes' => 'NOT NULL'],
        'author' => ['type' => 'VARCHAR', 'length' => 100, 'attributes' => 'NOT NULL'],
        'date_added' => ['type' => 'DATE', 'attributes' => 'NOT NULL'],
        'path_on_server' => ['type' => 'VARCHAR', 'length' => 200, 'attributes' => 'NOT NULL'],
        'constraints' => 'UNIQUE(name, author)'
    ];

    protected static string $table_name = 'Song';
}
