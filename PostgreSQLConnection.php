<?php

class PostgreSQLConnection
{
    private $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = pg_connect("host=$host dbname=$database user=$username password=$password");
        if (!$this->connection) {
            die('Ошибка подключения: ' . pg_last_error());
        }
    }

    public function getVersion()
    {
        $version = pg_version($this->connection);
        return $version['server'];
    }

    public function getConnection()
    {
        return $this->connection;
    }


    public function close()
    {
        pg_close($this->connection);
    }
}