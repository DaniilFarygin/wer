<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  
	  <form method="POST" action="driver.php">
	 
      <input type="text" class="textbox" name="FIO" id="FIO" placeholder="FIO" />

	  <input type="submit" name="Search" class="button" value="Поиск" />
  </body>
</html>

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
	if ($sql ="$FIO"){
		echo $stmt;
	} else
	{
		echo 'Проверьте правильность ввода';
	}
}


