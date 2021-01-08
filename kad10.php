<?php
    header('charset=utf-8');
    header('charset=utf-8');
    define('HOST', 'localhost');
    define('USR', 'se1a');
    define('PASS', 'ecc');
    define('DB', 'se1a');

    $id=trim($_GET['PRODUCT_NO']);

    if(isset($id)&& $id !=''){
        if(!$conn = mysqli_connect(HOST, USR, PASS, DB)){
                            die('データベースに接続できません');
                        }
        mysqli_set_charset($conn, 'UTF-8');
        $sql = "DELETE FROM se1a15 WHERE PRODUCT_NO = ?";

        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt)){
                            $message = "削除完了";
                        }else{
                            $message = '削除出来ませんでした！';
                        }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
        }
    
?>
           
<head>
        <meta charset="UTF-8">
        <title>kad09_1</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題09 データベース処理3(更新form)</span></h1>
        </header>
        <div id="contents">
            <?= $message?>
        </div>
        

