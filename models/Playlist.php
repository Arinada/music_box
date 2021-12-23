<?php

namespace MusicBoxApp\Models;

class Playlist extends Entity
{
    public int $id;
    public static string $name;

    protected static array $fields_description = [
        'id' => ['type' => 'INT', 'attributes' => 'AUTO_INCREMENT PRIMARY KEY'],
        'name' => ['type' => 'VARCHAR', 'length' => 200, 'attributes' => 'NOT NULL']
    ];

    protected static string $table_name = 'Playlist';
}
