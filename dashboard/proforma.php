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
              <li class="breadcrumb-item active">Proforma</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content-header -->

    <div class = "card">
      <div class = "card-header">Datos</div>
      <div class = "card-body">
        <div class="row">
          <div class="input-group col-7">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Nombre del Cliente</span>
            </div>
            <input type="text" id="nombredatos" name ="nombredatos" class="form-control">
          </div>
          <div class="input-group col-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Total</span>
            </div>
            <input type="text" id="monto" name ="monto" class="form-control" readonly>
          </div>
          <div class="input-group col-2">
              <button type="button" class="btn btn-warning" onclick = "borrado()">Borrado</button>&nbsp&nbsp&nbsp
              <button type="button" class="btn btn-success" onclick = "pdfile()"><i class="far fa-file-pdf"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Productos</div>
        <div class="card-body ">
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped" id = "tabl">
                <thead>
                  <tr>
                    <th hidden>id</th>
                    <th>Codigo 1</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Opcion</th>
                  </tr>
                </thead>
                <tbody id="tablita" name = "tablita">
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>  


<?php
  include_once "Views/parte_inferior.php"
?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/proforma.js"></script>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.card-header {
  background: #9ca2aa;
}

.layout-navbar-fixed .wrapper .content-wrapper {
  margin-top: 0px;
}


</style>
