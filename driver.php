<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  
	 
  </body>
</html>

<?php



$user = "15073";
$pass = "student";
$FIO = $_POST['FIO'];

$mysqli = new PDO('mysql:host=10.100.3.6;dbname=15073', $user, $pass);

$stmt = $mysqli->prepare ("SELECT `пациенты`.ID_P, `пациенты`.FIO, `пациенты`.ID_S, `пациенты`.ID_D, `пациенты`.Date_receipt, `пациенты`.Date_release, `пациенты`.ID_DI FROM `пациенты` WHERE `пациенты`.`FIO` = '$FIO'");
$stmt->execute();

while($sql= $stmt->fetch())
{
echo '<b style="font-size:20px;"> ID:' . $sql['ID_P'] . '<br> Фамилия Имя Отчество: ' .  $sql['FIO']. '<br>Отделение:' . $sql['ID_S']. '<br>Лечащий врач:' . $sql['ID_D']. '<br>Дата приема:' .$sql['Date_receipt']. '<br>Дата выпуска:' . $sql['Date_release']. '<br>Диагноз:' . $sql['ID_DI'].'<br>';

}
	
	
