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
    $db_table_vrachi = 'vrachi';
	$db_table_otdelenie = 'otdelenie';
	

    // ѕодключение к базе данных
    $db = mysql_connect($db_host, $db_username, $db_password)
    or die("Ќе могу создать соединение : " . mysql_error());

    // подключаемс¤ к базе данных
    mysql_select_db($db_username, $db)
    or die("Ќе удалось выбрать DB: " . mysql_error());

    // выбираем всех врачей сортированых по должности
    $qr_result = mysql_query("SELECT ID_D,FIO_1,Date_of_B, position ,salaries,otdelenie.name
FROM  $db_table_vrachi LEFT JOIN $db_table_otdelenie  
ON otdelenie.id_s = vrachi.id_s order by ID_D")
    or die(mysql_error());

	
   // ¬ывод таблицу 
  echo '<table border="2">';
  echo '<center>';
  echo '<tr>';
  echo '<tr>';
  echo '<th>Код врача</th>';
  echo '<th>ФИО</th>';
  echo '<th>Дата рожденья</th>';
   echo '<th>Должность</th>';
      echo '<th>Зарплата</th>';
	     echo '<th>Название отделения</th>';
  echo '</tr>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
      echo '<td>' . $data['ID_D'] . '</td>';
	echo '<td>' . $data['FIO_1'] . '</td>';
	 echo '<td>' . $data['Date_of_B'] . '</td>';
   echo '<td>' . $data['position'] . '</td>';
	 echo '<td>' . $data['salaries'] . '</td>';
	 	 echo '<td>' . $data['name'] . '</td>';
    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';
  ?>
  <br>
    <form method="POST" action="index.php">
      <input type="text" name="ID_D" id="ID_D"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Код врача" />
	  <input type="text" name="FIO" id="FIO"style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="ФИО"/>
	  <input type="text" name="Date_of_B" id="Date_of_B" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Дата рожденья"/></br></br>
	  <input type="text" name="Position" id="Position"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Должность"/>
	  <input type="text" name="Salaries" id="Salaries"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Зарплата" />
	  <input type="text" name="ID_S" id="ID_S" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Отделение"/></br> </br>
	  <input type="submit" name="insert" style="cursor: pointer;  font-weight:bold; font-size:18px;   padding:6px 14px; color:#cc3333;  background-color:#ffffff; border-radius:15px; border:none;"  value="Добавить запись"/>
	  <br>
	  </form>
  
		</br> </br>
        <form method="POST" action="deleted2.php">
        <input type="text" name="ID_D" id="ID_D" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="Код врача" />
         <br><br>
		<input type="submit" style="cursor: pointer;  font-weight:bold; font-size:18px;   padding:6px 14px; color:#cc3333;  background-color:#ffffff; border-radius:15px; border:none;" 
		name = "Send" value="Удалить запись" />
    </form>

	<br>
  </body>
		

