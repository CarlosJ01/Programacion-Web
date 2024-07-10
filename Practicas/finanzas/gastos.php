<?php
  //Sacarlos de la base de datos
  include('bd.php');
  $usr=$_SESSION['correo'];
?>

<script type="text/javascript">
  function calcularTotal(){
    var tabla = document.getElementById("Tabla");
    var monto = 0;
    for (var i = 0; i < tabla.row.length ; i++) {
      monto = parseFloat(monto) + parseFloat(document.getElementById("monto" + i).value)
    }
    document.getElementById("total").value = monto;
  }
</script>

<section id="seccion">
  <form action="regisroGastoProcesa.php" name="Formulario" method="get">
    <table class="Tabla" id="Tabla">
      <thead>
        <td> # </td>
        <td>Fecha</td>
        <td>Tipo</td>
        <td>Descripcion</td>
        <td>Lugar</td>
        <td>Monto</td>
      </thead>
      <?php
      $qry='SELECT fecha, tipo_gasto_descripcion AS tipo, descripcion, lugar, monto FROM gasto WHERE tipo_gasto_usuario_correo ="'.$usr.'"';
      $res=bd_consulta($qry);
        for ($i=1;$row=mysqli_fetch_assoc($res);$i++) {
          echo "
            <tr>
              <td>".$i."</td>
              <td>".$row['fecha']."</td>
              <td>".$row['tipo']."</td>
              <td>".$row['descripcion']."</td>
              <td>".$row['lugar']."</td>
              <td>".$row['monto']."</td>
            </tr>
          ";
        }
      ?>

      <?php
        $qry = 'SELECT descripcion FROM tipo_gasto WHERE usuario_correo="'.$usr.'" ORDER BY descripcion';
        $res = bd_consulta($qry);
      ?>
      <tbody>
        <?php for ($i=0; $i<15 ; $i++) {?>
            <tr>
              <td><input type="text" value="<?php if ($i<9) echo "0".($i+1); else echo $i+1;?>" readonly></td>
              <td><input type="date" value='<?php echo Date("Y-m-d");?>' name="fecha<?php echo $i;?>"></td>
              <td>
                <select name="tipo_gasto<?php echo $i;?>">
                  <option></option>
                  <?php
                      mysqli_data_seek($res,0);
                      $cont = 0;
                      while ($fila = mysqli_fetch_assoc($res)) {?>
                        <option><?php echo $fila['descripcion']; ?></option>
                <?php $cont++;}?>
                </select>
              </td>
              <td><input type="text" name="descripcion<?php echo $i;?>"></td>
              <td><input type="text" name="lugar<?php echo $i;?>"></td>
              <td><input type="text" name="monto<?php echo $i;?>" id="monto<?php echo $i;?>" onchange="calcularTotal();"></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <div style="background: #000000">
      <input type="text" name="total" id="total" value="" readonly>
    </div>
    <input type="submit" name="" value="Enviar" class="Boton">
  </form>
</section>
