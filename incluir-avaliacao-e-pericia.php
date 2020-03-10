<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Incluir avaliação e perícia</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-6">
<?php
                  if(isset($msgsucess)) {
?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="Fechar">×</a>
                      <strong>Sucesso!</strong> <?php echo $msgsucess; ?>
                    </div>
<?php
                  }
?>
              		<div class="card shadow mb-4">
                		<div class="card-body">
                      <form class="user" method="POST" enctype="multipart/form-data">
				              	<div class="form-group">
                          <input type="text" class="form-control form-control-user"<?php if(isset($_GET['id'])) { ?> value="<?php echo $_GET['id']; ?>" <?php } ?> placeholder="Id do imóvel" name="iddoimovel" required>
                        </div>
                        <div class="form-group">
                          <label>Avaliação</label>
				                  <input type="file" class="form-control form-control-user select" name="avaliacao" required>
				                </div>
                        <div class="form-group">
                          <label>Perícia</label>
                          <input type="file" class="form-control form-control-user select" name="pericia" required>
                        </div>
				              	<input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar avaliação e perícia" name="cadastrar-avaliacao-e-pericia">
				            </form>
				        </div>
              		</div>
            	</div>
          	</div>
        </div>
      </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>