<?php
// 關閉錯誤訊息顯示（開發階段建議打開）
    error_reporting(0);
// 啟用 session，確認使用者是否登入
    session_start();
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
// 三秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
// 已登入，開始處理刪除使用者資料
// 建立與資料庫的連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
// 建立 SQL 刪除指令，從GET參數取得欲刪除的帳號 id
        $sql="delete from user where id='{$_GET["id"]}'";
        #echo $sql;
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";
        }else{
            echo "使用者刪除成功";
        }
// 三秒後跳轉回使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
