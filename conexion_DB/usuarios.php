<?php 
    include ("DB.php");
    header("Content-type: text/json");

    class usuarios extends DB {

        public function obtenerUsuarios(){
            $result = $this->connect()->query("SELECT * FROM usuarios order by id_cliente");
            return $result;
        }

        public function mostrar(){
            $res = $this->obtenerUsuarios();
            $us["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "id_cliente" => $row['id_cliente'],
                        "usuario" => $row['usuario'],
                        "contrasena" => $row['contraseña'],
                        "imagen_name" => $row['imagen_name'],
                    );
                    array_push($us["items"], $item);
                }
                echo json_encode($us);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }          
        }

        public function maximo(){ //Busca el id maximo para agregar al siguiente id guardado 
            $max = 0;
            $sql = "SELECT max(id_cliente) maximo FROM usuarios";

            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $max=$row["maximo"];
                }
                $max = $max + 1;
            }
            return $max;
        }

        public function insertar($id, $us, $pass){
            $sql = "INSERT INTO usuarios(id_cliente, usuario, contraseña) VALUES ('".$id."','".$us."','".$pass."')";
            $result = $this->connect()->query($sql);
        }

        public function eliminar($id){
            $sql = "DELETE FROM usuarios WHERE id_cliente='". $id . "'";
            $result = $this->connect()->query($sql);
        }

        public function modificar($id, $us, $pass){
            $sql = "UPDATE usuarios SET usuario ='".$us."', contraseña='".$pass."' WHERE id_cliente = '".$id."'";
            $result = $this->connect()->query($sql); 
        }

        function validar_usuario($us, $pass){;
            $sql = "SELECT * FROM usuarios WHERE usuario = '" . $us . "' and contraseña= '" . $pass. "' ";
            $consulta = $this->connect()->query($sql);;
            $datos = mysqli_num_rows($consulta);
            $fila = mysqli_fetch_row($consulta);
            
            if ($datos == 1){
                $_SESSION['id'] = $fila[0];
                $sql1 = "SELECT nombre, apellido_p, apellido_m FROM clientes WHERE id_cliente ='" .$_SESSION['id']. "'";
                $result = $this->connect()->query($sql1);
                $nombre = mysqli_fetch_row($result);
                $_SESSION['nombre'] = "{$nombre[0]} {$nombre[1]} {$nombre[2]}";
                header("location: ../ProyectoWeb/usuario.php");
            }elseif ($datos > 1){
                print("Error al consultar la base de datos, contactar al Administrador");
            }elseif ($datos == 0){
                include ("session.php");
                header("location: ../ProyectoWeb/registro_error1.php?err=0");
            }

        }

        function allInfoUs($id){ /* (5)*/
            $sql = "SELECT clientes.nombre, clientes.apellido_p, clientes.apellido_m, clientes.direccion, clientes.correo, clientes.num_telefono, clientes.num_local, usuarios.usuario, usuarios.contraseña FROM clientes JOIN usuarios ON clientes.id_cliente='".$id."' AND usuarios.id_cliente='".$id."'";
            $result = $this->connect()->query($sql);
            $informacion["item"]= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "nombre" => $row['nombre'],
                        "ap" => $row['apellido_p'],
                        "am" => $row['apellido_m'],
                        "dir" => $row['direccion'],
                        "correo" => $row['correo'],
                        "tel" => $row['num_telefono'],
                        "local" => $row['num_local'],
                        "us" => $row['usuario'],
                        "pass" => $row['contraseña'],
                    );
                    array_push($informacion["item"], $item);
                }
                echo json_encode($informacion);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }
        }

    }

    $usuario = new usuarios();
    $tipo = isset($_GET["tipo"])?$_GET["tipo"] :"";
    if ($tipo == 1){ //mostrar ?tipo=1
        $usuario->mostrar();
        //echo $usuario->validar_usuario('TalO','159LA/*/');
    }else if ($tipo == 2){ //insertar y mostrar 
        //http://localhost/ProyectoWeb/conexion_DB/usuarios.php?tipo=2&us=" +us+ "&pass=" +pass+ "&r=" + Math.random();
        //$id = isset($_GET['id'])?$_GET['id']:"";
        $us = isset($_GET['us'])?$_GET['us']:"";
        $pass = isset($_GET['pass'])?$_GET['pass']:"";
        if (($us!= "") && ($pass != "")){
            $usuario->insertar($usuario->maximo(), $us, $pass);
        }
        $usuario->mostrar();
    }else if($tipo == 3){ //eliminar y mostrar  
        // http://localhost/ProyectoWeb/conexion_DB/usuarios.php?tipo=3&id=" +id+ "&r=" + Math.random();
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $usuario->eliminar($id);
        $usuario->mostrar();
    }else if ($tipo == 4){ // modificar y mostrar 
        // http://localhost/ProyectoWeb/conexion_DB/usuarios.php?tipo=4&id=" +id+ "&us=" +us+ "&pass=" +pass+ "&r=" + Math.random();
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $us = isset($_GET['us'])?$_GET['us']:"";
        $pass = isset($_GET['pass'])?$_GET['pass']:"";

        if ($id != "" || $us != "" || $pass != "" ){
            $usuario->modificar($id,$us, $pass);
        }
        $usuario->mostrar();
    }else if ($tipo == 5){ //informacion de todos los usuarios
        // http://localhost/ProyectoWeb/conexion_DB/usuarios.php?tipo=5&id=" +id
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $usuario->allInfoUs($id);
    }

?>