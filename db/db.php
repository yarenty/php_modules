<?php

/**
 * Created by Scycorp Ltd.
 * User: yarenty
 * Date: 14/11/2015
 * Time: 12:48
 */
class db
{
    private $iniFile = "local.ini";
    var $prefix = "";
    var $connection = null;

    function __construct()
    {
        $access = parse_ini_file($this->iniFile);
        $this->connection = new mysqli($access["server"], $access["user"], $access["pass"], $access["database"]);
        $this->prefix = $access["prefix"];
    }

    /**
     * Insert single row - returns inserted ID.
     * @param $sql
     * @return mixed|null
     */
    function insertRow($sql)
    {

        $result = $this->connection->query($sql);
        if ($result != false) {
            $id = $this->connection->insert_id;
            mysqli_free_result($result);
            return $id;
        }
        return null;
    }

    /**
     * Update.
     * @param $sql
     * @return int|null
     */
    function update($sql)
    {
        $result = $this->connection->query($sql);
        if ($result != false) {
            return $this->connection->affected_rows;
        }
        return null;
    }

    /**
     * REturns single row.
     * @param $sql
     * @return mixed|null
     */
    function getRow($sql)
    {

        $result = $this->connection->query($sql);
        if ($result != false) {
            $out = $result->fetch_row();
            mysqli_free_result($result);
            return $out;
        }
        return null;
    }

    /**
     * Returns 2-dimensional array of data (array[0][0]).
     * @param $sql
     * @return null
     */
    function getRowSet($sql)
    {
        $result = $this->connection->query($sql);
        if ($result != false) {
            $i = 0;
            while ($out[$i++] = $result->fetch_array(MYSQLI_BOTH)) {
            }
            mysqli_free_result($result);
            return $out;
        }
        return null;
    }

    /**
     * Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
     * @link http://php.net/manual/en/mysqli.real-escape-string.php
     * @param $in
     * @return string
     */
    function escape($in)
    {
        return mysqli_real_escape_string($this->connection, $in);
    }
}

?>