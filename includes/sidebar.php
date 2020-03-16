<?php
  if(!isset($_SESSION['login']) AND !isset($_SESSION['senha'])) {
    header("Location: /login");
  }
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Gerenciador</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">Relatórios</div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-users"></i>
      <span>Staff</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/presidentes">Presidentes (0)</a>
        <a class="collapse-item" href="/vice-presidentes">Vice Presidentes (0)</a>
        <a class="collapse-item" href="/gerencia-de-vendas">Gerencia de Vendas (0)</a>
        <a class="collapse-item" href="/gerencia-de-locacoes">Gerencia de Locações (0)</a>
        <a class="collapse-item" href="/gerencia-de-intermediacoes">Gerencia de Intermediações (0)</a>
        <a class="collapse-item" href="/gerencia-financeira">Gerencia Financeira (0)</a>
        <a class="collapse-item" href="/gerencia-administrativa">Gerencia Administrativa (0)</a>
        <a class="collapse-item" href="/gerencia-de-condominios">Gerencia de Condominios (0)</a>
        <a class="collapse-item" href="/gerencia-de-arrendamento-agropastoril">Gerencia de Arrendamento Agropastoril (0)</a>
        <a class="collapse-item" href="/secretarias">Secretarias (0)</a>
        <a class="collapse-item" href="/corretor-de-imoveis">Corretor de Imóveis (0)</a>
        <a class="collapse-item" href="/recepcionistas">Recepcionistas (0)</a>
        <a class="collapse-item" href="/telefonistas">Telefonistas (0)</a>
        <a class="collapse-item" href="/contadores">Contadores (0)</a>
        <a class="collapse-item" href="/departamento-de-manutencao">Departamento de Manutenção (0)</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-home"></i>
      <span>Captação de Imóveis</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Imóveis:</h6>
        <a class="collapse-item" href="<?php echo $gerenciador_site; ?>/search?country=0&region=0&city%5B%5D=0&apType=1&objType=0&do-term-search=0&sApId=" target="_Blank">Locação</a>
        <a class="collapse-item" href="<?php echo $gerenciador_site; ?>/search?country=0&region=0&city%5B%5D=0&apType=2&objType=0&do-term-search=0&sApId=" target="_Blank">Venda</a>
        <a class="collapse-item" href="<?php echo $gerenciador_site; ?>/search?country=0&region=0&city%5B%5D=0&apType=2&objType=31&do-term-search=0&sApId=" target="_Blank">Rurais</a>
        <hr class="sidebar-divider">
        <h6 class="collapse-header">Outros:</h6>
        <a class="collapse-item" href="/avaliacao-e-pericia" >Avaliação e Perícia</a>
        <a class="collapse-item" href="/auto-de-vistoria" >Auto de vistoria</a>
        <a class="collapse-item" href="/copia-do-documento-do-imovel" >Cópia do documento do imóvel</a>
        <a class="collapse-item" href="/copia-do-documento-do-proprietario" >Cópia do documento do proprietário</a>
        <a class="collapse-item" href="/contrato-de-administracao" >Contrato de administração</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">Cadastros</div>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-novo-funcionario"><i class="fas fa-fw fa-user"></i><span>Incluir novo funcionário</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $gerenciador_site; ?>/apartments/backend/main/admin" target="_Blank"><i class="fas fa-fw fa-home"></i><span>Incluir novo imóvel</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-novo-contrato"><i class="fas fa-fw fa-file-signature"></i><span>Incluir novo contrato</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-avaliacao-e-pericia"><i class="fas fa-fw fa-file-signature"></i><span>Incluir avaliação e perícia</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-auto-de-vistoria"><i class="fas fa-fw fa-file-signature"></i><span>Incluir auto de vistoria</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-copia-do-documento-do-imovel"><i class="fas fa-fw fa-file-signature"></i><span>Incluir copia do documento do imóvel</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-copia-do-documento-do-proprietario"><i class="fas fa-fw fa-file-signature"></i><span>Incluir copia do documento do proprietário</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/incluir-contrato-de-administracao"><i class="fas fa-fw fa-file-signature"></i><span>Incluir contrato de administração</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">Contratos</div>
  <li class="nav-item">
    <a class="nav-link" href="/contratos-rural"><i class="fas fa-fw fa-file-signature"></i><span>Rural</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contratos-venda"><i class="fas fa-fw fa-file-signature"></i><span>Venda</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contratos-locacao"><i class="fas fa-fw fa-file-signature"></i><span>Locação</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contratos-arrendamento"><i class="fas fa-fw fa-file-signature"></i><span>Arrendamento</span></a>
  </li>
  <div class="sidebar-heading">Financeiro</div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
      <i class="fas fa-comments-dollar"></i>
      <span>Contas a pagar e a Receber</span>
    </a>
    <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/incluir-conta">Incluir conta</a>
        <a class="collapse-item" href="/listar-contas">Listar contas</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
      <i class="fas fa-barcode"></i>
      <span>Boletos</span>
    </a>
    <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="gerar-boleto-alugueis">Gerar boletos de alugueis</a>
        <a class="collapse-item" href="gerar-boleto">Gerar boleto avulso</a>
        <a class="collapse-item" href="aaa">Listar Boletos</a>
        
        <a class="collapse-item" href="incluir-cliente">Incluir Cliente</a>
        
         <a class="collapse-item" href="listar-clientes">Listar Cientes</a>
        
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
      <i class="fas fa-fw fa-home"></i>
      <span>Repasse de alugueis</span>
    </a>
    <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="aaa">Alugueis a Repassar</a>
        <a class="collapse-item" href="aaa">Histórico</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4" aria-expanded="true" aria-controls="collapseUtilities4">
      <i class="fas fa-university"></i>
      <span>Caixa</span>
    </a>
    <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="incluir-entrada">Incluir entrada</a>
        <a class="collapse-item" href="incluir-saida">Incluir saída</a>
        <a class="collapse-item" href="caixa.php">Relatórios</a>
      </div>
    </div>
  </li>
  
  
  
  
   <li class="nav-item">
    <a class="nav-link" href="alugar-imovel"><i class="fas fa-fw fa-home"></i><span>Alugar Imóvel</span></a>
  </li>
  
  
   <li class="nav-item">
    <a class="nav-link" href="desalugar-imovel" ><i class="fas fa-fw fa-home"></i><span>Desalugar Imóvel</span></a>
  </li>
  
  
  
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
















