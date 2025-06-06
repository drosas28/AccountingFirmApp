<?php 
    include ("DB.php");
    header("Content-type: text/json");

    class agenda extends DB {

        public function obtenerAgenda(){
            $result = $this->connect()->query("SELECT * FROM agenda order by id_cita");
            return $result;
        }

        public function obtenerFechasvistaUsuario($id){ /* obtencion de fechas para vista usuario*/
            $sql = "SELECT fecha_inicio,fecha_fin FROM agenda WHERE NOT id_cliente= '" .$id. "'";
            $result = $this->connect()->query($sql);
            $hor= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "title" => "Meeting",
                        "start" => $row['fecha_inicio'],
                        "end" => $row['fecha_fin'],
                        "color" => "#DBBFE7",
                    );
                    array_push($hor, $item);
                }
                return $hor;
            }else{
                return array('mensaje' => 'No hay elementos');
            }
        }

        public function obtenerCitasUsuario($id){
            $sql = "SELECT titulo, fecha_inicio, fecha_fin FROM agenda WHERE id_cliente='" .$id. "'";
            $result = $this->connect()->query($sql);
            $citas= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "title" => $row['titulo'],
                        "start" => $row['fecha_inicio'],
                        "end" => $row['fecha_fin'],
                        "color" => "#83C49E",
                    );
                    array_push($citas, $item);
                }
                return $citas;
            }else{
                return array('mensaje' => 'No hay elementos');
            }
        }

        public function nombre_Cliente($id){
            $sql = "SELECT nombre, apellido_p, apellido_m FROM clientes WHERE id_cliente ='" .$id. "'";
            $result = $this->connect()->query($sql);
            $nombre["items"] = array(); 
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $item = array(
                    "nom" => $row['nombre'],
                    "ap" => $row['apellido_p'],
                    "am" => $row['apellido_m'],
                );
                array_push($nombre["items"], $item);
            }
            return $nombre;
        }

        public function datos_cliente($id){
            $sql = "SELECT correo, num_telefono, num_local, direccion FROM clientes WHERE id_cliente = '" .$id . "'";
            $result = $this->connect()->query($sql); 
            $info["items"] = array();
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $item = array(
                    "correo" => $row['correo'],
                    "num_telefono" => $row['num_telefono'],
                    "num_local" => $row['num_local'],
                    "direccion" => $row['direccion'],
                );
                array_push($info["items"], $item);
            }
            return $info;
        }

        public function maximo(){ //Busca el id maximo (citas) para agregar al siguiente id 
            $max = 0;
            $sql = "SELECT max(id_cita) maximo FROM agenda";

            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $max=$row["maximo"];
                }
                $max = $max + 1;
            }
            return $max;
        }

        public function mostrar(){ /* (1) */
            $res = $this->obtenerAgenda();
            $agn["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "id_cliente" => $row['id_cliente'],
                        "id_cita" => $row['id_cita'],
                        "titulo" => $row['titulo'],
                        "descripcion" => $row['descripcion'],
                        "costo" => $row['costo'],
                        "fecha_inicio" => $row['fecha_inicio'],
                        "fecha_fin" => $row['fecha_fin'],
                        "estatus" => $row['estatus'],
                        "lugar" => $row['lugar'],
                    );
                    array_push($agn["items"], $item);
                }
                echo json_encode($agn);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }          
        }

        public function agendarCita ($id_c, $id, $titulo, $des, $f_inicio, $f_fin, $lugar){ /* (2) */
            $costo = "0";
            $estatus = "Activa";
            $sql = "INSERT INTO agenda(id_cliente, id_cita, titulo, descripcion, costo, fecha_inicio, fecha_fin, estatus, lugar) VALUES ('".$id."', '".$id_c."', '".$titulo."', '".$des."', '".$costo."', '".$f_inicio."', '".$f_fin."', '".$estatus."', '".$lugar."')";
            $result = $this->connect()->query($sql);
        }

        public function eliminar($id_cita){ /* (3) */
            $sql = "DELETE FROM agenda WHERE id_cita='". $id_cita . "'";
            $result = $this->connect()->query($sql);
        }


        public function cuentaCitas_cliente($id){ /* (4) */
            $sql = "SELECT count(*) FROM agenda WHERE id_cliente='".$id."'";
            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $cuenta=$row["count(*)"];
                }
            }
            //return $cuenta;
            echo json_encode($cuenta);
        }


        public function mostarInfo_Cliente_Agenda(){ /* (5) */
            $res = $this->obtenerAgenda();
            $todo["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "id_cliente" => $row['id_cliente'],
                        "id_cita" => $row['id_cita'],
                        "titulo" => $row['titulo'],
                        "descripcion" => $row['descripcion'],
                        "costo" => $row['costo'],
                        "fecha_inicio" => $row['fecha_inicio'],
                        "fecha_fin" => $row['fecha_fin'],
                        "estatus" => $row['estatus'],
                        "lugar" => $row['lugar'],
                        "Cliente" => $this->nombre_Cliente($row['id_cliente']),
                        "Datos" => $this->datos_cliente($row['id_cliente']),

                    );
                    array_push($todo["items"], $item);
                }
                echo json_encode($todo);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            } 

        }

        public function mostrarInfo_citaXCliente($id){ /* (6) */ 
            $sql = "SELECT * FROM agenda WHERE id_cliente = '" .$id . "'";
            $res = $this->connect()->query($sql);
            $citasxCliente["items"] = array();
            if($res->num_rows>0){
                while ($row = $res->fetch_assoc()){
                    $item = array(
                        "id_cliente" => $row['id_cliente'],
                        "id_cita" => $row['id_cita'],
                        "titulo" => $row['titulo'],
                        "descripcion" => $row['descripcion'],
                        "costo" => $row['costo'],
                        "start" => $row['fecha_inicio'],
                        "end" => $row['fecha_fin'],
                        "estatus" => $row['estatus'],
                        "lugar" => $row['lugar'],
                    );
                    array_push($citasxCliente["items"], $item);
                }
                echo json_encode($citasxCliente);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            } 
        }
        
        public function obtenerFechasPub(){ /* Obtencion de fechas para agenda publica (7)*/
            $sql = "SELECT fecha_inicio,fecha_fin FROM agenda";
            $result = $this->connect()->query($sql);
            $horarios= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "start" => $row['fecha_inicio'],
                        "end" => $row['fecha_fin'],
                    );
                    array_push($horarios, $item);
                }
                echo json_encode($horarios);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }
        }


        public function misCitas($id){ /*(8) */ 
            $result = array_merge($this->obtenerFechasvistaUsuario($id),$this->obtenerCitasUsuario($id));
            echo json_encode($result);
        }

        public function citasAdmin(){ /* 9 */
            $sql = "SELECT * FROM agenda";
            $result = $this->connect()->query($sql);
            $citas= array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $item = array(
                        "id" => $row['id_cita'],
                        "id_cliente" => $row['id_cliente'],
                        "title" => $row['titulo'],
                        "start" => $row['fecha_inicio'],
                        "end" => $row['fecha_fin'],
                        "des" => $row['descripcion'],
                        "costo" => $row['costo'],
                        "status" => $row['estatus'],
                        "lugar" => $row['lugar'],
                        "color" => "#F3BD68",
                    );
                    array_push($citas, $item);
                }
                echo json_encode($citas);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }
        }

        public function modificarCosto($id_cliente, $id_cita, $costo){ /* (10) */
            $sql = "UPDATE agenda SET costo = '".$costo. "' WHERE agenda.id_cliente ='".$id_cliente."' AND agenda.id_cita = '".$id_cita."'";
            $result = $this->connect()->query($sql); 
        }

        public function modificarEstado($id_cliente, $id_cita, $estado){
            $sql = "UPDATE agenda SET estatus = '".$estado."' WHERE agenda.id_cliente = '".$id_cliente."' AND agenda.id_cita = '".$id_cita."'";
            $result = $this->connect()->query($sql); 
        }
    }

    $ag = new agenda();
    $tipo = isset($_GET["tipo"])?$_GET["tipo"] :"1";
    if ($tipo == 1){ //mostrar ?tipo=1
        $ag->mostrar();
    }else if ($tipo == 2){ //agendar y mostrar 
        //"http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=2&id=" +id+ "&titulo=" +titulo+ "&des=" +des+ "&f_inicio=" +f_inicio+ "&f_fin=" +f_fin+ "&lugar=" +lugar+ "&r=" + Math.random();
        $id = isset($_GET['id'])?$_GET['id']:"";
        $titulo = isset($_GET['titulo'])?$_GET['titulo']:"";
        $des = isset($_GET['des'])?$_GET['des']:"";
        $f_inicio = isset($_GET['f_inicio'])?$_GET['f_inicio']:"";
        $f_fin = isset($_GET['f_fin'])?$_GET['f_fin']:"";
        $lugar = isset($_GET['lugar'])?$_GET['lugar']:"";
        if (($id != "") && ($titulo != "") && ($des != "") && ($f_inicio != "") && ($f_fin != "") && ($lugar != "")){
            $ag->agendarCita($ag->maximo(), $id, $titulo, $des, $f_inicio, $f_fin, $lugar);
        }
        $ag->mostrar();
    }else if($tipo == 3){ //eliminar y mostrar  
        //http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=3&id_cita=" +id_cita+ "&r=" + Math.random();
        $id_cita = isset($_GET["id_cita"])?$_GET["id_cita"] :"";
        $ag->eliminar($id_cita);
        $ag->mostrar();
    }else if($tipo == 4){
        $id = isset($_GET["id"])?$_GET["id"] :"";
        if($id != ""){
            $ag->cuentaCitas_cliente($id);
        }
        //$ag->cuentaCitas_cliente($id_cita);
        //$ag->mostrar();
    }else if ($tipo == 5){
        $ag->mostarInfo_Cliente_Agenda();
    }else if ($tipo == 6){
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $ag->mostrarInfo_citaXCliente($id);
    }else if($tipo == 7){
        $ag->obtenerFechasPub();
    }else if($tipo == 8){ //misCitas
        $id = isset($_GET["id"])?$_GET["id"] :"";
        $ag->misCitas($id);
    }else if ($tipo == 9){
        $ag->citasAdmin();
    }else if ($tipo == 10){
        //http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=10&id_cliente=" +id_cliente + "&id_cita=" +id_cita+ "&costo=" +costo+ "&r=" + Math.random();
        $id_cliente = isset($_GET['id_cliente'])?$_GET['id_cliente']:"";
        $id_cita = isset($_GET['id_cita'])?$_GET['id_cita']:"";
        $costo = isset($_GET['costo'])?$_GET['costo']:"";
        if (($id_cliente != "") && ($id_cita != "") && ($costo != "")){
            $ag->modificarCosto($id_cliente,$id_cita,$costo);
        }
        $ag->mostrar();
    }else if ($tipo == 11){
        //http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=11&id_cliente=" +id_cliente + "&id_cita=" +id_cita+ "&estado=" +estado+ "&r=" + Math.random();
        $id_cliente = isset($_GET['id_cliente'])?$_GET['id_cliente']:"";
        $id_cita = isset($_GET['id_cita'])?$_GET['id_cita']:"";
        $estado = isset($_GET['estado'])?$_GET['estado']:"";
        if (($id_cliente != "") && ($id_cita != "") && ($estado != "")){
            $ag->modificarEstado($id_cliente,$id_cita,$estado);
        }
        $ag->mostrar();
    }
    /*else if ($tipo == 4){ // modificar y mostrar 
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
    } */

?>