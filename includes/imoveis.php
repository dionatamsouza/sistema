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
            $omsfotoimovel = $omsmost->foto_imovel;
  ?>
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
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