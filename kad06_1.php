<?php
/**
    *ファイル名：kad06_1.php
    *課題04 ユーザ定義関数
    *作者：コウユウショウ
    *クラス：SE1A
    */
session_start();

if (isset($_SESSION['namae'])) {
    unset($_SESSION['namae']);
}
?>

<!DOCTYPE html>
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
            <p>
            <form method="GET" action="kad06_2.php">
                名前を入力してください
                </p>
                <input type="text" name="namae" value="
                <?php

                if (isset($_COOKIE["name"])) {
                    print$_COOKIE["name"];
                }
                ?>
                       ">
                <button type="submit" value="送信" name="sub">送信</button>
                <button type="reset" value="リセット" name="res">取消</button>
            </form>
        </div>
    </body>
</html>
