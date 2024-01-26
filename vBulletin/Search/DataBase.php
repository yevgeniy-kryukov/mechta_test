<?php 

namespace vBulletin\Search;

class DataBase
{
    /**
     * Connects to database and returns PDO object
     */
    public static function getConnection(): \PDO
    {
        $paramsPath = ROOT . '/config/db.php';
        $params = include($paramsPath);
      
        $dsn = "mysql:host={$params['dbhost']};dbname={$params['dbname']}";
        $db = new \PDO($dsn, $params['dbuser'], $params['dbpass'], []);

        return $db;
    }
}

?>