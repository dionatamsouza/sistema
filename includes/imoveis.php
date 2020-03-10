<?php
  if(isset($_GET['imoveis'])) {
    $imoveis = $_GET['imoveis'];
    if(!empty($imoveis)) {
      $omsselect = "SELECT * from imoveis WHERE tipo=$tipopage AND imobiliaria_creci=$lgnimobiliaria_creci";
      try {
        $omsresult = $bdd->prepare($omsselect);
        $omsresult->execute();
        $omscontar = $omsresult->rowCount();
        if($omscontar>0) {
          while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
            $omsid = $omsmost->id;
            $omstitulo = $omsmost->titulo;
            $omsdescricao = $omsmost->descricao;
            $omstipo = $omsmost->tipo;
            $omstipodepropriedade = $omsmost->tipo_de_propriedade;
            $omsendereco = $omsmost->endereco;
            $omsvalor = $omsmost->valor;
            $omsnumerodedormitorios = $omsmost->numero_de_dormitorios;
            $omsareaconstruida = $omsmost->area_construida;
            $omsareaterrenototal = $omsmost->area_terreno_total;
            $omsfotoimovel = $omsmost->foto_imovel;
  ?>
            <div class="col-lg-9">
              <div class="card shadow mb-4">
                <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
                <img src="<?php echo $omsfotoimovel; ?>" width="100%">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $omstitulo; ?></h6>
                </div>
                <div class="card-body">
                  <p><strong>Descrição:</strong> <?php echo $omsdescricao; ?></p>
                  <p><strong>ID do anúncio:</strong> <?php echo $omsid; ?></p>
                  <p><strong>Tipo:</strong> <?php echo $omstipo; ?></p>
                  <p><strong>Tipo de propriedade:</strong> <?php echo $omstipodepropriedade; ?></p>
                  <p><strong>Endereço:</strong> <?php echo $omsendereco; ?></p>
                  <p><strong>Valor:</strong> <?php echo $omsvalor; ?></p>
                  <p><strong>Número de dormitórios:</strong> <?php echo $omsnumerodedormitorios; ?></p>
                  <p><strong>Área construída:</strong> <?php echo $omsareaconstruida; ?> m²</p>
                  <p><strong>Área terreno/total:</strong> <?php echo $omsareaterrenototal; ?> m²</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Calculadora</h6>
                </div>
                <div class="card-body">
                </div>
              </div>
            </div>
  <?php
          }
        }
      }
      catch(PDOException $e) {
        echo $e;
      }
    }
    else {
      header("Location: /");
    }
  }
  else {
    $omsselect = "SELECT * from imoveis WHERE tipo=$tipopage AND imobiliaria_creci=$lgnimobiliaria_creci";
    try {
      $omsresult = $bdd->prepare($omsselect);
      $omsresult->execute();
      $omscontar = $omsresult->rowCount();
      if($omscontar>0) {
        while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
          $omsid = $omsmost->id;
          $omstitulo = $omsmost->titulo;
          $omsdescricao = $omsmost->descricao;
          $omsfotoimovel = $omsmost->foto_imovel;
?>
          <div class="col-lg-3">
            <div class="card shadow mb-4">
              <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
              <a href="?imoveis=<?php echo $omsid; ?>">
                <img src="<?php echo $omsfotoimovel; ?>" width="100%">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $omstitulo; ?></h6>
                </div>
                <div class="card-body">
                  <p><strong>Descrição:</strong> <?php echo $omsdescricao; ?></p>
                  <div class="col-md-3 d-inline-flex">
                    <p><i class="fas fa-bed"></i> 4</p>
                  </div>
                  <div class="col-md-3 d-inline-flex">
                    <p><i class="fas fa-bath"></i> 4</p>
                  </div>
                  <div class="col-md-3 d-inline-flex">
                    <p><i class="fas fa-swimming-pool"></i> 4</p>
                  </div>
                  <div class="col-md-3 d-inline-flex">
                    <p><i class="fas fa-car"></i> 4</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
<?php
        }
      }
      else {
          echo '<div class="ml-md-3">Nada encontrado..</div>';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
?>