<?php
include "PostgreSQLConnection.php";

$connection = new PostgreSQLConnection('localhost', 'postgres', '', 'postgres');
echo 'PostgreSQL version: ' . $connection->getVersion();
$connection->close();
