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
  TD{font:normal 15px "sans-serif"}</STYLE>
</style>
</head >

 <center>
 <?php
    $db_host = '10.100.3.6:3306';
    $db_username = '15073';
    $db_password = 'student';
    $db_table_пациенты = 'пациенты';
	$db_table_otdelenie = 'otdelenie';
	$db_table_vrachi= 'vrachi';
	$db_table_diagnos= 'diagnos';

	

    // ѕодключение к базе данных
    $db = mysql_connect($db_host, $db_username, $db_password)
    or die("Ќе могу создать соединение : " . mysql_error());

    // подключаемс¤ к базе данных
    mysql_select_db($db_username, $db)
    or die("Ќе удалось выбрать DB: " . mysql_error());

    // выбираем всех врачей сортированых по должности
    $qr_result = mysql_query("SELECT ID_P,FIO,otdelenie.name, Date_receipt,Date_release,vrachi.FIO_1, diagnos.Name_1
FROM  $db_table_пациенты LEFT JOIN $db_table_otdelenie  
ON otdelenie.id_s = пациенты.id_s  LEFT JOIN $db_table_vrachi
ON vrachi.ID_D = пациенты.ID_D  LEFT JOIN $db_table_diagnos
ON diagnos.ID_Di = пациенты.ID_Di   GROUP BY `пациенты`.`ID_P` ")
    or die(mysql_error());

   
   // ¬ывод таблицу 
  echo '<table border="2">';
  echo '<center>';
  echo '<tr>';
  echo '<tr>';
  echo '<th>Код пациента</th>';
  echo '<th>ФИО</th>';
  echo '<th>Отделение</th>';
  echo '<th>Лечищий врач</th>';
  echo '<th>Диагноз</th>';
  echo '<th>Дата приема</th>';
  echo '<th>Дата выпуска</th>';

   
  
  echo '</tr>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
     echo'<table>';
  echo '<tr>';
    echo '<td>' . $data['ID_P'] . '</td>';
	echo '<td>' . $data['FIO'] . '</td>';
	echo '<td>' . $data['name'] . '</td>';
	echo '<td>' . $data['FIO_1'] . '</td>';
	echo '<td>' . $data['Name_1'] . '</td>';
    echo '<td>' . $data['Date_receipt'] . '</td>';
    echo '<td>' . $data['Date_release'] . '</td>';

	
	
			 
					 
    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';

  ?>
  <form method="POST" action="driver.php">
	  <h2 align="center">Фамилию</h2>
      <input type="text" class="textbox" name="FIO" id="FIO" placeholder="FIO" />

	  <input type="submit" name="Search" class="button" value="Поиск" />
  <?php

if(isset($_POST['Search'])) 
{

$user = "15073";
$pass = "student";
$FIO = $_POST['FIO'];
$db_table_otdelenie = 'otdelenie';
$db_table_пациенты = 'пациенты';

$mysqli = new PDO('mysql:host=10.100.3.6;dbname=15073', $user, $pass);

$stmt = $mysqli->prepare ('SELECT `пациенты`.ID_P, `пациенты`.FIO, `otdelenie`.ID_S, `пациенты`.ID_D, `пациенты`.Date_receipt, `пациенты`.Date_release, `пациенты`.ID_DI FROM  $db_table_пациенты LEFT JOIN $db_table_otdelenie  
ON otdelenie.ID_S = пациенты.ID_S  `пациенты` WHERE `пациенты`.`FIO` = ""');
$stmt->execute();

while($sql= $stmt->fetch())
{
echo 'ID:' . $sql['ID_P'] . ' Отчество: ' .  $sql['FIO']. 'Отделение:' . $sql['Name']. 'Лечащий врач:' . $sql['ID_D']. 'Дата приема:' .$sql['Date_receipt']. 'Дата выпуска:' . $sql['Date_release']. 'Диагноз:' . $sql['ID_DI'].'<br>';

}
	if ($sql ="$FIO")
	
	
	{
		echo $stmt;
	} else
	{ header('location: pacient.php');
		echo 'Проверьте правильность ввода';
	}
}

?>
  
  <br>
  <br>
    <form method="POST" action="index2.php">
      <input type="text" name="ID_P" id="ID_P"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"  placeholder="Код пациента" />
	  <input type="text" name="FIO" id="FIO" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="ФИО"/>
	  <input type="text" name="ID_S" id="ID_S" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Отделение"/></br></br>
	  <input type="text" name="ID_D" id="ID_D"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Лечищий врач"/>
	  <input type="text" name="Date_receipt" id="Date_receipt"  style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Дата приема" />
	  <input type="text" name="Date_release" id="Date_release" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Дата выпуска"/></br> </br>
	  <input type="text" name="ID_DI" id="ID_DI"style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="Диагноз"/></br></br>
	  <input type="submit" name="insert" style="cursor: pointer;  font-weight:bold; font-size:18px;   padding:6px 14px; color:#cc3333;  background-color:#ffffff; border-radius:15px; border:none;"  value="Добавить"/></br></br></br>
	
</form>
	
     <form method="POST" action="22.php">
      <input type="text" name="ID_P" id="ID_P"style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"  placeholder="Код пациента" />
	  <input type="text" name="FIO" id="FIO"style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="ФИО"/>
	  <input type="text" name="ID_S" id="ID_S" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Отделение"/></br></br>
	  <input type="text" name="ID_D" id="ID_D" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="Лечищий врач"/>
	  <input type="text" name="Date_receipt" id="Date_receipt" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="Дата приема" />
	  <input type="text" name="Date_release" id="Date_release" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Дата выпуска"/></br> </br>
	     <input type="text" name="ID_DI" id="ID_DI" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;"placeholder="Диагноз"/></br> </br>
	    <input type="submit" name='UpdBut' style="cursor: pointer;  font-weight:bold; font-size:18px;   padding:6px 14px; color:#cc3333;  background-color:#ffffff; border-radius:15px; border:none;"  value="Обновить информацию в БД"/><br>
	  </form> <br>  <br>
	
	 
	    <form method="POST" action="deleted.php">
 <input  type="text" name="ID_P" id="ID_P" style="font-size:15px; face:Georgia; font-weight:bold;  padding:4px 11px;  border-radius:15px; border:none;" placeholder="Код пациента" />
<br><br>
		<input type="submit" style="cursor: pointer;  font-weight:bold; font-size:18px;   padding:6px 14px; color:#cc3333;  background-color:#fff; border-radius:15px; border:none;" 
		name = "Send" value="Удалить запись" />	  </form>
  </body>
  
</html>




		

