
<?php

if(isset($_POST['UpdBut'])) 
{
$ID_P = $_POST['ID_P'];
$FIO = $_POST['FIO'];
$ID_S = $_POST['ID_S'];
$ID_D = $_POST['ID_D'];
$Date_receipt = $_POST['Date_receipt'];
$Date_release = $_POST['Date_release'];
$ID_DI = $_POST['ID_DI'];



$link = mysqli_connect('10.100.3.6','15073','student','15073');
if (mysqli_connect_errno()) {
		file_put_contents('BD_Error.txt' , mysqli_connect_errno());
		exit();
}
else {
		$sql = "UPDATE `пациенты` SET ID_P = $ID_P, FIO = '$FIO', ID_S = $ID_S, ID_D = $ID_D, Date_receipt = '$Date_receipt', Date_release = '$Date_release', ID_DI = $ID_DI, WHERE ID_P = $ID_P";
		mysqli_query($link,$sql);
		

		
		
	if ($result = 'true'){
			header('location: pacient.php');
        echo "Информация занесена в базу данных";
    }else{
        echo "Информация не занесена в базу данных";
    }
}
}
?>
<br>

	

