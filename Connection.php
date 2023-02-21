<?php

use PDO;

class Connection
{
    public static function createConnection(): PDO
    {
        $connection = new \PDO('mysql:host=localhost;dbname=aluraplay',
                                    'vini',
                                    'vini');

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }

}