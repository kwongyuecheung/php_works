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
    $sql = "SELECT * FROM se1a15 WHERE PRODUCT_NO = ".$id;
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$PRODUCT_NO,$PNAME,$CATEGORY,$PRICE);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<html lang="ja">
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
            <form action="kad09_2.php?PRODUCT_NO=<?= $id ?>" method="GET">
                
                <table border ="1" cellpadding ="0">
                    <tbody>
                        <tr>
                            <td>
                                <label for="PRODUCT_NO">
                                    商品NO</label>
                            </td>
                            <td>
                                <?php                                echo $PRODUCT_NO ?>
                                <input type="hidden" name="PRODUCT_NO" value="<?= $PRODUCT_NO?>">
                            </td>
                                </label>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="PNAME">
                                    商品名</label>
                            </td>
                            <td>
                                <input type="text" name="PNAME" value="<?= $PNAME?>">
                            </td>
                                </label>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="CATEGORY">
                                    カテゴリー名</label>
                            </td>
                            <td>
                                <input type="text" name="CATEGORY" value="<?= $CATEGORY?>">
                            </td>
                                </label>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="PRICE">
                                    価格</label>
                            </td>
                            <td>
                                <input type="text" name="PRICE" value="<?= $PRICE?>" size="5">円
                            </td>
                                </label>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left">
                                <button type="submit" name="submit" value="登録">登録</button>
                                <button type="reset" name="reset" value="reset">リセット</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>