<?php

namespace MusicBoxApp\Models;

class Model
{
    private DBClass $db_obj;
    private Song $song;

    public function __construct()
    {
        require_once 'config/config.php';
        $config = getConfig();
        $db_obj = new DBClass();
        $this->db_obj = $db_obj;
        $db_obj->getConnection($config);
        $this->song = new Song();
        $this->song->createEntity($db_obj);
    }

    public function getAllSongsList(): array
    {
        return $this->song->getAllSongs($this->db_obj);
    }

    public function findSongsBy($condition, $parameter): ?array
    {
        return $this->song->getAllSongsBy($this->db_obj, $condition, $parameter);
    }

    public function __destruct()
    {
        $this->db_obj->closeConnection();
    }

}
