<center>
<html>
<head >
<style>
body {
    background-color: #75c1ff;
}
</style>
</head >

<center>
 <? 
 If (!empty($_GET)) {
	switch ($_GET['TYPE']) {
		case '1': include('ree.php'); break;
		case '2': include('Daniel.php'); break;
		case '3': include('diagnosss.php'); break;
		case '4': include('pacient.php'); break;
		case '5': include('lekar.php'); break;
		
	}
 }
 ?>