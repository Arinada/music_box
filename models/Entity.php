<?php

namespace MusicBoxApp\Models;

class Entity
{
    protected static array $fields_description;
    protected static string $table_name = 'ENTITY';
    protected DBClass $db_obj;

    public function __construct()
    {
        require_once 'config/config.php';
        $config = getConfig();
        $this->db_obj = new DBClass();
        $this->db_obj->getConnection($config);

        if (!$this->db_obj->isTableExist(self::$table_name)) {
            $query = $this->db_obj->createCreateTableQuery(self::$table_name, self::$fields_description);
            $this->db_obj->execute($query);
        }
    }

    /*  public function createEntity($db_obj)
      {
          if (!$db_obj->isTableExist(self::$table_name)) {
              $query = $db_obj->createCreateTableQuery(self::$table_name, self::$fields_description);
              $db_obj->execute($query);
          }
      }*/

    public static function getAllRows($db_obj): array
    {
        return $db_obj->getAllRows(self::$table_name);
    }

    public function __destruct()
    {
        $this->db_obj->closeConnection();
    }

    protected function getDbObj(): DBClass
    {
        return $this->db_obj;
    }
}