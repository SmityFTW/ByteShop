<?php

class Database {
    private $hostname = "localhost";
    private $database = "byteshop_almacen";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    private $collate = "utf8_spanish_ci";

    function conectar()
    {
        try{
            $conexion = "mysql:host=" . $this->hostname . 
                "; dbname=" . $this->database . 
                "; charset=" . $this->charset;
                "; collate=" . $this->collate;

            $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false

        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
        }catch(PDOException $e) {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}