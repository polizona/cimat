<html>
       <head>
	<Title>Proyecto de muestra CIMAT</Title>
        <meta charset="UTF-8"/>
        <meta charset="iso-8859-1"/>
        <link href="index.css" rel="stylesheet" type="text/css">
   </head>
   <body>
        <h2>
    
         <a class="titulo"> </a> 
         <a class="boton" href="index.php">Inicio</a>
         <a class="boton" href="genero.php">Consulta por género</a>
         <a class="boton" href="edad.php">Consulta por edad</a>
         
     </h2>
     <center><br>
 	    <h1><br><br>Gilberto Antonio Ramírez Flores<br>
	    Proyecto muestra para CIMAT</h1></font>
            <br><br>
            <h1>Bicis retiradas por género en enero de 2022</h1>
	<center>
<?PHP
require_once 'global.php';
 	
		
        $conexion = mysqli_connect(HOSTNAME,USER,PASSWORD,BD);		
		$consulta="select day(Fecha_Retiro) as dia, Genero_Usuario, count(*) as cantidad from bicis where Fecha_Retiro>'2021-12-31' group by Fecha_Retiro, Genero_Usuario";
		$resultado=mysqli_query($conexion,$consulta);
		if($conexion){
			echo "<table>";
			echo "<th> Dia</th>";
			echo "<th> Genero</th>";
			echo "<th> Cantidad</th>";
			while($registro=mysqli_fetch_array($resultado)){

				echo "<tr>";
					echo "<td>".$registro['dia']." </td>";
					echo "<td>".$registro['Genero_Usuario']." </td>";
					echo "<td>".$registro['cantidad']." </td>";
				echo "</tr>";
			}
			
			echo "</table>";
			
			mysqli_close($conexion);
		}
		else{
			echo "error";
		}
		
			
	?>
	</body>
</html>
