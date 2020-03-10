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
            	<h1 class="h3 mb-0 text-gray-800">Incluir novo imóvel</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-9">
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
                				<div class="form-group row">
				                  	<div class="col-sm-6 mb-3 mb-sm-0">
				                    	<select class="form-control form-control-user select" name="tipo" required>
					                		<option value>Selecione o tipo</option>
					                		<option value="1">Locação</option>
											<option value="2">Venda</option>
											<option value="3">Rurais</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-6">
				                    	<select class="form-control form-control-user select" name="tipodepropriedade" required>
					                		<option value>Selecione o tipo de propriedade</option>
					                		<option value="1">Terreno</option>
											<option value="2">Sala</option>
											<option value="3">Prédio</option>
					                	</select>
				                  	</div>
				                </div>
				                <div class="form-group row">
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
				                    	<select class="form-control form-control-user select" name="pais" required>
					                		<option value>Selecione o país</option>
					                		<option value="1" selected>Brasil</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-4">
				                  		<select class="form-control form-control-user select" name="estado" id="uf" disabled data-target="#cidade">
									        <option value="">Estado</option>
									    </select>
				                  	</div>
				                  	<div class="col-sm-4">
				                    	<select class="form-control form-control-user select" name="municipio" id="cidade" disabled required>
					                		<option value>Selecione o município</option>
					                	</select>
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<input type="text" class="form-control form-control-user" placeholder="Endereço" name="endereco" required>
				                </div>
				                <div class="form-group">
				                  	<input type="text" class="form-control form-control-user" placeholder="Valor" name="valor" required>
				                </div>
				                <div class="form-group">
				                  	<input type="text" class="form-control form-control-user" placeholder="Título" name="titulo" required>
				                </div>
				                <div class="form-group">
				                  	<textarea class="form-control form-control-user" placeholder="Descrição" name="descricao" required></textarea>
				                </div>
				                <div class="form-group row">
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
				                    	<input type="number" class="form-control form-control-user" placeholder="Número de dormitórios" name="numerodedormitorios" required>
				                  	</div>
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
					                	<input type="number" class="form-control form-control-user" placeholder="Área construída" name="areaconstruida" required>
				                  	</div>
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
					                	<input type="number" class="form-control form-control-user" placeholder="Área terreno total" name="areaterrenototal" required>
				                  	</div>
				                 </div>
				                 <div class="form-group">
				                  	<input type="file" class="form-control form-control-user select" name="fotoimovel" required>
				                </div>
				              	<input type="submit" name="cadastrar-imovel" class="btn btn-primary btn-user btn-block" value="Cadastrar imóvel">
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