

<?php

if(isset($_POST['Send'])) 
{
$ID_P = $_POST['ID_P'];





$link = mysqli_connect('10.100.3.6','15073','student','15073');
if (mysqli_connect_errno()) {
		file_put_contents('BD_Error.txt' , mysqli_connect_errno());
		exit();
}
else {
		$sql = "DELETE FROM `пациенты` WHERE ID_P = $ID_P";
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