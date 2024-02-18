<?php

namespace App\Models;

use Database\DBConnection;

use PDO;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        // ma connection à la bdd 
        $this->db = $db;
    }

    public function all(): array
    {

        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findbyID(int $id)
    {

        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }
    
    public function update(int $id, array $data)
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        var_dump($sqlRequestPart);


        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id", $data);
    }


    public function destroy(int $id): bool
    {
        $result = $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0
        ) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }



}















   



  



   

