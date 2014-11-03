<?php
    require "funciones.php";
	$con=conectar();
	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ITQ Comunica</title>
<link href="../estilos/otro.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div class="centerAlign">
 <a href="#" class="logo"></a>
  <p class="call">442-2274400<br /><span>ejemplo@comunicateITQ.com</span></p>
  <ul id="menu">
   <li><a href="index.html">Inicio</a></li>
   <li><a href="vermensjes.php">Mensajes</a></li>
   <li><a href="eventos.html">Eventos</a></li>
   <li><a href="ligas.html">Ligas</a></li>
   <li class="ml"><a href="http://www.Sisteqmas.html">Sistqmas</a></li>
   <li><a href="http://www.itq.edu.mx">ITQ</a></li>
   <li><a href="http://www.facebook.com/mensajes.itq">Facebook</a></li>
   <li><a href="http://www.titter.com/mensajes.itq">Twitter</a></li>
  </ul>
  <p class="t1">"La Tierra <span>será </span> como sean los hombres."</p>
  <h1>~ Comunicate con nostros ~<br /> Avisos.</h1>
  <p class="cnt">Fusce ultrices tincidunt mauris, vitae ornare felis varius vehicula. Nullam tincidunt dignissim erat in tempus. Vestibulum hendrerit, magna at mattis bibendum, dolor nibh congue risus, eget laoreet sapien sapien non nulla. Morbi molestie blandit orci suscipit pulvinar. Curabitur quis erat at lectus feugiat placerat.</p>
  <a href="#" class="dl"></a>
  <hr />
  <div class="smallWrap first">
   <h2>Contesta Mensaje</h2>
   <?php
   if(!isset($_POST['btn_contesta'])) {
		$id=$_GET['id_padre'];
		echo "<form name='contesta_mensaje' action='contesta_mensaje.php' method='post'>
		<input type='hidden' name='id_padre' value='".$id."'>
		<textarea name='form_mensaje_respuesta' col='50' rows='5'>Mensaje
		</textarea>
		<input type='submit' name='btn_contesta' value='Contestar'>
</form>"; ;
	}else {
		$id=$_POST['id_padre'];
		
		
		
		$query="INSERT INTO mensajes (id_mensaje, id_padre,asunto,id_usuario,descripcion,
      id_categoria,fecha_publicacion) 
		VALUES (NULL, '".$id."', 'REspuesta', '".$_SESSION['id_usuario']."', '".$_POST['form_mensaje_respuesta']."',
     '2', '2014-10-22');";
		if(!$resultado=mysqli_query($con, $query)) {echo "Error".mysqli_error($con);} else{
				
				header('Location: /mensajes/php/vermensajes.php');
				
			echo "<a href='vermensajes.php'>Regresar</a>";}	}?>
  </div>
  
  <hr />
  <h3 class="mt">Maecenas dignissim</h3>
  <p>Suspendisse sollicitudin vestibulum luctus. Nulla dolor nunc, vestibulum a consequat at, vulputate ut magna. Aenean convallis odio odio. Phasellus feugiat eros id massa congue quis congue libero fermentum. In tellus lorem, varius nec vehicula a, pharetra in eros. Ut in nibh et risus lobortis tempor ut nec est. Phasellus ut interdum nisi. </p>
  <p>Morbi sed ligula magna, sit amet semper turpis. Nullam a felis nisl. Proin aliquam tempus tellus ac aliquam. Fusce commodo ultricies orci, pharetra elementum est dignissim ac. Suspendisse potenti. Donec nisi dolor, aliquet at mollis scelerisque, commodo eu nisl. Proin rhoncus, dui in fringilla fermentum, felis massa placerat mi, id sollicitudin augue diam in arcu. Fusce ornare urna vitae ante sagittis porttitor. Aliquam erat volutpat. </p>
  <hr />
   <h1>Nunc hendrerit  <span>portfolio</span> sollicitudin nibh, a lobortis</h1>
   <p class="mtc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tortor odio, hendrerit et bibendum ultricies, hendrerit sed augue.</p>
  <hr />
  <ul class="list">
   <li><h4>25/12/2010</h4><p>Quisque pulvinar sem purus, sit amet fermentum justo. In eu lorem lacus. Aliquam bibendum adipiscing.</p></li>
   <li><h4>25/12/2010</h4><p>Quisque pulvinar sem purus, sit amet fermentum justo. In eu lorem lacus. Aliquam bibendum adipiscing.</p></li>
   <li><h4>25/12/2010</h4><p>Quisque pulvinar sem purus, sit amet fermentum justo. In eu lorem lacus. Aliquam bibendum adipiscing.</p></li>
   <li><h4>25/12/2010</h4><p>Quisque pulvinar sem purus, sit amet fermentum justo. In eu lorem lacus. Aliquam bibendum adipiscing.</p></li>
  </ul>
  
  <blockquote><span>Blockquote</span> Donec dignissim bibendum interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris leo nunc, faucibus et varius non, ullamcorper nec mauris.</blockquote>
  <hr />
  <p class="copy">© Copyright Información.<br /></p>
  <ul class="foot">
   <li><a href="#">Políticas de privacidad</a> |</li>
   <li><a href="#">Terminos de Uso </a>|</li>
   <li><a href="#">FAQ</a>|</li>
   <li><a href="#">Mapa del sitio</a></li>
  </ul>
  <hr />
 </div>
</body>
</html>
<?php
mysqli_close($con);
?>
