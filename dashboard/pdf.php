<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="Views/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="Views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Views/dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="Views/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/dist/css/adminlte.min.css">
  <!-- Data TABLE -->

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> 

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"/>
  <link rel="stylesheet" type="text/css" href="  https://cdn.datatables.net/1.10.23/css/dataTables.material.min.css"/>

    </head>
    <body>

    <?php

        include_once './bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        //Consulta de la proforma
        $consult = "SELECT id, codigo1, nombre, marca, precio FROM producto as pro WHERE pro.isSelected = 1";

        $consulta = $consult;			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();      
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        $consulta = "SELECT SUM(precio) as sumat FROM producto where isSelected = 1";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
       
        $conexion = NULL;
    ?>

<div class="card text-center">
  
  <div class="card-header">
  <img class="rounded float-left" src="../dashboard/img/logo.jpeg" alt="Card image cap">
    <p class="centrado font-weight-bold" >AUTOPARTES<br>ROSTRAN<br>
    <br>Cliente: <?php echo $_GET["nombre"];?>
  </div>
  
  <div class="card-body">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>Codigo 1</th>
                <th>Producto</th>
                <th>Marca</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dat) { ?>
            <tr>
                <td><?php echo $dat['codigo1']; ?></td>
                <td><?php echo $dat['nombre']; ?></td>
                <td><?php echo $dat['marca']; ?></td>                                        
                <td><?php echo $dat['precio']; ?></td>                    
            </tr>                        
            <?php } ?>
        </tbody>
        <tfooter>
            <tr>
                <th></th>
                <th></th>
                <th>TOTAL: </th>
                <th> <?php echo $data1[0]["sumat"]; ?> </th>
            </tr>
        </tfooter>
    </table>    
  </div>
  
  <div class="card-footer text-muted">
    <p class="centrado">¡GRACIAS!<br></p><P class="centrado">PROFORMA</P>
  </div>

</div>

    </body>
</html>

<script>
window.print();
</script>

<style>


/* Elemento | http://localhost/administracion/Web%20Rostran/dashboard/pdf.php?nombre=juan */

.card {
  /* left: ''; */
  left: ';
  right: 0px;
  left: 0px;
  margin-left: 100px;
  margin-right: 100px;
  margin-top: 0px;
}


/* Elemento | http://localhost/administracion/Web%20Rostran/dashboard/pdf.php?nombre=juan */

.rounded {
  margin-left: 247px;
}

/* Elemento | http://localhost/administracion/Web%20Rostran/dashboard/pdf.php?nombre=juan */

.font-weight-bold {
  margin-top: 57px;
  margin-right: 248px;
}



</style>