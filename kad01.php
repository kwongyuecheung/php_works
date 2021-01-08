<?php
    /**
    *ファイル名：kad01.php
    *
    *作者：コウユウショウ
    *クラス：SE1A
    */
    header('charset=utf-8');
    $res = 'OK';
    define('MESSAGE','Are you ready for PHP?');

    $lang = array('PHP','JSP','Ruby','Perl','Python');
    $name = array('PHP' => 'Hypertext Preprocessor',
        'ASP' => 'Active Server Pages','JSP' => 'Java Server Pages',
        'CGI' => 'Common Gateway Interface','IIS' => 'Internet Information Server');
?> 

<!DOCTYPE html>
<html lang="ja">
<head><title>kad01</title>
<link rel="stylesheet" href="../css/kad.css">
</head>
<body>
<header>
<h1><span>課題01 制御構文・配列1</span></h1>
</header>

<div id="contents">
<h2>■文字列の表示(変数・定数)</h2>
<br>d
    定数(MESSAGE)：<?=MESSAGE ?>
</br>
<br>
<?php
    print('変数($res):'.$res);
?>
<br>
<br>
<h2>■配列１ 表示</h2>
<br>
<h2>配列の内容を表示する(WEB用スクリプト一覧)</h2>
<br>
<?php
    for($i = 0; $i < count($lang); $i++){
        print($lang[$i]. "<br>\n");
    }
?>
<br>
<h2>■配列2 表示</h2>
<br>
<br>
<h2>連想配列の内容を表示する(略語 → 正式名)</h2>
<?php
    foreach($name as $key => $val){
        print('略語：'.$key. '→ 正式名：'.$val."<br>\n");
    }
?>
</div>
</body>
</html>
