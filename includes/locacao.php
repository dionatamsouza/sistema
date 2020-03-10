<?php
  if(isset($_GET['imovel'])) {
    $imovel = $_GET['imovel']
    if(!empty($imovel)) {
      echo "Esse imovel";
    }
    else {
      $omsselect = "SELECT * from imoveis WHERE tipo=$tipopage AND imobiliaria_creci=$lgnimobiliaria_creci";
      try {
        $omsresult = $bdd->prepare($omsselect);
        $omsresult->execute();
        $omscontar = $omsresult->rowCount();
        if($omscontar>0) {
          while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
            $omstitulo = $omsmost->titulo;
            $omsdescricao = $omsmost->descricao;
            $omsfotoimovel = $omsmost->foto_imovel;
?>
            <div class="col-lg-3">
              <div class="card shadow mb-4">
                <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
                <img src="<?php echo $omsfotoimovel; ?>" width="100%">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $omstitulo; ?></h6>
                </div>
                <div class="card-body">
                  <p><strong>Descrição:</strong> <?php echo $omsdescricao; ?></p>
                </div>
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
  }
?>