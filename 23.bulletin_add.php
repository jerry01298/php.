<?php
    error_reporting(0);
    // 開始 session 確認登入狀態
    session_start();
    // 如果尚未登入，提示並導向登入頁
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
    // 連線到MySQL資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 建立SQL插入語句，將POST傳入的表單資料寫入bulletin表
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
    // 執行SQL並檢查是否成功
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
