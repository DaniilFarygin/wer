
<?php

if(isset($_POST['insert'])) 
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
		$sql = "insert into `пациенты` values($ID_P,'$FIO',$ID_S, $ID_D,'$Date_receipt','$Date_release', $ID_DI);";
		$result = mysqli_query($link,$sql);


		
		
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
<form method="POST" action="pacient.php">
    
</form>

<br>