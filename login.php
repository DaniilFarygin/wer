

<html>

<head>
	
    <title>Вход на сайт</title>
</head>

<body>
<style>

body {
    background-color: #75c1ff;
}
.form-4 {
    /* Size and position */
    width: 300px;
    margin: 60px auto 30px;
    padding: 10px;
    position: relative;
 
    /* Font styles */
    font-family:Georgia;
    color: #fffff;
  
}
 

.form-4 input[type=text],
.form-4 input[type=password] {
    /* Size and position */
    width: 100%;
    padding: 8px 4px 8px 10px;
    margin-bottom: 15px;
 
    /* Styles */
    border: 1px solid #4e3043; /* Fallback */
    border: 1px solid rgba(78,48,67, 0.8);
    background: rgba(0,0,0,0.15);
   
    /* Font styles */

    color: #ffff;
    font-size: 17px;
}

error_reporting(0);
ini_set('display_errors', 0);

</style>

<?
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$link=mysqli_connect("10.100.3.6", "15073", "student", "15073");

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip']))
        {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: freim.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>

<form method="POST" class="form-4"style='font-size:20px; font-weight:bold;'  > 
Логин <input name="login"  type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="submit" style="cursor: pointer;  font-weight:bold; font-size:20px;   padding:6px 14px; color:#000000;  background-color:#ffffff; border-radius:9px; border:none;" type="submit" value="Войти">
</form>




</body>
</html>