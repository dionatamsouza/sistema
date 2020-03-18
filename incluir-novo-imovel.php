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
					                		<option value disabled>Selecione o tipo</option>
					                		<option value="1">Locação</option>
											<option value="2">Venda</option>
											<option value="3">Rurais</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-6">
				                    	<select class="form-control form-control-user select" name="tipodepropriedade" required>
					                		<option value disabled>Selecione o tipo de propriedade</option>
					                		<option value="1">Comercial - Área Comercial</option>
											<option value="2">Comercial - Barracão</option>
											<option value="3">Comercial - Empresa</option>
											<option value="4">Comercial - Prédio</option>
											<option value="5">Comercial - Sala</option>
											<option value="6">Comercial - Terreno</option>
											<option value="7">Industrial - Área Industrial</option>
											<option value="8">Industrial - Barracão</option>
											<option value="9">Industrial - Prédio</option>
											<option value="10">Industrial - Terreno</option>
											<option value="11">Residencial - Apartamento</option>
											<option value="12">Residencial - Apartamento Duplex</option>
											<option value="13">Residencial - Área Residencial</option>
											<option value="14">Residencial - Casa</option>
											<option value="15">Residencial - Prédio</option>
											<option value="16">Residencial - Quitinete</option>
											<option value="17">Residencial - Sobrado</option>
											<option value="18">Residencial - Terreno</option>
											<option value="19">Fazendas</option>
											<option value="20">Rural - Área Preservação Permanente</option>
											<option value="21">Rural - Área Rural</option>
											<option value="22">Rural - Chácara</option>
											<option value="23">Rural - Granja</option>
											<option value="24">Rural - Sítio</option>
											<option value="25">Carta de Crédito</option>
											<option value="26">Lançamento Imobiliário</option>
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
				                  	<input type="text" class="form-control form-control-user money" placeholder="Valor" name="valor" required>
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
									<div class="sidebar-heading">Espaço Externo</div><hr class="sidebar-divider margin-top-0">
									<div class="checkbox">
										<input type="checkbox" id="edicula" name="edicula">
										<label for="edicula">Edícula</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="horta" name="horta">
									    <label for="horta">Horta</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="jardim" name="jardim">
									    <label for="jardim">Jardim</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="pomar" name="pomar">
									    <label for="pomar">Pomar</label>
									</div>
								</div>
								<div class="form-group">
									<div class="sidebar-heading">Espaço Interno</div><hr class="sidebar-divider margin-top-0">
									<div class="checkbox">
										<input type="checkbox" id="areadeservico" name="areadeservico">
										<label for="areadeservico">Área de Serviço</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="bar" name="bar">
										<label for="bar">Bar</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="biblioteca" name="biblioteca">
										<label for="biblioteca">Biblioteca</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="closet" name="closet">
										<label for="closet">Closet</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="copa" name="copa">
										<label for="copa">Copa</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="despensa" name="despensa">
										<label for="despensa">Despensa</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="escritorio" name="escritorio">
										<label for="escritorio">Escritório</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="lareira" name="lareira">
										<label for="lareira">Lareira</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="lavabo" name="lavabo">
										<label for="lavabo">Lavabo</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="saladeestar" name="saladeestar">
										<label for="saladeestar">Sala de Estar</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="saladeginastica" name="saladeginastica">
										<label for="saladeginastica">Sala de Ginástica</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="saladejantar" name="saladejantar">
										<label for="saladejantar">Sala de Jantar</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="saladetv" name="saladetv">
										<label for="saladetv">Sala de TV</label>
									</div>
								</div>
								<div class="form-group">
									<div class="sidebar-heading">Condomínio</div><hr class="sidebar-divider margin-top-0">
									<div class="checkbox">
										<input type="checkbox" id="acessoadeficientes" name="acessoadeficientes">
										<label for="acessoadeficientes">Acesso à Deficientes</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="geradordeenergia" name="geradordeenergia">
									    <label for="geradordeenergia">Gerador de Energia</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="guarita" name="guarita">
									    <label for="guarita">Guarita</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="lavanderiacoletiva" name="lavanderiacoletiva">
									    <label for="lavanderiacoletiva">Lavanderia Coletiva</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="medicaoaguaindividual" name="medicaoaguaindividual">
									    <label for="medicaoaguaindividual">Medição Água Individual</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="portaria24horas" name="portaria24horas">
									    <label for="portaria24horas">Portaria 24 Horas</label>
									</div>
								</div>
								<div class="form-group">
									<div class="sidebar-heading">Lazer/Entretendimento</div><hr class="sidebar-divider margin-top-0">
									<div class="checkbox">
										<input type="checkbox" id="areaverde" name="areaverde">
										<label for="areaverde">Área Verde</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="bicicletario" name="bicicletario">
									    <label for="bicicletario">Bicicletário</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="brinquedoteca" name="brinquedoteca">
									    <label for="brinquedoteca">Brinquedoteca</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="campodefutebolsuico" name="campodefutebolsuico">
									    <label for="campodefutebolsuico">Campo de Futebol Suíço</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="churrasqueira" name="churrasqueira">
									    <label for="churrasqueira">Churrasqueira</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="duchaexterna" name="duchaexterna">
									    <label for="duchaexterna">Ducha externa</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="pesqueiro" name="pesqueiro">
									    <label for="pesqueiro">Pesqueiro</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="piscina" name="piscina">
									    <label for="piscina">Piscina</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="playground" name="playground">
									    <label for="playground">Playground</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="quadradeesportes" name="quadradeesportes">
									    <label for="quadradeesportes">Quadra de Esportes</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="quadratenis" name="quadratenis">
									    <label for="quadratenis">Quadra Tênis</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="salaginasticafitness" name="salaginasticafitness">
									    <label for="salaginasticafitness">Sala Ginástica/Fitness</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="salaodefestas" name="salaodefestas">
									    <label for="salaodefestas">Salão de Festas</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="salaodejogos" name="salaodejogos">
									    <label for="salaodejogos">Salão de Jogos</label>
									</div>
									<div class="checkbox">
									    <input type="checkbox" id="sauna" name="sauna">
									    <label for="sauna">Sauna</label>
									</div>
								</div>
								<div class="form-group">
									<div class="sidebar-heading">Segurança</div><hr class="sidebar-divider margin-top-0">
									<div class="checkbox">
										<input type="checkbox" id="alarme" name="alarme">
										<label for="alarme">Alarme</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="cameradevigilancia" name="cameradevigilancia">
										<label for="cameradevigilancia">Câmera de vigilância</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="fechadurareforcada" name="fechadurareforcada">
										<label for="fechadurareforcada">Fechadura reforçada</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="interfone" name="interfone">
										<label for="interfone">Interfone</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="murocomcercaeletrica" name="murocomcercaeletrica">
										<label for="murocomcercaeletrica">Muro com cerca elétrica</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="portaoeletronico" name="portaoeletronico">
										<label for="portaoeletronico">Portão Eletrônico</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="vigilancia24h" name="vigilancia24h">
										<label for="vigilancia24h">Vigilância 24h</label>
									</div>
								</div>
								<hr class="sidebar-divider">
				                <div class="form-group">
				                  	<input type="file" class="form-control form-control-user select" name="fotoimovel[]" multiple required>
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