<?php

namespace MusicBoxApp\Models;

class Model
{
    public function __construct()
    {
        require_once 'config/config.php';
        $config = getConfig();
        $db_obj = new DBClass();
        $this->db_connection = $db_obj->getConnection($config);
        $song = new Song();
        $song->createEntity($db_obj);
        $db_obj->closeConnection();
    }

    public function getAllSongsList() {

    }
}
