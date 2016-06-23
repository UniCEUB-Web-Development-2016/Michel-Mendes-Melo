<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/product/?".$_POST['tipo']."=".$_POST['text'];

$response = \Httpful\Request::get($url)->send();
//var_dump($response);
include'selectproduct.html';

$request_response = json_decode($response, true);

foreach($request_response as $p){
				echo "<center>";
				echo "<TABLE BORDER=2>";
				echo "<tr>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['name'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['value'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['category'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['amount'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['barcode'] . "</td>";
				echo "<td><a href='updateproduct.php?id=" . $p ['id']. "'>Alterar</a></td>";
				echo "<td><a href='deleteproduct.php?id=" . $p ['id']. "'>Deletar</a></td>";
				echo "<tr>";
			}