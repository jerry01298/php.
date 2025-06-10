<?php

    error_reporting(0);
    // 啟用 session 來檢查登入狀態
    session_start();
    // 如果尚未登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
    // 連接資料庫  
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 執行更新密碼SQL指令
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";
    // 資料已更新，3秒後自動返回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            echo "修改成功，三秒鐘後回到網頁";
    // 資料已更新，3秒後自動返回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
