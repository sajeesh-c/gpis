<?php

class Gpis_Lib_Db_Adapter
{
    protected $_connection;

    /**
     *
     */
    protected function _setConnection()
    {
        try {
            $this->_connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_HOST_USERNAME, DB_HOST_PASSWORD);
            // set the PDO error mode to exception
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        if (is_null($this->_connection)) {
            $this->_setConnection();
        }
        return $this->_connection;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql)
    {

        return $this->getConnection()->exec($sql);
    }

    public function getLastInsertId(){

        return $this->getConnection()->lastInsertId();
    }
    /**
     *
     */
    public function __destruct()
    {
        $this->_connection = null;
    }
}