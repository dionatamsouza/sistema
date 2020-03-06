<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>
<script>
  function tiraRelatorio() {
    var ini = document.getElementById("datainicio").value;  			
  }
</script>
<?php include_once("funcoes.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Caixa atual</h1>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Escolha um período para ver o relatório:</h6>
            </div>
            <div class="card-body">
              <form action="caixa.php" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6">  
                    <input type="text" class="form-control form-control-user" id="datainicio" name="datainicio" placeholder="Início" autocomplete="off" >
                  </div>
                  <div class="col-sm-6"> 
                    <input type="text" class="form-control form-control-user" id="datafinal" name="datafinal" placeholder="Final" autocomplete="off" >
                    <script type="text/javascript">
                      $('#datainicio').datepicker({ 
                        format: "dd/mm/yyyy", 
                        language: "pt-BR",
                        startDate: '-38600d',
                      });
                      $('#datafinal').datepicker({  
                        format: "dd/mm/yyyy", 
                        language: "pt-BR",
                        startDate: '-38600d',
                      });
                    </script>
                  </div>
                </div>
                <input type="submit" name="cadastrar-conta" class="btn btn-primary btn-user btn-block" value="Ver Relatório">
              </form>
            </div>
          </div>
          <div class="row">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Quem</th>
                  <th scope="col">Tipo</th>
                </tr>
              </thead>
              <tbody>
                <?php listarcaixa(); ?>   
              </tbody>
            </table>
          </div>
        </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>