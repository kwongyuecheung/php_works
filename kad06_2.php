<?php
/**
    *ファイル名：kad06_2.php
    *課題04 ユーザ定義関数
    *作者：コウユウショウ
    *クラス：SE1A
    */
session_start();
header('charset=utf-8');

$name = '';

if (isset($_GET['namae'])) {
    $name = trim(htmlspecialchars($_GET['namae'], ENT_QUOTES, 'UTF-8'));
}

if ($name == '' && isset($_GET['sub'])) {
    if ($name == '' || $_SESSION['namae'] == '') {
        $err['namae'] = "<font color='red'>名前を入力してください</font>";
    }
} else if ($name != '' && !isset($_SESSION['namae'])) {
    $_SESSION['namae'] = $name;

    for ($i = 1; $i <= 3; $i++) {
        $_SESSION['shohin' . $i] = 0;
    }
    setcookie("name", $name, time() + 60);
}
?>

<html lang="ja">

    <head>
        <title>課題06</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題06 クッキー・セッション</span></h1>
        </header>
        <div id="contents">
            <p>名前：
            <?php
            if (isset($err['namae']) && $err['namae'] != '') {
                print $err['namae'];
                print"<br><a href =\"kad06_1.php\">戻る</a>";
                exit;
            } else {
                print $_SESSION['namae'] . "さん、いらっしゃいませ！\n";
            }
            ?>
            </p>
            <p>
            <form action="Kad06_3.php" method="post">
                <table border="1" bordercolor="#656567">
                    <tr><th>photo</th><th>name</th><th>price<th>piece</th></tr>
                    <tr><td><img src="./images/cake01.jpg" width="80" height="68"></td><td>ブッシュド・ノエル</td><td>250円</td><td><input type="hidden" name="shohin1" value="250">
                            <input type="text" name ="kosu1" size=4 value=<?= $_SESSION['shohin1'] ?>>pieces</td></tr>
                    <tr><td><img src="./images/cake02.jpg" width="80" height="68"></td><td>シブースド・ノエル</td><td>200円	</td><td><input type="hidden" name="shohin2" value="200">
                            <input type="text" name ="kosu2" size=4 value=<?= $_SESSION['shohin2'] ?>>pieces</td></tr>
                    <tr><td><img src="./images/cake03.jpg" width="80" height="68"></td><td>イチゴとシブースドケーキ</td><td>400円	</td><td><input type="hidden" name="shohin3" value="400">
                            <input type="text" name ="kosu3" size=4 value=<?= $_SESSION['shohin3'] ?>>pieces</td></tr>
                    <tr><td colspan="4"><button type="submit" name="sub" value="注文">注文</button></td>
                </table>
            </form>
            </p>
        </div>
    </body>
</html>