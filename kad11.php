<?php
session_start();
header('charset=utf-8');
if (!isset($_SESSION['namae'])) {
    $_SESSION['namae'] = '';
}
$name = '';
$pass = '';
$message = '';

if (isset($_POST["sub"])) {
    $name = trim(htmlspecialchars($_POST['namae'], ENT_QUOTES, 'UTF-8'));
    $pass = trim(htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));
    $filename = 'usr.dat';

    $file = @fopen($filename, 'r')or die('ファイルオープン失敗');
    flock($file, LOCK_SH);

    while (!feof($file)) {
        $data = fgets($file, 1000);
        list($dusr, $dpass) = explode(',', $data);

        if ($name == trim($dusr) && $pass == trim($dpass)) {
            $_SESSION['namae'] = $name;
            header("Location:http://nt24/~se1a15/pass.php");
            break;
        } else if ($name == trim($dusr) && $pass != trim($dpass)) {
            $message = 'パスワードが間違います';
            break;
        } else {
            $message = 'ユーザー名、パスワードが間違います';
        }
    }
    flock($file, LOCK_UN);
    fclose($file);
}
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>kad11_1</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題11 ファイル処理1(ユーザ認証)</span></h1>
        </header>
        <form action="kad11.php" method="post">
            <label for="namae">ユーザーID:<input type="text" name="namae"</label><br>
            <label for="pass">パスワード:<input type="password" name="pass"</label><br>
            <button type="submit" name="sub">Login</button>
            <button type="reset">Reset</button>
        </form>

        <br><?php
if (isset($message)) {
    echo $message;
}
?>
    </body>
</html>        


