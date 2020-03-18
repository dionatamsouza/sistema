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
            	<h1 class="h3 mb-0 text-gray-800">Incluir novo funcionário</h1>
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
                				<div class="form-group row">
				                  	<div class="col-sm-6 mb-3 mb-sm-0">
				                    	<input type="text" class="form-control form-control-user" placeholder="Nome" name="nome" required>
				                  	</div>
				                  	<div class="col-sm-6">
				                    	<input type="text" class="form-control form-control-user" placeholder="Sobrenome" name="sobrenome" required>
				                  	</div>
				                </div>
				                <div class="form-group">
				                	<input type="email" class="form-control form-control-user" placeholder="E-mail" name="email" required>
				              	</div>
				              	<div class="form-group">
				                	<input type="password" class="form-control form-control-user" placeholder="Senha" name="senha" required>
				              	</div>
				              	<div class="form-group row">
				              		<div class="col-sm-6 mb-3 mb-sm-0">
					                	<select class="form-control form-control-user select" name="cargo" required>
					                		<option value>Selecione o cargo</option>
					                		<option value="1">Presidente</option>
											<option value="2">Vice Presidente</option>
											<option value="3">Gerencia de Vendas</option>
											<option value="4">Gerencia de Locações</option>
											<option value="5">Gerencia de Intermediações</option>
											<option value="6">Gerencia Financeira</option>
											<option value="7">Gerencia Administrativa</option>
											<option value="8">Gerencia de Condominios</option>
											<option value="9">Gerencia de Arrendamento Agropastoril</option>
											<option value="10">Secretaria</option>
											<option value="11">Corretor de Imóveis</option>
											<option value="12">Recepcionista</option>
											<option value="13">Telefonista</option>
											<option value="14">Contador</option>
											<option value="15">Departamento de Manutenção</option>
					                	</select>
					                </div>
					                <div class="col-sm-6">
					                	<input type="text" class="form-control form-control-user sp_celphones" placeholder="Telefone" name="telefone" maxlength="15" required>
					                </div>
				              	</div>
				              	<div class="form-group">
				                	<input type="file" class="form-control form-control-user select" name="avatar" required>
				              	</div>
				              	<input type="submit" name="cadastrar-funcionario" class="btn btn-primary btn-user btn-block" value="Cadastrar funcionário">
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