<?php
    class CustomerData{
        var $user;
        var $password;
        var $host;
        var $database;
        var $connection;
        public function __construct(String $user, String $password, String $host, String $database){
            $this->user = $user;
            $this->password = $password;
            $this->host = $host;
            $this->database = $database;
        }
        public function get_connection(){
           $connection = mysqli_connect( $host, $user, $password) or die ("Error al conectar con servidor de Base de datos");
           if($connection){
                $select_db = mysqli_select_db( $connection, $database ) or die ( "Error al conectar con la base de datos establecida" );  
                if(!$select_db){
                    $connection = false;
                }             
           }else{
                $connection = false;
           }
           return $connection;
        }
        public function get_query(String $query){
            $results = "";
            if($connection){
                $sentence = strtolower(explode(" ", $query)[0]);
                if($sentence == "insert" || $sentence == "update"){
                    if(mysqli_query($connection, $query))
                        $results = true;
                    else
                        $results = false;
                }else if($sentence == "select"){
                    $results = mysqli_query($connection, $query);
                }
            }else{
                $mensaje = "Error de conexión";
            }
            return $results;
        }
    }
?>