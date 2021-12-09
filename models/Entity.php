<?php

namespace MusicBoxApp\Models;

class Entity implements EntityObj
{

    protected array $fields_description;
    protected string $table_name = 'ENTITY';

    public function __construct()
    {
        require_once 'config/config.php';
        $config = getConfig();
        $db_obj = new DBClass($config);
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
        if (!$db_obj->isTableExist($this->table_name)) {
            $query = $db_obj->createCreateTableQuery($this->table_name, $this->fields_description);
            $db_obj->execute($query);
        }
    }
}
