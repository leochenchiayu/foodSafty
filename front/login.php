<?php 
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: ../back/index.php");
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/css_main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../css/login.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>登入後台</title>
    <input type="hidden" id="link" value="<?php 
        if(isset($_SESSION['link'])){
            echo $_SESSION['link']; 
        }else{
            echo "no";
        }?>">
    <body>
            <nav>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">首頁</a></li>
                        <li><a href="common.php">常見添加物</a> </li>
                        <li><a href="index.php?cancel=yes">熱門文章</a></li>
                        
                        <li><a href="register.php">註冊</a></li>
                        <li><a href="qualify.php">合格食品業者查詢</a>
                    </ul>
                </div>
            </nav>
        <!-- <div class="bg">
            <img src="https://www.unido.org/sites/default/files/styles/fullwidth_image/public/styles/1_1_crop_widget/public/2017-12/supermarket-2384476.jpg?itok=o4BekLPR" alt="">
        </div> -->
        <form class="form_submit">
            <?php if(isset($_SESSION['login_error'])){?>
                <div class="alert alert-danger t-center" role="alert">
                    請先登入!!                
                </div>
            <?php }?>
            <div class="form-group">
                <label for="account">請輸入帳號</label>
                <input type="account" id="youraccount" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">請輸入密碼</label>
                <input type="password" id="yourpassword" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </body>
    <script>
        $(document).ready(function(){
            $("form.form_submit").submit(function(e){
                e.preventDefault();
                    $.ajax({
                        type:"post",
                        url: "../php/check_user.php",
                        data: {
                            youraccount : $("#youraccount").val(), 
                            yourpassword: $("#yourpassword").val(),
                        },
                        dataType: "html"
                        }).done(function(data) {
                            console.log(data);
                            if(data=='yes'){
                                if($("#link").val()!="no"){
                                    window.location.href = "../back/" + $("#link").val();
                                }else{
                                    window.location.href = "../back/index.php";
                                }
                            }else{
                                alert("密碼錯誤!");
                            }
                        }).fail(function(jqXHR, textStatus, errorThrown) {
                //失敗的時候
                            alert("有錯誤產生，請看 console log");
                            console.log(jqXHR.responseText);
                        });
                
            });
        })
    </script>
</html>