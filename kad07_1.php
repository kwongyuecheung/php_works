<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <title>kad07_1</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題07 データベース処理(検索)</span></h1>
        </header>
        <div id="contents">
            検索するカテゴリを入力してください
            <form action="kad07_1.php" method="post">
                <table border ="3" cellingpadding="0">
                    
                    <td>
                        <input type ="text" name="title" id="title">
                    </td>
                    
                    <td colspan="2">
                        <button type="submit" name="submit" value="検索">検索</button>
                    </td>
                </table>
            </form>
            <br>
            <?php
            if (isset($_POST['submit'])) {
                if ($_POST['title'] != '') {
                    if (!$conn = mysqli_connect(HOST, USR, PASS, DB)) {
                        die('キーワードに一致したものはありません');
                    }
                    mysqli_set_charset($conn, 'utf8');
                    $condition = '';
                    if (isset($_POST['title']) && ($_POST['title'] != '')) {
                        $title = trim(htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'));
                        $title = mysqli_real_escape_string($conn, $title);
                        $title = str_replace("%", "\%", $title);
                        if ($condition == '') {
                            $condition = "WHERE PNAME LIKE \"%" . $title . "%\"";
                        } else {
                            $condition = "AND PNAME LIKE \"%" . $title . "%\"";
                        }
                    }
                    $sql = "SELECT * FROM se1a15 WHERE CATEGORY LIKE \"%" . $title . "%\"";

                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $num = mysqli_stmt_num_rows($stmt);

                    if ($_POST['title'] != '') {
                        if ($num > 0) {
                            mysqli_stmt_bind_result($stmt, $PRODUCT_NO, $PNAME, $CATEGORY, $PRICEt);
                            while (mysqli_stmt_fetch($stmt)) {
                                print'<tr>';
                                print'<td>商品NO：' . $PRODUCT_NO . '　</td>';
                                print'<td>商品名：' . $PNAME . '　</td>';
                                print'<td>種類：' . $CATEGORY . '　</td>';
                                print'<td>価額：' . $PRICEt . '<br></td>';
                                printf("<div align=\"right\"><a href=\"kad09_1.php?PRODUCT_NO=%s\">更新\n",$PRODUCT_NO);
                                printf("<a href=\"kad10.php?PRODUCT_NO=%s\">削除",$PRODUCT_NO);
                                printf("</a></div>\n");
                            }
                            print'</table>';
                        }
                        mysqli_stmt_free_result($stmt);
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }
                }
            }
            ?>

        </div>
    </body>
</html>
