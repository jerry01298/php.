<?php
// 關閉錯誤報告，避免顯示 PHP 錯誤訊息（開發時建議開啟）
error_reporting(0);
// 啟動 Session 機制，用來存取登入狀態
session_start();
if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    

   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   #echo $sql;
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤";
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁";// 顯示成功訊息並在 3 秒後跳轉到18.user.php頁面
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>
