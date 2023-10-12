<?php

if (!function_exists('get_pdo_connection_option')) {
    /**
     * @return array
     * NB: Never use Persistent connections ** PDO::ATTR_PERSISTENT => true  **. Why? Visit https://stackoverflow.com/questions/3332074/what-are-the-disadvantages-of-using-persistent-connection-in-pdo
     */
    function get_pdo_connection_option()
    {
        return array(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,// set the PDO error mode to exception
            PDO::MYSQL_ATTR_FOUND_ROWS, TRUE,
            PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC,
        );
    }
}
if (!function_exists('get_database_connection')) {

    /**
     * @return PDO
     * @throws Exception
     */
    function get_database_connection()
    {
        if (isset($GLOBALS['PDO_DB_CONNECTION'])) {
            $connection = $GLOBALS['PDO_DB_CONNECTION'];
            if ($connection instanceof PDO) {
                return $connection;
            }
        }

        try {

            $connection = new PDO(
                "mysql:host=localhost;dbname=jamijoy_br23;charset=utf8",
                'root','',
                get_pdo_connection_option()
            );

            $GLOBALS['PDO_DB_CONNECTION'] = $connection;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return $connection;
    }
}
