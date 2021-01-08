<?php
    /**
    *ファイル名：kad04.php
    *課題04 ユーザ定義関数
    *作者：コウユウショウ
    *クラス：SE1A
    */
    header('charset=utf-8');
    function dispKansu1($x){
        for($i = 0; $i <= $x; $i++){
            print'PHP Script<br>';
        }
    }
    function dispMessage(){
        $now = getdate();
         $hour = $now['hours'];
        if($hour > 12 && $hour < 18){
            $message = 'お昼です';
        }else if($hour > 18 && $hour < 5){
             $message = '夜です';
        }else{
             $message = '朝です。';
        }
        return $message;
    }
    
    ?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>kad04</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <h1><span>課題04 ユーザ定義関数</span></h1>
    <h4>■指定した回数分文字列を表示する関数</h4>
    
    <body>
        <?php
            print'PHP Scriptを4回表示する';
            dispKansu1(4);
            print' <br>';
        
        print'<b>■現在の時刻を表示する関数</b><br>';
        
        print'現在の時刻は'.date('G').'時'.date('i').'分'.date('s').'秒です<br><br>';
        print'<b>■時間によりメッセージを変える関数</b><br>';
        
        $a = dispMessage();
        print $a;
        ?>
        </body>
</html>
