<?php
session_start();
header('charset=utf-8');
?>
<html lang="ja">
    <head><title>pass</title>
        <link rel="stylesheet" href="./css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題11　ファイル処理1(ユーザ認証)</span></h1>
        </header>
        <div id="contents">
            <p>
                <?php
                print $_SESSION['namae'] . "さんログイン成功です";
                unset($_SESSION["namae"]);
                ?>
            <p>
                <a href=kad11.php>ログインページへ</a>
        </div>
    </body>
</html>



















