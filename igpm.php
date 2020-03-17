<?php
	$url = 'https://www.melhorcambio.com/igpm';
	$dadosSite = file_get_contents($url);
	$var1 = explode('<td width="150" class="tdvalor">',$dadosSite);
	$var2 = explode("</td>",$var1[1]);
	echo $var2[0];
?>