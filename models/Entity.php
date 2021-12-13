<?php

namespace MusicBoxApp\Models;

class Entity implements EntityObj
{
    protected static array $fields_description;
    protected static string $table_name = 'ENTITY';

    public function __construct()
    {
        require_once 'config/config.php';
        $config = getConfig();
        $db_obj = new DBClass();
        $this->db_connection = $db_obj->getConnection($config);
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function createEntity($db_obj)
    {
        if (!$db_obj->isTableExist(self::$table_name)) {
            $query = $db_obj->createCreateTableQuery(self::$table_name, self::$fields_description);
            $db_obj->execute($query);
        }
    }

    public static function getAllSongs($db_obj): array
    {
        return $db_obj->getAllRows('Song');
    }
}