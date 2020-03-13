<?php
  $omsselect = "SELECT * from modelos_contratos WHERE tipo=$tipopage AND imobiliaria_creci=$lgnimobiliaria_creci";
  try {
    $omsresult = $bdd->prepare($omsselect);
    $omsresult->execute();
    $omscontar = $omsresult->rowCount();
    if($omscontar>0) {
      while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
        $omsid= $omsmost->id;
        $omstipo = $omsmost->tipo;
        $omsfile = $omsmost->file;
?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2 scale">
            <form method="POST"><label class="btn-trash" for="dltcontratos"><i class="fas fa-times"></i></label><input type="submit" id="dltcontratos" name="dltcontratos<?php echo $omsid; ?>" hidden></form>
            <a href="<?php echo $omsfile; ?>" target="_Blank">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contrato</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Modelo <?php count($omsresult); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                  </div>
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
?>