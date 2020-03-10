<?php include_once("includes/bdd.php"); ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $gerenciador_nome; ?></title>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="calendario/css/bootstrap-datepicker.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="calendario/js/bootstrap-datepicker.min.js"></script> 
  <script src="calendario/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
  <script type="text/javascript">
  	var estados = [];
	function loadEstados(element) {
	  if (estados.length > 0) {
	    putEstados(element);
	    $(element).removeAttr('disabled');
	  } else {
	    $.ajax({
	      url: 'https://api.myjson.com/bins/enzld',
	      method: 'get',
	      dataType: 'json',
	      beforeSend: function() {
	        $(element).html('<option>Carregando...</option>');
	      }
	    }).done(function(response) {
	      estados = response.estados;
	      putEstados(element);
	      $(element).removeAttr('disabled');
	    });
	  }
	}
	function putEstados(element) {
	  var label = $(element).data('label');
	  label = label ? label : 'Estado';
	  var options = '<option value="">' + label + '</option>';
	  for (var i in estados) {
	    var estado = estados[i];
	    options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
	  }
	  $(element).html(options);
	}
	function loadCidades(element, estado_sigla) {
	  if (estados.length > 0) {
	    putCidades(element, estado_sigla);
	    $(element).removeAttr('disabled');
	  } else {
	    $.ajax({
	      url: theme_url + '/assets/json/estados.json',
	      method: 'get',
	      dataType: 'json',
	      beforeSend: function() {
	        $(element).html('<option>Carregando...</option>');
	      }
	    }).done(function(response) {
	      estados = response.estados;
	      putCidades(element, estado_sigla);
	      $(element).removeAttr('disabled');
	    });
	  }
	}
	function putCidades(element, estado_sigla) {
	  var label = $(element).data('label');
	  label = label ? label : 'Cidade';

	  var options = '<option value="">' + label + '</option>';
	  for (var i in estados) {
	    var estado = estados[i];
	    if (estado.sigla != estado_sigla)
	      continue;
	    for (var j in estado.cidades) {
	      var cidade = estado.cidades[j];
	      options += '<option value="' + cidade + '">' + cidade + '</option>';
	    }
	  }
	  $(element).html(options);
	}
	document.addEventListener('DOMContentLoaded', function() {
	  loadEstados('#uf');
	  $(document).on('change', '#uf', function(e) {
	    var target = $(this).data('target');
	    if (target) {
	      loadCidades(target, $(this).val());
	    }
	  });
	}, false);
  </script>
</head>