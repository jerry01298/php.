<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);
    // 啟動 Session 來確認是否登入
    session_start();
    // 如果尚未登入，提示並跳轉
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
    //連接資料庫   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 從URL取得id並查詢該帳號的資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
    // 取得資料列
        $row=mysqli_fetch_array($result);
    // 顯示修改表單
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
    // 顯示使用者的帳號
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
    // 表單提交按鈕，顯示文字為「修改」
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
