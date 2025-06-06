<?php 
    include ("DB.php");
    header("Content-type: text/json");

    class administrador extends DB{

        function validar_admin($us, $pass){;
            $sql = "SELECT * FROM administrador WHERE usuario = '" . $us . "' and contraseña= '" . $pass. "' ";
            $consulta = $this->connect()->query($sql);;
            $datos = mysqli_num_rows($consulta);
            $fila = mysqli_fetch_row($consulta);
            
            if ($datos == 1){
                $_SESSION['id'] = $fila[0];
                $sql1 = "SELECT nombre, apellido_p, apellido_m FROM administrador WHERE id_admin ='" .$_SESSION['id']. "'";
                $result = $this->connect()->query($sql1);
                $nombre = mysqli_fetch_row($result);
                $_SESSION['nombre'] = "{$nombre[0]} {$nombre[1]} {$nombre[2]}";
                header("location: ../ProyectoWeb/inicioAdmin.php");
            }elseif ($datos > 1){
                print("Error al consultar la base de datos, contactar al Administrador");
            }elseif ($datos == 0){
                include ("session.php");
                header("location: ../ProyectoWeb/ingreso_admin_error1.php?err=0");
            }

        }

        function allInfoAdmin($id){ /* (5)*/
            $sql = "SELECT * FROM administrador WHERE id_admin ='".$id."'";
            $result = $this->connect()->query($sql);
            $informacion["item"]= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "id" => $row['id_admin'],
                        "nom" => $row['nombre'],
                        "ap" => $row['apellido_p'],
                        "am" => $row['apellido_m'],
                        "us" => $row['usuario'],
                        "dir" => $row['direccion'],
                        "email" => $row['correo'],
                        "tel" => $row['num_telefono'],
                        "local" => $row['num_local'],
                        "pass" => $row['contraseña'],
                    );
                    array_push($informacion["item"], $item);
                }
                echo json_encode($informacion);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }
        }

        public function modificar($id, $nom, $ap, $am, $us, $dir, $email, $tel, $local, $pass){ /* (2) */
            $sql = "UPDATE administrador SET nombre ='".$nom."', apellido_p='".$ap."', apellido_m='".$am."', usuario='".$us."', direccion='".$dir."', correo ='".$email."', num_telefono='".$tel."', num_local='".$local. "', contraseña='".$pass."' WHERE id_admin = '".$id."'";
            $result = $this->connect()->query($sql); 
        }
    }

    $admin = new administrador();
    $tipo = isset($_GET["tipo"])?$_GET["tipo"] :"";
    if ($tipo == 1){ //mostrar ?tipo=1
        //http://localhost/ProyectoWeb/conexion_DB/administrador.php?tipo=1&id=1
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $admin->allInfoAdmin($id);
    }else if ($tipo == 2){ // modificar y mostrar 
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $nom = isset($_GET['nom'])?$_GET['nom']:"";
        $ap = isset($_GET['ap'])?$_GET['ap']:"";
        $am = isset($_GET['am'])?$_GET['am']:"";
        $us = isset($_GET['us'])?$_GET['us']:"";
        $dir = isset($_GET['dir'])?$_GET['dir']:"";
        $email = isset($_GET['email'])?$_GET['email']:"";
        $tel = isset($_GET['tel'])?$_GET['tel']:"";
        $local = isset($_GET['local'])?$_GET['local']:"";
        $pass = isset($_GET['pass'])?$_GET['pass']:"";
        if ($id != "" || $nom != "" || $ap != "" || $am != "" || $us != "" || $dir != "" || $email != "" || $tel != "" || $local != ""  || $pass != ""){
            $admin->modificar($id, $nom, $ap, $am, $us, $dir, $email, $tel, $local, $pass);
        }
        $admin->allInfoAdmin($id);
    }



?>