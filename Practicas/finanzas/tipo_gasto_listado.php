<?php
include('bd.php');
$usuario=$_SESSION['correo'];
$query="SELECT descripcion
		FROM tipo_gasto
		where usuario_correo='".$usuario."'
		 order by descripcion asc";
$result=bd_consulta($query);
?>

<table>
	<tr>
		<td> # </td> <td> Tipo de Gasto </td><td></td>
		<td><a href='index.php?op=25'> Agregar</a></td>
	</tr>
<?php
	for($i=1;$row=mysqli_fetch_assoc($result);$i++){

	echo "
<tr>
	<td> ".$i." </td> <td> ".$row['descripcion']." </td>
	<td><a href='index.php?op=22&desc=".$row['descripcion']."'> Editar</a></td>
	<td><a href='tipo_gasto_eliminar.php?desc=".$row['descripcion']
	."'> Eliminar</a></td>
</tr>";

	}
?>
</table>
