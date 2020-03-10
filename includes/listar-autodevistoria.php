<?php
  if(isset($_GET['id'])) {
    $iddoimovel = $_GET['id'];
    $omsselect = "SELECT * from files WHERE iddoimovel=$iddoimovel AND tipo='2' AND imobiliaria_creci=$lgnimobiliaria_creci";
    try {
      $omsresult = $bdd->prepare($omsselect);
      $omsresult->execute();
      $omscontar = $omsresult->rowCount();
      if($omscontar>0) {
        while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
          $omsid = $omsmost->id;
          $omsfile = $omsmost->file;
  ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <form method="POST"><label class="btn-trash" for="autodevistoria"><i class="fas fa-times"></i></label><input type="submit" id="autodevistoria" name="autodevistoria<?php echo $omsid; ?>" hidden></form>
              <a href="<?php echo $omsfile; ?>" target="_Blank">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Documento</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Arquivo</div>
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
          if(isset($_POST['autodevistoria'.$omsid])) {
            unlink($omsfile);
            $vercodeeas = $bdd->prepare('DELETE FROM files WHERE id=:id');
            $vercodeeas->bindParam(':id', $omsid);
            $vercodeeas->execute();
            header("Refresh: 0");
          }
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
  else {
      header("Location: /");
  }
?>