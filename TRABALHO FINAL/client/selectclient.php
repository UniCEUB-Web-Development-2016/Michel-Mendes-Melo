<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/client/?".$_POST['tipo']."=".$_POST['text'];

$response = \Httpful\Request::get($url)->send();
//var_dump($response);
include'selectclient.html';

$request_response = json_decode($response, true);

foreach($request_response as $p){
				echo "<center>";
				echo "<TABLE BORDER=2>";
				echo "<tr>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['name'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['last_name'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['cpf'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['rg'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['birthdate'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['licensePlate'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['phone'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['addres'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['email'] . "</td>";
				echo "<td><a href='updateclient.php?id=" . $p ['id']. "'>Alterar</a></td>";
				echo "<td><a href='deleteclient.php?id=" . $p ['id']. "'>Deletar</a></td>";
				echo "<tr>";
			}
