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
            <h1 class="m-0">Importar Excel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Importar Excel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </section>

    <div class="card">
      <div class="card-header">
        Importar Excel
      </div>
      <div class="card-body">
        <form class="login-form validate-form" id="formLogin" name="formLogin" method="POST" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <div class="custom-file"> 
              <input type="file" class="custom-file-input" id="excelfile" name="excelfile">
              <label class="custom-file-label" for="inputGroupFile02">Buscar Archivos</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary"  type='submit' name='enviar'>Subir</button>
            </div>
          </div>
        </form>
      </div>
    </div>

<?php
  include_once "Views/parte_inferior.php"
?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/excel.js"></script>

<style>
.card-header {
  background: #9ca2aa;
}

.layout-navbar-fixed .wrapper .content-wrapper {
  margin-top: 0px;
}
</style>
