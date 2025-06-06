<?php 
    include ("DB.php");
    header("Content-type: text/json");

    class clientes extends DB {

        public function obtenerClientes(){
            $result = $this->connect()->query("SELECT * FROM clientes order by id_cliente");
            return $result;
        }
        
        public function mostrar(){
            $res = $this->obtenerClientes();
            $cs["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "id_cliente" => $row['id_cliente'],
                        "nombre" => $row['nombre'],
                        "apellido_p" => $row['apellido_p'],
                        "apellido_m" => $row['apellido_m'],
                        "usuario" => $row['usuario'],
                        "direccion" => $row['direccion'],
                        "correo" => $row['correo'],
                        "num_telefono" => $row['num_telefono'],
                        "num_local" => $row['num_local'],
                        "num_citas" => $this->cuentaCitas_cliente($row['id_cliente']),
                    );
                    array_push($cs["items"], $item);
                }
                echo json_encode($cs);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }          
        }

        public function cuentaCitas_cliente($id){ 
            $sql = "SELECT count(*) FROM agenda WHERE id_cliente='".$id."'";
            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $cuenta=$row["count(*)"];
                }
            }
            return $cuenta;
            //echo json_encode($cuenta);
        }

        public function maximo(){ //Busca el id maximo para agregar al siguiente id guardado 
            $max = 0;
            $sql = "SELECT max(id_cliente) maximo FROM clientes";

            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $max=$row["maximo"];
                }
                $max = $max + 1;
            }
            return $max;
        }

        public function insertar($id, $nom, $a_p, $a_m, $us, $dir, $cor, $num_tel, $num_l){
            $sql = "INSERT INTO clientes(id_cliente, nombre, apellido_p, apellido_m, usuario, direccion, correo, num_telefono, num_local) VALUES ('".$id."','".$nom."','".$a_p."','".$a_m."','".$us."','".$dir."','".$cor."','".$num_tel."','".$num_l."')";
            $result = $this->connect()->query($sql);
        }

        public function eliminar($id_cliente){
            $sql = "DELETE FROM clientes WHERE id_cliente='". $id_cliente . "'";
            $result = $this->connect()->query($sql);
        }

        public function modificar($id, $nom, $a_p, $a_m, $us, $dir, $cor, $num_tel, $num_l){
            $sql = "UPDATE clientes SET nombre ='".$nom."', apellido_p='".$a_p."', apellido_m='".$a_m."', usuario='".$us."', direccion='".$dir."', correo ='".$cor."', num_telefono='".$num_tel."', num_local='".$num_l. "' WHERE id_cliente = '".$id."'";
            $result = $this->connect()->query($sql); 
        }
    }

    $clase = new clientes();
    $tipo = isset($_GET["tipo"])?$_GET["tipo"] :"1";
    if ($tipo == 1){ //mostrar ?tipo=1
        $clase->mostrar();
    }else if ($tipo == 2){ //insertar y mostrar 
        //"http://localhost/ProyectoWeb/conexion_DB/clientes.php?tipo=2&nom=" +nom+ "&a_p=" +ap+ "&a_m=" +am+ "&us=" +us+ "&dir=" +dir+ "&cor=" +cor+ "&num_tel=" +ntel+ "&num_l=" +l+ "&r=" + Math.random();
        $nom = isset($_GET['nom'])?$_GET['nom']:"";
        $a_p = isset($_GET['a_p'])?$_GET['a_p']:"";
        $a_m = isset($_GET['a_m'])?$_GET['a_m']:"";
        $us = isset($_GET['us'])?$_GET['us']:"";
        $dir = isset($_GET['dir'])?$_GET['dir']:"";
        $cor = isset($_GET['cor'])?$_GET['cor']:"";
        $num_tel = isset($_GET['num_tel'])?$_GET['num_tel']:"";
        $num_l = isset($_GET['num_l'])?$_GET['num_l']:"";
        if (($nom != "") && ($a_p != "") && ($a_m != "") && ($us != "") && ($dir != "") && ($cor != "") && ($num_tel != "") && ($num_l != "")){
            $clase->insertar($clase->maximo(), $nom, $a_p, $a_m, $us, $dir, $cor, $num_tel, $num_l);
        }
        $clase->mostrar();
    }else if($tipo == 3){ //eliminar y mostrar  
        //http://localhost/ProyectoWeb/conexion_DB/clientes.php?tipo=3&id=" +id+ "&r=" + Math.random();
        $id_cliente = isset($_GET["id_cliente"])?$_GET["id_cliente"] :"";
        $clase->eliminar($id_cliente);
        $clase->mostrar();
    }else if ($tipo == 4){ // modificar y mostrar 
        //http://localhost/ProyectoWeb/conexion_DB/clientes.php?tipo=4&id=" +id + "&nom=" +nom+ "&a_p=" +ap+ "&a_m=" +am+ "&us=" +us+ "&dir=" +dir+ "&cor=" +cor+ "&num_tel=" +ntel+ "&num_l=" +l+ "&r=" + Math.random();
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $nom = isset($_GET['nom'])?$_GET['nom']:"";
        $a_p = isset($_GET['a_p'])?$_GET['a_p']:"";
        $a_m = isset($_GET['a_m'])?$_GET['a_m']:"";
        $us = isset($_GET['us'])?$_GET['us']:"";
        $dir = isset($_GET['dir'])?$_GET['dir']:"";
        $cor = isset($_GET['cor'])?$_GET['cor']:"";
        $num_tel = isset($_GET['num_tel'])?$_GET['num_tel']:"";
        $num_l = isset($_GET['num_l'])?$_GET['num_l']:"";
        if ($id != "" || $nom != "" || $a_p != "" || $a_m != "" || $us != "" || $dir != "" || $cor != "" || $num_tel != "" || $num_l != ""){
            $clase->modificar($id, $nom, $a_p, $a_m, $us, $dir, $cor, $num_tel, $num_l);
        }
        $clase->mostrar();
    } 

?>