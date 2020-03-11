<?php
  $omsselect = "SELECT * from staff WHERE cargo=$cargopage AND imobiliaria_creci=$lgnimobiliaria_creci";
  try {
    $omsresult = $bdd->prepare($omsselect);
    $omsresult->execute();
    $omscontar = $omsresult->rowCount();
    if($omscontar>0) {
      while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
        $omsnome = $omsmost->nome;
        $omssobrenome = $omsmost->sobrenome;
        $omsemail = $omsmost->email;
        $omstelefone = $omsmost->telefone;
        $omsavatar = $omsmost->avatar;
?>
        <div class="col-lg-3">
          <div class="card shadow mb-4 scale">
            <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
            <img src="<?php echo $omsavatar; ?>" width="100%">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo $omsnome.' '.$omssobrenome; ?></h6>
            </div>
            <div class="card-body">
              <p><strong>E-mail:</strong> <?php echo $omsemail; ?></p>
              <p><strong>Telefone:</strong> <?php echo $omstelefone; ?></p>
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
?>