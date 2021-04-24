<?php
  include_once "Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tablero Principal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vista de Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
      <div class="card-header">
        Productos
      </div>
      <div class="card-body">
        <div class="table-responsive"  style="margin-end:10px">
            <table id="tablaproductos" class="ui celled table" style="width:100%">
              <thead class="text-center">
                <tr>
                  <th>id</th>
                  <th>Codigo 1</th>
                  <th>Codigo 2</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Precio</th>
                  <th>Año</th>
                  <th>Notas</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
        </div>
<?php
  include_once "Views/parte_inferior.php"
?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id = "exampleModalCenter">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form id="formPersonas">    
            <div class="modal-body">
              <input type="text" hidden id="idpro" name="idpro">

              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="inputCity">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Codigo 1</label>
                      <input type="text" class="form-control" id="codigo1" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputZip">Codigo 2</label>
                      <input type="text" class="form-control" id="codigo2">
                  </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Marca</label>
                    <input type="text" class="form-control" id="marca" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Modelo / Presentacion</label>
                    <input type="text" class="form-control" id="modelopresentacion" required>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Precio</label>
                        <input type="number" class="form-control" id="pventa" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCity">Precio Anterior</label>
                        <input type="number" class="form-control" id="pante" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Año</label>
                        <input type="text" class="form-control" id="anio">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Comentario</label>
                      <input type="text" class="form-control" id="comentario">
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/siverside.js"></script>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.card-header {
  background: #9ca2aa;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-warning {
  margin-top: 32px;
}


/* adminlte.min.css | http://localhost/administracion/Virtual_Innova/dashboard/Views/dist/css/adminlte.min.css */

.layout-navbar-fixed .wrapper .content-wrapper {
  /* margin-top: calc(3.5rem + 1px); */
  /* margin-top: calc\(3.5rem +; */
  /* margin-top: calc\(3.5rem; */
  /* margin-top: calc\(3.5re; */
  /* margin-top: calc\(3.5r; */
  /* margin-top: calc\(3.5; */
  /* margin-top: calc\(3.; */
  /* margin-top: calc\(3; */
  /* margin-top: calc\(; */
  margin-top: 0px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-success {
  margin-right: 137px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.callout {
  /* border-left-width: 19px; */
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}
</style>

