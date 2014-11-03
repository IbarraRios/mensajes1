<?php
function conectar(){
	$conecta=mysqli_connect("localhost", "red_itq", "10141823", "red_itq");
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
		echo "<span class='marker'>Tema:".$muestra['Asunto']."<br/></span>";
		echo "".$muestra['descripcion']."<a href='php/contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}}

function mostrar_mensajes($con){
	$query="select m.id_mensaje,m.id_padre,m.id_categoria,m.ID_usuario,m.Asunto,m.descripcion,u.id_usuario,u.id_tipo_usuario from mensajes m,usuarios u where m.id_padre='0'
	and u.id_usuario=m.ID_usuario order by id_mensaje desc";
	$bandera=1;
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<span class='marker'>Tema:".$muestra['Asunto']."<br/></span>";
		echo "".utf8_encode($muestra['descripcion']);
		//mensajes_respuesta($muestra['id_mensaje'],$con);
		
		if(validar()==true)
		{
			if($_SESSION['ID_usuario']==$muestra['ID_usuario']||$_SESSION['tipo_usuario']==3)
			{
				
				if($_SESSION['tipo_usuario']==3)//administrador reise
				{
					echo "<a href='eliminar_mensaje.php?id_eliminar=".$muestra['id_mensaje']."'> eliminar, </a></span>";
					echo "<a href='modificar_mensaje.php?id_modificar=".$muestra['id_mensaje']."'> Modificar </a></span>";
					if($_SESSION['tipo_usuario']==$muestra['id_tipo_usuario']&&$bandera==1)
					{
						echo "<a href='nuevo_mensaje.php?id_Agregar=".$muestra['id_tipo_usuario']."'>, Nuevo </a></br></span>";
						$bandera=0;
					}
				}
				else
				{
					if($_SESSION['tipo_usuario']==5||$_SESSION['tipo_usuario']==3)//Usuario registrado reise
					{
						
						echo "<a href='eliminar_mensaje.php?id_eliminar=".$muestra['id_mensaje']."'> eliminar, </a></span>";
						echo "<a href='modificar_mensaje.php?id_modificar=".$muestra['id_mensaje']."'> Modificar </a></span>";		
					}	
				}	
			}
		}
		echo "<a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br><a href='ver_respuesta_mensaje.php?id=".$muestra['id_mensaje']."'> Ver respuestas</a><br>";
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
	$query="select t.id_tipo_usuario,t.descripcion,u.id_usuario,u.nombre_largo from tipo_usuarios t, usuarios u where u.id_tipo_usuario=t.id_tipo_usuario";
	$bandera=1;
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado))
	{
		
		
			if($_SESSION['ID_usuario']==$muestra['id_usuario']||$_SESSION['tipo_usuario']==3)
			{
		
				if($_SESSION['tipo_usuario']==3)//administrador reise
				{
					if($_SESSION['ID_usuario']!=$muestra['id_usuario'])echo "</br>".utf8_encode($muestra['nombre_largo']);
					echo ", ".utf8_encode($muestra['descripcion']);
					echo "<a href='eliminar_tipo_usuario.php?id_eliminar=".$muestra['id_tipo_usuario']."'> eliminar, </a></span>";
					echo "<a href='modificar_tipo_usuario.php?id_modificar=".$muestra['id_tipo_usuario']."'> Modificar </a></span>";
					if($_SESSION['tipo_usuario']==$muestra['id_tipo_usuario']&&$bandera==1)
					{
						echo "<a href='Agregar_tipo_usuario.php?id_Agregar=".$muestra['id_tipo_usuario']."'>, Nuevo </a></br></span>";
						$bandera=0;
					}
				}
				else
				{
					if($_SESSION['tipo_usuario']==5)//Usuario registrado reise
					{
						echo ", ".utf8_encode($muestra['descripcion']);
						echo "<a href='eliminar_tipo_usuario.php?id_eliminar=".$muestra['id_tipo_usuario']."'> eliminar, </a></span>";
						echo "<a href='modificar_tipo_usuario.php?id_modificar=".$muestra['id_tipo_usuario']."'> Modificar </a></br></span>";		
					}else
					{
						if($_SESSION['tipo_usuario']==6)//Usuario invitado sistemas
						{
							echo ", ".utf8_encode($muestra['descripcion']);
							echo "<a href='Agregar_tipo_usuario.php?id_Agregar=".$muestra['id_tipo_usuario']."'> Nuevo </a></br></span>";
						}
					}	
				}	
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







































