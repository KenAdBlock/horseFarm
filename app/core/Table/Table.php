<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 16:49
 */

namespace Core\Table;


use Core\Database\Database;

class Table {


    protected $table;
    protected $db;


    public function __construct(Database $db) {

        $this->db = $db;

        if(is_null($this->table)) {

            $parts = explode('\\', get_class($this));
            $classname = end($parts);

            $this->table = strtolower(str_replace('Table', '', $classname)) . 's';

        }


    }


    public  function query($statement, $attributes = null, $one = null) {

        if($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
        else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }



    public function find($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }


    public function all() {
        return $this->query("SELECT * FROM {$this->table} ");
    }


    public function selectView($view) {
        return $this->query("SELECT * FROM {$view}");
    }















}