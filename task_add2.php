<?php
include "PostgreSQLConnection.php";
include "TableBuilder.php";
class DatabaseTablePrinter {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function printTable($query) {
        $result = pg_query($this->connection->getConnection(), $query);
        if (!$result) {
            echo "Error: " . pg_last_error($this->connection);
            return;
        }

        $tableBuilder = new TableBuilder();
        $row = pg_fetch_assoc($result);
        if ($row) {
            foreach (array_keys($row) as $header) {
                $tableBuilder->addHeader($header);
            }
        }
        do {
            $tableBuilder->addRow($row);
        } while ($row = pg_fetch_assoc($result));

        echo $tableBuilder->getTable();
    }
}


$connection = new PostgreSQLConnection('localhost', 'postgres', '', 'postgres');
$printer = new DatabaseTablePrinter($connection);
$printer->printTable('SELECT * FROM passenger where id % 2 = 0');
$connection->close();
