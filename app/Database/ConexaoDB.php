<?php

/*constantes*/
define("SERVERNAME","localhost");
define("DATABASE","calculadora_imc");
define("USERNAME","root");
define("PASSAWORD","");

class ConexaoDB
{
    private static $conn;

    public static function getConn(){
        if(!isset(self::$conn)){
            try {
                self::$conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSAWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Falha na conexão: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>