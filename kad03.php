<?php
    /**
    *ファイル名：kad03.php
    *課題03 正規表現
    *作者：コウユウショウ
    *クラス：SE1A
    */
    header('charset=utf-8');
    
    $greeting = 'Hello PHP';
    $message = 'ecc144';
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
        <title>kad03</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
    <header>
        <h1><span>課題03 正規表現</span></h1>
    </header>
        <div id =" contents">
            <h4>■正規表現（マッチング）</h4>
            <br>
            <h4>正規表現を行い、表示を変える</h4>
        <?php
            print'変数$messageの内容がアルファベットで始まっているかどうか調べ表示を変える<br>';
            
            print'変数$messageの内容：'.$message.' <br>';
            if(preg_match('/^[a-zA-Z]/',$message)){
                print'変数の内容はアルファベットで始まっている文字列です';
            }else{
                print'変数の内容はアルファベットで始まっている文字列ではありません';
            }
            ?>
    <br>
    <h4>変数の文字列の一部を置き換える</h4>
        <?php
            print'変数$greetingの内容：'.$greeting.' <br>';
            print'「Hello」を「こんにちわ」に置き換える<br>';
            $greeting = str_replace('Hello', 'こんにちわ', $greeting);
            print'変数$greetingの内容：'.$greeting;
        ?>
        </div>
    </body>
</html>
