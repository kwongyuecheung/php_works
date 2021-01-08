
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
        <title>kad08</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題08 データベース処理(データの追加)</span></h1>
        </header>
        <div id="contents">
            <?php
                if(isset($_POST['submit'])&& $_POST['PRODUCT_NO'] != ''){
                    $PRODUCT_NO = trim(htmlspecialchars($_POST['PRODUCT_NO'],ENT_QUOTES,'UTF-8'));
                    $PNAME = trim(htmlspecialchars($_POST['PNAME'],ENT_QUOTES,'UTF-8'));
                    $CATEGORY = trim(htmlspecialchars($_POST['CATEGORY'],ENT_QUOTES,'UTF-8'));
                    $PRICE = trim(htmlspecialchars($_POST['PRICE'],ENT_QUOTES,'UTF-8'));
                    
                    if(!$conn = mysqli_connect(HOST, USR, PASS, DB)){
                        die('データベースに接続できません');
                    }
                    mysqli_set_charset($conn, 'UTF-8');
                    $PRODUCT_NO = mysqli_real_escape_string($conn,$PRODUCT_NO);
                    $PNAME = mysqli_real_escape_string($conn, $PNAME);
                    $CATEGORY = mysqli_real_escape_string($conn,$CATEGORY);
                    $PRICE = mysqli_real_escape_string($conn,$PRICE);
                    
                    $PRODUCT_NO = str_replace("%", "\%", $PRODUCT_NO);
                    $PNAME = str_replace("%", "\%", $PNAME);
                    $CATEGORY = str_replace("%", "\%", $CATEGORY);
                    $PRICE = str_replace("%", "\%", $PRICE);
                    
                    $sql = "INSERT INTO se1a15(PRODUCT_NO,PNAME,CATEGORY,PRICE) VALUES(?,?,?,?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 'sssi', $PRODUCT_NO,$PNAME,$CATEGORY,$PRICE);
                    mysqli_stmt_execute($stmt);
                    
                    if(mysqli_stmt_affected_rows($stmt)){
                        print'<p>登録完了</p>';
                    }else{
                        die('登録できませんでした');
                    }
                    
                    mysqli_stmt_free_result($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                }else{
                    if(isset($_POST['submit']) && $_POST['PRODUCT_NO'] == ''){
                        print"<font color='#ff0000'>商品NOは必須です</font>";
                    }
                }
            ?>
        
            <form action="kad08.php" method="post">
                商品を登録します
                <table border ="1" cellpadding ="0">
                    <tbody>
                        <tr>
                            <td>
                                <label for="PRODUCT_NO">
                                    商品NO</label>
                            </td>
                            <td>
                                <input type="text" name="PRODUCT_NO" id="PRODUCT_NO" size="5">
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
                                <input type="text" name="PNAME" id="PNAME">
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
                                <input type="text" name="CATEGORY" id="CATEGORY">
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
                                <input type="text" name="PRICE" id="PRICE" size="5">円
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
                
           


