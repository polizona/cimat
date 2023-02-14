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
            <h1>Bicis retiradas por rango de edad en enero de 2022</h1>
	<center>
<?PHP
require_once 'global.php';
 	
		
        $conexion = mysqli_connect(HOSTNAME,USER,PASSWORD,BD);		
		$consulta="SELECT day(Fecha_Retiro) as dia,  count(*) as bicis_retiradas,
CASE
    WHEN Edad_Usuario > 15 and Edad_Usuario < 21 THEN 'de 15 a 20'
    WHEN Edad_Usuario > 20 and Edad_Usuario < 26 THEN 'de 21 a 25'
    WHEN Edad_Usuario > 25 and Edad_Usuario < 31 THEN 'de 26 a 30'
    WHEN Edad_Usuario > 30 and Edad_Usuario < 36 THEN 'de 31 a 35'
    WHEN Edad_Usuario > 35 and Edad_Usuario < 41 THEN 'de 36 a 40'
    WHEN Edad_Usuario > 40 and Edad_Usuario < 46 THEN 'de 41 a 45'
    WHEN Edad_Usuario > 45 and Edad_Usuario < 51 THEN 'de 46 a 50'
    WHEN Edad_Usuario > 50 and Edad_Usuario < 56 THEN 'de 51 a 55'
    WHEN Edad_Usuario > 55 and Edad_Usuario < 61 THEN 'de 56 a 60'
    WHEN Edad_Usuario > 60 and Edad_Usuario < 66 THEN 'de 61 a 65'
    ELSE 'mayores a 65'
END as rango
FROM bicis
    where Fecha_Retiro>'2021-12-31'
  group by Fecha_Retiro, rango
    order by Fecha_Retiro, rango";
		$resultado=mysqli_query($conexion,$consulta);
		if($conexion){
			echo "<table>";
			echo "<th> Día</th>";
			echo "<th> Bicis Retiradas</th>";
			echo "<th> Rango de edad</th>";
			while($registro=mysqli_fetch_array($resultado)){

				echo "<tr>";
					echo "<td>".$registro['dia']." </td>";
					echo "<td>".$registro['bicis_retiradas']." </td>";
					echo "<td>".$registro['rango']." </td>";
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
