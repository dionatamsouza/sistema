<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>
<?php include_once("includes/funcoes.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contas a pagar e a Receber</h1>
          </div>
        	<script>
        		function tipodeconta(){
        			var e = document.getElementById("tipo");
              var selecionado = e.options[e.selectedIndex].value;
        			window.location = "listar-contas.php?tipo="+selecionado;
            }
        	</script>
        	<div class="d-sm-flex align-items-center justify-content-between mb-5">
          	<h3 class="h5 mb-0 text-gray-800">Selecine o tipo de conta</h3>
          	<select class="form-control form-control-user select" id="tipo" name="tipo" onchange='tipodeconta()' >
              <option value="0">Tipo de conta</option>
              <option value="1" onclick="teste()">Conta a Receber</option>
              <option value="2">Conta a Pagar</option>
  			    </select>
        	</div>
        	<table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
                <th scope="col">Quem</th>
                <th scope="col">Tipo</th>
                <th scope="col">Concluir</th>
              </tr>
            </thead>
            <tbody>
              <?php listarcontas(); ?>
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