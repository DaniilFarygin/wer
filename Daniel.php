<html>
<head >
<style>
body {
    background-color: #75c1ff;
}
 TABLE,TH,TD{border:1px solid black;border-collapse:collapse;}
  TH,TD{width:100px}
  TH{height:30px}

  CAPTION,TH,TD{padding:6px}

  CAPTION{caption-side:top}

  TH{background-color:#E0E6FA;}
  TD{background-color:#F6F8FE;}

  CAPTION{text-align:left;vertical-align:middle}
  TH,TD{text-align:center;vertical-align:middle}

  CAPTION{font:bold 2px "sans-serif"}
  TH{font:bold 17px "sans-serif"}
  TD{font:normal 15px "sans-serif"}
</style>
</head >

<center>
<?

$link = mysqli_connect('10.100.3.6','15073','student','15073',3306);
	$sqlsel = "select * from `otdelenie`";
	$resultsel = mysqli_query($link, $sqlsel);
	$dataaa = mysqli_fetch_all($resultsel, 1);
	echo '<table border="2">';
	echo '<thead>';
	
	echo '<tr>';
	echo '<th>Код заведущего</th>';
	echo '<th>Название</th>';
	echo '<th>ФИО заведущего</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	
	foreach($dataaa as $data){ 
		echo '<tr>';
			echo '<td>' . $data['ID_S'] . '</td>';
		echo '<td>' . $data['Name'] . '</td>';
		echo '<td>' . $data['FIO_M'] . '</td>';
	
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
echo   '<br>';
		?>
		<form method="POST" action="forma.php">
    
</body>
	
</html>