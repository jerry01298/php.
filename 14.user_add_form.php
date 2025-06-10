<html>
    <head><title>新增使用者</title></head>
    <body>
<?php
# 關閉錯誤訊息的顯示（開發中建議開啟）        
    error_reporting(0);
# 啟動 session，用來確認使用者是否登入
    session_start();
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
# 三秒後跳轉回登入畫面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        echo "
            <form action=15.user_add.php method=post>
# 輸入使用者帳號的欄位，name為id
                帳號：<input type=text name=id><br>
# 輸入使用者密碼的欄位，name為pwd
                密碼：<input type=text name=pwd><p></p>
# 送出表單的按鈕，顯示文字為 "新增",重設表單內容的按鈕，顯示文字為 "清除"
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
