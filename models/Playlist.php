<?php

namespace MusicBoxApp\Models;

class Playlist
{
    public int $id;
    public string $name;

    protected array $fields_description = [
        'id' => ['type' => 'INT', 'attributes' => 'AUTO_INCREMENT PRIMARY KEY'],
        'name' => ['type' => 'VARCHAR', 'length' => 200, 'attributes' => 'NOT NULL']
    ];

    protected string $table_name = 'Playlist';
}
