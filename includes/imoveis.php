<?php
  if(isset($_GET['imoveis'])) {
    $imoveis = $_GET['imoveis'];
    if(!empty($imoveis)) {
      $omsselect = "SELECT * from imoveis WHERE id=$imoveis AND imobiliaria_creci=$lgnimobiliaria_creci";
      try {
        $omsresult = $bdd->prepare($omsselect);
        $omsresult->execute();
        $omscontar = $omsresult->rowCount();
        if($omscontar>0) {
          while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
            $omsid = $omsmost->id;
            $omstitulo = $omsmost->titulo;
            $omsdescricao = $omsmost->descricao;
            if($omsmost->tipo == '1') { $omstipo = 'Locação'; } elseif($omsmost->tipo == '2') { $omstipo = 'Venda'; } elseif($omsmost->tipo == '3') { $omstipo = 'Rural'; }
            $omstipodepropriedade = $omsmost->tipo_de_propriedade;
            $omsendereco = $omsmost->endereco;
            $omsvalor = $omsmost->valor;
            $omsnumerodedormitorios = $omsmost->numero_de_dormitorios;
            $omsareaconstruida = $omsmost->area_construida;
            $omsareaterrenototal = $omsmost->area_terreno_total;
            $omsidimovel = $omsmost->id_imovel;
  ?>
            <div class="col-lg-9">
              <div class="card shadow mb-4">
                <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
                <div class="rslides_container">
                  <ul class="rslides" id="slider1">
                    <li><img src="<?php echo $omsidimovel; ?>"></li>
                  </ul>
                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $omstitulo; ?></h6>
                </div>
                <div class="card-body">
                  <p><strong>Descrição:</strong> <?php echo $omsdescricao; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>ID do anúncio:</strong> <?php echo $omsid; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Tipo:</strong> <?php echo $omstipo; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Tipo de propriedade:</strong> <?php echo $omstipodepropriedade; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Endereço:</strong> <?php echo $omsendereco; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Valor:</strong> <?php echo $omsvalor; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Número de dormitórios:</strong> <?php echo $omsnumerodedormitorios; ?></p>
                  <hr class="sidebar-divider">
                  <p><strong>Área construída:</strong> <?php echo $omsareaconstruida; ?> m²</p>
                  <hr class="sidebar-divider">
                  <p><strong>Área terreno/total:</strong> <?php echo $omsareaterrenototal; ?> m²</p>
                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Google Maps</h6>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3628.486009927777!2d-54.05246308500275!3d-24.572417984190576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f380573a3477d3%3A0x4b812c54be159ba5!2sR.%20S%C3%A3o%20Jorge%20-%20S%C3%A1o%20Lucas%2C%20Mal.%20C%C3%A2ndido%20Rondon%20-%20PR%2C%2085960-000!5e0!3m2!1spt-BR!2sbr!4v1583862003041!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informações Gerais</h6>
                </div>
                <div class="card-body">
                  <p><strong>R$</strong> <?php echo $omsvalor; ?></p>
                  <hr class="sidebar-divider">
                  <p><i class="fas fa-map-marker-alt"></i> <?php echo $omsendereco; ?></p>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Arquivos anexos</h6>
                </div>
                <div class="card-body">
                  <a href="/avaliacao-e-pericia?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Avaliação e Perícia</a>
                  <a href="/auto-de-vistoria?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Auto de vistoria</a>
                  <a href="/copia-do-documento-do-imovel?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Cópia do documento do imóvel</a>
                  <a href="/copia-do-documento-do-proprietario?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Cópia do documento do proprietário</a>
                  <a href="/contrato-de-administracao?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Contrato de administração</a>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Anexar arquivos</h6>
                </div>
                <div class="card-body">
                  <a href="/incluir-avaliacao-e-pericia?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Avaliação e Perícia</a>
                  <a href="/incluir-auto-de-vistoria?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Auto de vistoria</a>
                  <a href="/incluir-copia-do-documento-do-imovel?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Cópia do documento do imóvel</a>
                  <a href="/incluir-copia-do-documento-do-proprietario?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Cópia do documento do proprietário</a>
                  <a href="/incluir-contrato-de-administracao?id=<?php echo $omsid; ?>" class="btn btn-light btn-user btn-block border">Contrato de administração</a>
                </div>
              </div>
            </div>
  <?php
          }
        }
        else {
          header("Location: /");
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
            <div class="card shadow mb-4 scale">
              <a class="btn-trash" href="aaaa"><i class="fas fa-times"></i></a>
              <a href="?imoveis=<?php echo $omsid; ?>">
                <div class="rslides_container">
                  <ul class="rslides" id="slider1">
                    <li><img src="<?php echo $omsfotoimovel; ?>"></li>
                    <li><img src="<?php echo $omsfotoimovel; ?>"></li>
                    <li><img src="<?php echo $omsfotoimovel; ?>"></li>
                  </ul>
                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $omstitulo; ?></h6>
                </div>
                <div class="card-body">
                  <p><strong>Descrição:</strong> <?php echo $omsdescricao; ?></p>
                  <div class="col-md-2 d-inline-flex text-center">
                    <p><i class="fas fa-bed"></i> 4</p>
                  </div>
                  <div class="col-md-2 d-inline-flex text-center">
                    <p><i class="fas fa-bath"></i> 4</p>
                  </div>
                  <div class="col-md-2 d-inline-flex text-center">
                    <p><i class="fas fa-swimming-pool"></i> 4</p>
                  </div>
                  <div class="col-md-2 d-inline-flex text-center">
                    <p><i class="fas fa-car"></i> 4</p>
                  </div>
                  <div class="col-md-2 d-inline-flex text-center">
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