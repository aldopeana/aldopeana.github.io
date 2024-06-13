<?php
//validamos datos del servidor
$user = "id22154839_aldo0309";
$pass = "Aldo030907?";
$host = "localhost";
$datab = "id22154839_registro";
//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass, $datab);
//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$apellido = $_POST["apellido"] ;
$categoria = $_POST["categoria"] ;
$sueldo = $_POST["sueldo"] ;
//verificamos la conexion a base datos
if(!$connection)
{
echo "No se ha podido conectar con el servidor" .mysqli_error($mysqli);
}
else
{
echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
}
//indicamos el nombre de la base datos

//indicamos selecionar a la base datos
$db = mysqli_select_db($connection,$datab);
if (!$db)
{
echo "No se ha podido encontrar la Tabla";
}
else
{
echo "<h3>Tabla seleccionada:</h3>" ;
}
$instruccion_SQL = "INSERT INTO Empleados (Nombre, Apellidos,
Categoria, Sueldo) VALUES ('$nombre', '$apellido', '$categoria', '$sueldo')";
$resultado = mysqli_query($connection,$instruccion_SQL);
$consulta = "SELECT * FROM Empleados";
$result = mysqli_query($connection,$consulta);
if(!$result)
{
echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Apellidos</th></h1>";
echo "<th><h1>Categoria</th></h1>";
echo "<th><h1>Sueldo</th></h1>";
echo "</tr>";
while ($colum = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><h2>" . $colum['Nombre']. "</td></h2>";
echo "<td><h2>" . $colum['Apellidos']. "</td></h2>";
echo "<td><h2>" . $colum['Categoria'] . "</td></h2>";
echo "<td><h2>" . $colum['Sueldo'] . "</td></h2>";
echo "</tr>";
}
echo "</table>";
mysqli_close( $connection );
//echo "Fuera " ;
echo'<a href="datab.html"> Volver Atrás</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>consulta db</title>
<style type="text/css">
table {
border: solid 2px #7e7c7c;
border-collapse: collapse;
}
th, h1 {
background-color: #edf797;
}
td,th {
border: solid 1px #7e7c7c;
padding: 2px;
text-align: center;
}
</style>
</head>
<body>
</body>
</html>