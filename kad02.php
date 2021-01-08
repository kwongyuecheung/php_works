<?php
    /**
    *ファイル名：kad02.php
    *
    *作者：コウユウショウ
    *クラス：SE1A
    */
    header('charset=utf-8');
    
?> 
<!DOCTYPE html>
<html lang="ja">
<head><title>kad02</title>
<link rel="stylesheet" href="../css/kad.css">
</head>
<body>
<header>
<h1><span>課題02 制御構文・配列2</span></h1>
</header>

<div id="contents">
<h2>■現在の時刻を表示する(date関数)</h2>
<br>
<p>   
<?php
    //date関数
    $wdays = array('日','月','火','水','木','金','土');
    $i = date('w');
    print'今日は'.date('Y').'年'.date('m').'月'.date('d').'日'.'('.$wdays[$i].')';
    echo "<br>";
    print'現在の時刻は'.date('G').'時'.date('i').'分'.date('s').'秒です';
?>
<br>
<h2>■時間によりメッセージを変える</h2>
<br>
<?php
    $now = getdate();
    $hour = $now['hours'];
    if($hour > 12 && $hour < 18){
            print 'お昼です';
    }else if($hour > 18 && $hour < 5){
        print '夜です';
    }else{
    print '朝です。';
        
    }
 ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
