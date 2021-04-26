<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Insertar Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero</a></li>
              <li class="breadcrumb-item active">Insertar Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Añadir Producto</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form id="formPersonas">    
          <div class="card-body">

            <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputCity">Producto</label>
                          <input type="text" class="form-control" id="nombre" required>
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
                    <label for="inputPassword4">Modelo</label>
                    <input type="text" class="form-control" id="modelopresentacion" required>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCity">Precio</label>
                        <input type="number" class="form-control" id="pventa" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputState">Año</label>
                        <input type="text" class="form-control" id="anio" required>
                    </div>
                  
                    
                    <div class="form-group col-md-8">
                      <label for="inputPassword4">Comentario</label>
                      <input type="text" class="form-control" id="comentario" required>
                    </div>
                </div>
                                
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </fomr>
        <!-- /.card -->

        </section>
  

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="JS/insert.js"></script>

<?php
  include_once "./Views/parte_inferior.php"
?>

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