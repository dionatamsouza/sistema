<?php
  //conexão ao banco de dados
  ob_start();
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $error) {
    echo 'Error: ' . $error -> getMessage();
  }
  //-----------------------------------------------------------------------------------

  //configurações do site
  $gerenciador_nome = 'Gerenciador';
  $gerenciador_site = '//olhoimobiliario.com.br';
  //-----------------------------------------------------------------------------------

  //sistema de login
  if(isset($_POST['entrar'])) {
    $entselect = "SELECT * from staff WHERE email=:email AND senha=:senha";
    try {
      $entresult = $bdd->prepare($entselect);
      $entresult->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
      $entresult->bindParam(':senha', $_POST['senha'], PDO::PARAM_STR);
      $entresult->execute();
      $entcontar = $entresult->rowCount();
      if($entcontar > 0) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        header("Location: /");
      }
    }
    catch(PDOException $error) {
      echo $error;
    }
  }
  //-----------------------------------------------------------------------------------

  //sistema de logout
  if(isset($_REQUEST['sair'])) {
    session_destroy();
    session_unset(['email']);
    session_unset(['senha']);
    header("Location: /entrar");
  }
  //-----------------------------------------------------------------------------------

  //puxar informações do usuário logado
  $entselect = "SELECT * from staff WHERE email=:email AND senha=:senha";
  try {
    $entresult = $bdd->prepare($entselect);
    $entresult->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
    $entresult->bindParam(':senha', $_SESSION['senha'], PDO::PARAM_STR);
    $entresult->execute();
    $entcontar = $entresult->rowCount();
    if($entcontar > 0) {
      $entloop = $entresult->fetchAll();
      foreach($entloop as $entexb) {
        $lgnnome = $entexb['nome'];
        $lgnsobrenome = $entexb['sobrenome'];
        $lgnemail = $entexb['email'];
        $lgnavatar = $entexb['avatar'];
        $lgnimobiliaria_creci = $entexb['imobiliaria_creci'];
      }
    }
  }
  catch(PDOException $e) {
    echo $e;
  }
  //-----------------------------------------------------------------------------------

  //cadastrar funcionário
  if(isset($_POST['cadastrar-funcionario'])) {
    $arquivo = $_FILES['avatar'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'imgs/staff/'.$novonome)) {
    }
    $dstimg = '/imgs/staff/'.$novonome;
    $cadinsert = "INSERT into staff (nome, sobrenome, email, senha, telefone, avatar, cargo, imobiliaria_creci) VALUES (:nome, :sobrenome, :email, :senha, :telefone, :avatar, :cargo, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':nome' , $_POST['nome'], PDO::PARAM_STR);
      $cadresult->bindParam(':sobrenome' , $_POST['sobrenome'], PDO::PARAM_STR);
      $cadresult->bindParam(':email' , $_POST['email'], PDO::PARAM_STR);
      $cadresult->bindParam(':senha' , $_POST['senha'], PDO::PARAM_STR);
      $cadresult->bindParam(':telefone' , $_POST['telefone'], PDO::PARAM_STR);
      $cadresult->bindParam(':avatar' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':cargo' , $_POST['cargo'], PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Funcionário foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro de contrato
  if(isset($_POST['cadastrar-contrato'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'modelos_contratos/'.$novonome)) {
    }
    $dstimg = '/modelos_contratos/'.$novonome;
    $cadinsert = "INSERT into modelos_contratos (tipo, file, imobiliaria_creci) VALUES (:tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':tipo' , $_POST['tipo'], PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Seu contrato foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro de avaliação e perícia
  if(isset($_POST['cadastrar-avaliacao-e-pericia'])) {
    $arquivo = $_FILES['avaliacao'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $avaliacao = '/files/'.$novonome;
    $arquivo2 = $_FILES['pericia'];
    $nome2 = $arquivo2['name'];
    $tmp2 = $arquivo2['tmp_name'];
    $extensao2 = explode('.', $nome2);
    $ext2 = end($extensao2);
    $novonome2 = md5($nome2).'.'.$ext2;
    if(empty($arquivo2)) {
    }
    elseif(move_uploaded_file($tmp2, 'files/'.$novonome2)) {
    }
    $pericia = '/files/'.$novonome2;
    $tipo = '1';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, file2, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :file2, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $avaliacao, PDO::PARAM_STR);
      $cadresult->bindParam(':file2' , $pericia, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Avaliação e Perícia foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da auto de vistoria
  if(isset($_POST['cadastrar-auto-de-vistoria'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '2';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Auto de vistoria foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da contrato de administração
  if(isset($_POST['cadastrar-contrato-de-administracao'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '5';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Contrato de administração foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da copia do documento do imóvel
  if(isset($_POST['cadastrar-copia-do-documento-do-imovel'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '3';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Copia do documento do imóvel foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da Copia do documento do proprietário
  if(isset($_POST['cadastrar-copia-do-documento-do-proprietario'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '4';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Copia do documento do proprietário foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //cadastrar imóvel
  if(isset($_POST['cadastrar-imovel'])) {
    $id_imovel = uniqid();
    $diretorio = "/imgs/imoveis/";   
    $arquivo = isset($_FILES['fotoimovel']) ? $_FILES['fotoimovel'] : FALSE;
    for($controle = 0; $controle < count($arquivo['name']); $controle++) {
      $destino = $diretorio.$arquivo['name'][$controle];
      if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)) {
        $cadinsert = "INSERT into fotos_imovel (iddoimovel, file) VALUES (:iddoimovel, :file)";
        try {
          $cadresult = $bdd->prepare($cadinsert);
          $cadresult->bindParam(':iddoimovel' , $id_imovel, PDO::PARAM_STR);
          $cadresult->bindParam(':file' , $destino, PDO::PARAM_STR);
          $cadresult->execute();
          $cadcontar = $cadresult->rowCount();
        }
        catch(PDOException $e) {
          echo $e;
        }
      }
    }
    /*
    $cadinsert = "INSERT into imoveis (tipo, tipo_de_propriedade, pais, estado, municipio, endereco, valor, titulo, descricao, numero_de_dormitorios, area_construida, area_terreno_total, id_imovel, imobiliaria_creci) VALUES (:tipo, :tipo_de_propriedade, :pais, :estado, :municipio, :endereco, :valor, :titulo, :descricao, :numero_de_dormitorios, :area_construida, :area_terreno_total, :id_imovel, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':tipo' , $_POST['tipo'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo_de_propriedade' , $_POST['tipodepropriedade'], PDO::PARAM_STR);
      $cadresult->bindParam(':pais' , $_POST['pais'], PDO::PARAM_STR);
      $cadresult->bindParam(':estado' , $_POST['estado'], PDO::PARAM_STR);
      $cadresult->bindParam(':municipio' , $_POST['municipio'], PDO::PARAM_STR);
      $cadresult->bindParam(':endereco' , $_POST['endereco'], PDO::PARAM_STR);
      $cadresult->bindParam(':valor' , $_POST['valor'], PDO::PARAM_STR);
      $cadresult->bindParam(':titulo' , $_POST['titulo'], PDO::PARAM_STR);
      $cadresult->bindParam(':descricao' , $_POST['descricao'], PDO::PARAM_STR);
      $cadresult->bindParam(':numero_de_dormitorios' , $_POST['numerodedormitorios'], PDO::PARAM_STR);
      $cadresult->bindParam(':area_construida' , $_POST['areaconstruida'], PDO::PARAM_STR);
      $cadresult->bindParam(':area_terreno_total' , $_POST['areaterrenototal'], PDO::PARAM_STR);
      $cadresult->bindParam(':id_imovel' , $id_imovel, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        $msgsucess = 'Imóvel foi incluso.';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
    */
  }
  //-----------------------------------------------------------------------------------
?>