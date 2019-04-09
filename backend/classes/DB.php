<?php
    date_default_timezone_set("Asia/Kuala_Lumpur"); 
    class DB {

        private static function connect() {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=help-mooc;charset=utf8', 'root', '');
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public static function conn() {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=help-mooc;charset=utf8', 'root', '', array(
                PDO::MYSQL_ATTR_LOCAL_INFILE => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        public static function query($query, $params = array()){
            $statement = self::connect()->prepare($query);
            $statement->execute($params);

            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        }

        public static function returnRowCount($query , $params = array()){
            $statement = self::connect()->prepare($query);
            $statement->execute($params);
            $count = $statement->rowCount();
            return $count;
        }        
            
    }
    

?>