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

 <?php
    $db_host = '10.100.3.6:3306';
    $db_username = '15073';
    $db_password = 'student';
    $db_table_diagnos = 'diagnos';
	$db_table_lekar = 'lekar';
	

    // ѕодключение к базе данных
    $db = mysql_connect($db_host, $db_username, $db_password)
    or die("Ќе могу создать соединение : " . mysql_error());

    // подключаемс¤ к базе данных
    mysql_select_db($db_username, $db)
    or die("Ќе удалось выбрать DB: " . mysql_error());

    // выбираем всех врачей сортированых по должности
    $qr_result = mysql_query("SELECT ID_DI, lekar.Name,Name_1 
FROM  $db_table_diagnos LEFT JOIN $db_table_lekar 
ON lekar.ID_M = diagnos.ID_M order by ID_DI")
    or die(mysql_error());

	
   // ¬ывод таблицу 
  echo '<table border="2">';
  echo '<center>';
  echo '<tr>';
  echo '<tr>';
  echo '<th>Код диагноза</th>';
  echo '<th>Название диагноза </th>';
  echo '<th>Названия лекарства </th>';

  echo '</tr>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
      echo '<td>' . $data['ID_DI'] . '</td>';
	echo '<td>' . $data['Name_1'] . '</td>';
	 echo '<td>' . $data['Name'] . '</td>';

    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';
  ?>
 
