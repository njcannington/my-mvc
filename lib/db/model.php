<?php
namespace Lib\Db;

use Lib\Db\Db;

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getRecord($column, $value)
    {
        $sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} = :value");
        $sql->execute([":value" => $value]);

        return $sql->fetch();
    }
}
