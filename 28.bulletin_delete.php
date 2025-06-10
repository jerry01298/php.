<?php
    error_reporting(0);
    // 啟動session
    session_start();
    // 如果session中沒有登入id，提醒使用者登入並跳轉登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
     // 連接資料庫   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 建立刪除SQL語句，從GET取得佈告編號bid有 SQL 注入風險）
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        #echo $sql;
    // 執行刪除語句
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        }else{
            echo "佈告刪除成功";
        }
     //3秒後跳轉回佈告列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
