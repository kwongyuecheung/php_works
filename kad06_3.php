<?php
/**
    *ファイル名：kad06_3.php
    *課題04 ユーザ定義関数
    *作者：コウユウショウ
    *クラス：SE1A
    */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
header('charset=utf-8');

$goukei = 0;
for($i = 1; $i <= 3; $i++){
    $kakaku = trim(htmlspecialchars($_POST['shohin'.$i],ENT_QUOTES,'UTF-8'));
    $kosu = trim(htmlspecialchars($_POST['kosu'.$i],ENT_QUOTES,'UTF-8'));
    if(!preg_match('/^[0-9]+$/',$kosu)){
        $_SESSION['shohin'.$i] = 0;
    }elseif ($kosu !=0){
        $_SESSION['shohin'.$i] = $kosu;
        $goukei += ($kakaku * $_SESSION['shohin'.$i]);
    }
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
            <p>
                <?php
                    print $_SESSION['namae']."さん、お買い上げありがとうございます<br>\n";
                    print "お買い上げ金額は".number_format($goukei)."円になります。<br>\n";
                    print"<p><a href='kad06_2.php'>買い物に戻る</a></p>";
                ?>
        </div>
    </body>
</html>
