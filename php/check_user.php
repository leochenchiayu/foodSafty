<?php
    require_once 'db.php';
    $account =  $_POST['youraccount'];
    $password = $_POST['yourpassword'];
    // $result = null;
	//先把密碼用md5加密
	$new_password = sha1($password);
  //將查詢語法當成字串，記錄在$sql變數中
    $sql = "SELECT * FROM `member` WHERE `account` = '$account' AND `password` = '$new_password'" ;
    
    $query = mysqli_query($mysql, $sql);

    
    if ($query)
    {
        //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
        if(mysqli_num_rows($query)>0)
        {
            echo 'yes';
            $user = mysqli_fetch_assoc($query);
      //在session李設定 is_login 並給 true 值，代表已經登入
            $_SESSION['login'] = TRUE;
            // print_r($user);
            //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            unset($_SESSION['login_error']);
        }else{
            echo 'no';
        }
    }
    else
    {
        //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($mysql);

    }
    
    
   

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中

  //如果請求成功

  //回傳結果
    // return $result;


?>
