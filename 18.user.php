<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
    // 關閉錯誤訊息顯示（開發時建議打開）
        error_reporting(0);
    // 啟用 Session，用來確認登入狀態
        session_start();
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
    // 三秒後自動跳轉至登入頁面
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
    // 已登入，顯示使用者管理功能
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                <tr><td></td><td>帳號</td><td>密碼</td></tr>";
    // 連接到資料庫
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 從user資料表中查詢所有使用者
            $result=mysqli_query($conn, "select * from user");
    // 使用while迴圈列出所有使用者資料
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
