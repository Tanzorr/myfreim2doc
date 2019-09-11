<?php

/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 01.08.19
 * Time: 12:50
 */
class Model
{
    protected $_db, $_table,  $_modelName, $_softDelete = false;
    public $id;

    public function __construct($_table)
    {
        $this->_db = DB::getInstance();
<<<<<<< HEAD

        $this->_table = $_table;


        $this->_setTableColumns();

        $this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }

=======
        $this->_table = $_table;
        $this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }

>>>>>>> 21431d4a9b4a5c3da1ec156028a0859312d60c58
    public function get_columns()
    {
        return $this->_db->get_columns($this->_table);
    }

    protected function _softDeleteParams($params)
    {
        if ($this->_softDelete) {
            if (array_key_exists('conditions', $params)) {
                if (is_array($params['conditions'])) {
                    $params['conditions'][] = "deleted != 1";
                } else {
                    $params['conditions'] .= " AND deleted != 1";
                }
            } else {
                $params['conditions'] = "deleted != 1";
            }
        }
        return $params;
    }

    public function find($params = [])
    {
        $params = $this->_softDeleteParams($params);
        $resultsQuery = $this->_db->find($this->_table, $params, get_class($this));
        return $resultsQuery;
    }

    public function findFirst($params = [])
    {
        $params = $this->_softDeleteParams($params);
        $resultQuery = $this->_db->findFirst($this->_table, $params,get_class($this));
//        $result = $this->_db->find($this->_table, $params);
//        //$result = new  $this->_modelName($this->_table);
//
//        if (!$result) {
//            return false;
//        }
//
//        $result = $result[0];
      //  $this->populateObjData($result);

        return $resultQuery;
    }

    public function findById($id)
    {
        return $this->findFirst(['conditions' => "id=?", 'bind' => [$id]]);
    }

    public function save()
    {
        $fildes = [];
        foreach ($this->_columnNames as $column) {
            $fildes[$column] = $this->$column;
        }
        //detemine whether to update or insert
        if (property_exists($this, 'id') && $this->id !== null) {
            return $this->update($this->id, $fildes);
        } else {
            return $this->insert($fildes);
        }
    }

    public function insert($fields)
    {
        if (empty($fields)) return false;
        return $this->_db->insert($this->_table, $fields);
    }

    public function update($id, $fields)
    {
        if (empty($fields) || $id == '') return false;
        return $this->_db->update($this->_table, $id, $fields);
    }

    public function delete($id = '')
    {
        if ($id == '' && $this->id = '') return false;
        $id - ($id == '') ? $this->id : $id;
        if ($this->_softDelete) {
            return $this->update($id, ['deleted' => 1]);
        }
        return $this->delete($this->_table . $id);
    }

    public function query($sql, $bind)
    {
        return $this->_db->query($sql, $bind = []);
    }

    public function data()
    {
        $data = new stdClass();
        foreach ($this->_columnNames as $column) {
            $data->column = $this->column;
        }
        return $data;
    }

    public function assign($params)
    {
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (in_array($key, $this->_columnNames)) {
                    $this->$key = sanitize($val);
                }
            }
            return true;
        }
    }

    protected function populateObjData($result)
    {
        foreach ($result as $key => $val) {
            $this->$key = $val;
        }
    }

}