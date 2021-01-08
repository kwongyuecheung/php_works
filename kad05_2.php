<?php
/**
    *ファイル名：kad05_1.php
    *課題04 ユーザ定義関数
    *作者：コウユウショウ
    *クラス：SE1A
    */
header('charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>課題05</title>
        <link rel="stylesheet" href="kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題05フォーム処理</span></h1>
        </header>
        <div id="contents">
            <?php
            $name = trim(htmlspecialchars($_POST['namae'], ENT_QUOTES, 'UTF-8'));
            $class = trim(htmlspecialchars($_POST['class'], ENT_QUOTES, 'UTF-8'));
            $no = trim(htmlspecialchars($_POST['no'], ENT_QUOTES, 'UTF-8'));
            $gender = trim(htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8'));
            $address = trim(htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'));
            if ($name == '') {
                $err['name'] = "<p>名前：<font color='#FF0000'>名前を入力してください</font></p>";
            } else if (strlen($name) >= 20) {
                $err['name'] = "<p>名前：<font color='#FF0000'>名前は20文字以内です</font></p>";
            }
            if ($class == '') {
                $err['class'] = "<p><font color='#FF0000'>クラスを入力してください</font></p>";
            }
            if ($no == '') {
                $err['no'] = " 出席番号:<font color='#FF0000'>出席番号を入力してください</font>";
            }
            if ($gender == '') {
                $err['gender'] = "<p><font color='#FF0000'>性別を入力してください</font></p>";
            }
            if ($address == '') {
                $err['address'] = "<p><font color='#FF0000'>E-Mailを入力してください</font></p>";
            }
            if (strlen($name) && $name != '') {
                print"<p>名前：" . $name;
            } else {
                print $err['name'];
            }
            if ($class != '') {
                print"<p>クラス：" . $class;
            } else {
                print $err['class'];
            }
            if ($no != '') {
                print"\n出席番号:" . $no;
            } else {
                print $err['no'];
            }
            if ($gender != '') {
                print"<p>性別：" . $gender;
            } else {
                print $err['gender'];
            }
            if ($address != '') {
                print"<p>メールアドレス：" . $address;
            } else if (!preg_match('/^[0-9a-zA-Z_\.\-]+@[0-9a-zA-Z_\-]+\.[0-9a-zA-Z_\.\-]+$/', $address)) {
                print"<p>メールアドレス：<font color='#FF0000'>正しくメールアドレスを入力してください</font>";
            }
            ?>
            <p><a href="kad05_1.html"><font color ="#FF00FF">入力フォームへ</font></a></p>
        </div>
    </body>
</html>
