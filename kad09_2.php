<?php
header('charset=utf-8');
define('HOST', 'localhost');
define('USR', 'se1a');
define('PASS', 'ecc');
define('DB', 'se1a');

?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>kad09_2</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題09 データベース処理3(更新)</span></h1>
        </header>
        <div id="contents">
        <?php
            $id = trim($_GET['PRODUCT_NO']);
            $PRODUCT_NO = trim(htmlspecialchars($_GET['PRODUCT_NO'],ENT_QUOTES,'UTF-8'));
            $PNAME = trim(htmlspecialchars($_GET['PNAME'],ENT_QUOTES,'UTF-8'));
            $CATEGORY = trim(htmlspecialchars($_GET['CATEGORY'],ENT_QUOTES,'UTF-8'));
            $PRICE = trim(htmlspecialchars($_GET['PRICE'],ENT_QUOTES,'UTF-8'));
            
            if(isset($id)&& $id !=''){
                if(!$conn = mysqli_connect(HOST, USR, PASS, DB)){
                        die('データベースに接続できません');
                    }
                $PRODUCT_NO = str_replace("%","\%", mysqli_real_escape_string($conn,$PRODUCT_NO));
                $PNAME = str_replace("%","\%", mysqli_real_escape_string($conn,$PNAME));
                $CATEGORY = str_replace("%","\%", mysqli_real_escape_string($conn,$CATEGORY));
                $PRICE = str_replace("%","\%", mysqli_real_escape_string($conn,$PRICE));
                
                
                mysqli_set_charset($conn, 'UTF-8');
                $sql = "UPDATE se1a15 SET PNAME=?,CATEGORY=?,PRICE=? WHERE PRODUCT_NO=?";
                
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt,'sssi',$PNAME,$CATEGORY,$PRICE,$PRODUCT_NO);
                mysqli_stmt_execute($stmt);
                if(mysqli_stmt_affected_rows($stmt)){
                        print"更新完了しました！<a href=\"kad07.php\">kad07</a>で確認してください";
                    }else{
                        print('更新出来ませんでした！');
                    }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
            ?>
        </div>

