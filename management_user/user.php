<?php
    include ('management_db\CustomerData.php');
    class Users{
        var $name;
        var $document;
        var $email;
        var $country;
        var $password;

        public function __construct(){}

        public function get_user($email){
            $conn = new CustomerData('root', '', 'localhost', 'prueba_php');
            $conn->get_connection();
            $query = 'SELECT * FROM users WHERE email = "' . $email . '" OR fullname LIKE "' . $email . '%"';
            $results = $conn->get_query($query);
            if(mysqli_num_rows($results)){
                $json = array();
                while($users = mysqli_fetch_assoc($results)){
                    array_push($json, $users);
                }
                $json = json_encode($json);
            }else{
                $json = 'No se encontraron resultados';
            }
        }
        public function insert_user(){

        }
    }

    /*
        https://www.datos.gov.co/resource/5hfn-b62q.json
    */
?>