<?php
function conectar(){
	$conecta=mysqli_connect("localhost", "red_itq", "09141133", "red_itq");
	if(!$conecta) {echo "Error".mysqli_connect_error($conecta). "no.".mysqli_connect_errno($conecta);}
	else {
		return $conecta;
	}
	
}

function mostrar_mensajes_inicio($con){
	$query="select * from mensajes where id_padre='0' order by id_mensaje desc limit 5";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".$muestra['descripcion']."<a href='php/contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}}

function mostrar_mensajes($con){
	$query="select * from mensajes where id_padre='0' order by id_mensaje desc";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".utf8_encode($muestra['descripcion'])."<a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br><a href='ver_respuesta_mensaje.php?id=".$muestra['id_mensaje']."'> Ver respuestas</a><br>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}
	
	
}
function mensajes_respuesta($padre,$link){
	
	$query="select * from mensajes where id_padre='".$padre."'";
	
	if (!$resultado=mysqli_query($link,$query)) {echo "Error". mysqli_error($link);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "".utf8_encode($muestra['descripcion'])."</br></span>";
	}

	}


	
}
function ver_tipo_usuario($con){
	$query="select * from tipo_usuario";
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "".utf8_encode($muestra['descripcion']);
		if($_SESSION['tipo_usuario']==1){

		echo "<a href='eliminar_tipo_usuario.php?id_eliminar=".$muestra['id_tipo_usuario']."'>eliminar</a></br></span>";
	}
	}

	}
 
}
function validar(){
	if (!isset($_SESSION['login'])) {
	header("location:sinacceso.php");	
	}else{
		return true;
	}
}
function salir(){
	session_destroy();
}







































