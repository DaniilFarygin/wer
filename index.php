
<?php

if(isset($_POST['insert'])) 
{

$ID_D = $_POST['ID_D'];
$FIO = $_POST['FIO'];
$Date_of_B = $_POST['Date_of_B'];
$Position = $_POST['Position'];
$Salaries = $_POST['Salaries'];
$ID_S = $_POST['ID_S'];


$link = mysqli_connect('10.100.3.6','15073','student','15073');
if (mysqli_connect_errno()) {
		file_put_contents('BD_Error.txt' , mysqli_connect_errno());
		exit();
		
}

else {
		$sql = "insert into `vrachi` values($ID_D,'$FIO','$Date_of_B','$Position','$Salaries',$ID_S);";
		$result = mysqli_query($link,$sql);
		
		if ($result = 'true'){
			header('location: ree.php');
        echo "Информация занесена в базу данных";
    }else{
        echo "Информация не занесена в базу данных";
    }
}
}
?>
 <form method="POST" action="ree.php">
 </form>
<br>

