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
		case '1': include('Login.php'); break;	
	}
 }
 ?>