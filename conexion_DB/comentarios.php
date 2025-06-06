<?php 
    include ("DB.php");
    header("Content-type: text/json");

    class comentarios extends DB {

        public function obtenerComent(){
            $result = $this->connect()->query("SELECT * FROM comentarios");
            return $result;
        }

        public function mostrar(){
            $res = $this->obtenerComent();
            $com["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "name" => $row['full_name'],
                        "email" => $row['email'],
                        "company" => $row['company'],
                        "mess" => $row['mess'],
                    );
                    array_push($com["items"], $item);
                }
                echo json_encode($com);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }          
        }

        public function insertar($name, $email,$company, $mess){
            $sql = "INSERT INTO comentarios(full_name, email, company, mess) VALUES ('".$name."','".$email."','".$company."','".$mess."')";
            $result = $this->connect()->query($sql);
            
        }
    }

    $com = new comentarios();
    $tipo = isset($_GET["tipo"])?$_GET["tipo"] :"";
    if ($tipo == 1){ //mostrar ?tipo=1
        $com->mostrar();
    }else if($tipo == 2){
        $name = isset($_GET['name'])?$_GET['name']:"";
        $email = isset($_GET['email'])?$_GET['email']:"";
        $company = isset($_GET['company'])?$_GET['company']:"";
        $mess = isset($_GET['mess'])?$_GET['mess']:"";
        if (($name!= "") && ($email != "") && ($company != "") && ($mess != "")){
            $com->insertar($name,$email,$company,$mess);
        }
        $com->mostrar();
    }



?>