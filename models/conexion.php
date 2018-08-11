<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=sistema2","root","");
		return $link;

	}

}