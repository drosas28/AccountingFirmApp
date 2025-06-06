<?php

class DB{
   
    public $conn;
    private $servername;
    private $user;
    private $pass;
    private $db;

    public function __construct(){
        $this->servername = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "despacho"; 

    }

    public function connect(){
        //crear conexion 
		if (!($this->conn = mysqli_connect($this->servername, $this->user, $this->pass))){
			//print("Error al conectarse a la base de datos. <br>");
			exit();
		}else{
			//print("conexion exitosa.<br>");
		}

		//Conexion a la Base de datos
		if (!mysqli_select_db($this->conn,$this->db)){
			//print("Error al seleccionar la base de datos. <br>");
			exit();
		}else{
			//print("conexion exitosa a la base de datos [$this->db].<br>");
		}
        return $this->conn;
    }


}

?>