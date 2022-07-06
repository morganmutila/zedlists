<?php

class DB
{
    private static $_instance = null;
    private $_pdo, // represent the objects used elsewhere
        $_query, // last query executed
        $_error = false,// query errors
        $_results, // store results
        $_count = 0; // count of results

    // construct that connects to the database
    public function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            //echo 'connected' . '<br />';
        } catch (PDOException $e) {
            die($e->getMessage());
        }//catch errors inside the try block
    }

    //this checks if the construct is connected to the database and should connect once
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    // crating a query in the database
    public function query($sql, $params = array())
    {
        $this->_error = false;// rest the error back to false
        //check if the query has be prepared properly
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindvalue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);//stores results
                $this->_count = $this->_query->rowCount();//updates the results
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    //performance action
    public function action($action, $table, $where = array())
    {
        //$action is SELETE *; //$table is users // $where has three elements: <1>username, <2> equals |=| and <3>value e.g name juddie
        if (count($where) === 3) {
            $operators = array('=', '<', '>', '>=', '<=');
            $field = $where[0]; //username
            $operator = $where[1]; //equals =
            $value = $where[2]; // name e.g juddie
            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                // a query method to perform a query on username as value or ?
                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where);
    }

    //insert method
    public function insert($table, $fields = array())
    {

        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field) {
            $values .= '?';
            //check if fields are at end, test this by using die($values); down the x++
            if ($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }
        //this is the query were data will be stored, to check for the back-tick use "echo $sql"
        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
        //this will insert data if there no errors
        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    //update data function
    public function update($table, $id, $fields)
    {
        $set = '';
        $x = 1;
        //building the set string
        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        //update query
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
        //performing the query
        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;

    }

    // return the results
    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        return $this->results()[0];
    }

    //to check if the query has successfully executed
    public function error()
    {
        return $this->_error;
    }

    //count method
    public function count()
    {
        return $this->_count;
    }
}

?>