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
            <?php if(!isset($_GET['imoveis'])) { ?><h1 class="h3 mb-0 text-gray-800">Venda (<?php echo $omscontar; ?>)</h1><?php } ?>
          </div>
          <div class="row">
            <?php $tipopage = '2'; include_once("includes/imoveis.php"); ?>
          </div>
        </div>
      </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>