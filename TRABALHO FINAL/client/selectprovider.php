<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/provider/?".$_POST['tipo']."=".$_POST['text'];

$response = \Httpful\Request::get($url)->send();
//var_dump($response);
include'selectprovider.html';

$request_response = json_decode($response, true);

foreach($request_response as $p){
				echo "<center>";
				echo "<TABLE BORDER=2>";
				echo "<tr>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['name'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['tradename'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['phone'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['addres'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['cep'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['city'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['cnpj'] . "</td>";
				echo "<td><a href='updateprovider.php?id=" . $p ['id']. "'>Alterar</a></td>";
				echo "<td><a href='deleteprovider.php?id=" . $p ['id']. "'>Deletar</a></td>";
				echo "<tr>";
			}