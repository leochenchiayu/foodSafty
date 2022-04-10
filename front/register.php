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
    <body>
            <nav>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">首頁</a></li>
                        <li><a href="common.php">常見添加物</a> </li>
                        <li><a href="index.php?cancel=yes">熱門文章</a></li>
                        <li><a href="qualify.php">合格食品業者查詢</a>
                        <li><a href="login.php">登入</a></li>
                    </ul>
                </div>
            </nav>
        <!-- <div class="bg">
            <img src="https://www.unido.org/sites/default/files/styles/fullwidth_image/public/styles/1_1_crop_widget/public/2017-12/supermarket-2384476.jpg?itok=o4BekLPR" alt="">
        </div> -->
        <form class="form_submit">
            <div class="form-group">
                <label for="exampleInputEmail1">您的姓名</label>
                <input type="" class="form-control" id="yourname" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">您的帳號</label>
                <input type="account" class="form-control" id="youraccount" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">請輸入您的密碼</label>
                <input type="password" class="form-control" id="yourpassword" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">請再次輸入您的密碼</label>
                <input type="password" class="form-control" id="yourpasswordagain" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">請輸入您的電子郵件</label>
                <input type="email" class="form-control" id="youremail" required>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">送出</button>
        </form>
    </body>

    <script>
        $(document).ready(function(){
            $("form.form_submit").submit(function(e){
                e.preventDefault();
                if($("yourpassword").val() != $("yourpasswordagain").val()){
                    alert("輸入的密碼不正確!!");
                }else{
                    $.ajax({
                        type:"post",
                        url: "../php/lookupformember.php",
                        data: {
                            yourname: $("#yourname").val(),
                            youraccount : $("#youraccount").val(), 
                            yourpassword: $("#yourpassword").val(),
                        },
                        dataType: "html"
                        }).done(function(data) {
                            if(data=='no'){
                                alert("已經註冊過了");
                            }else{
                                if($("#yourpassword").val() != $("#yourpasswordagain").val()){
                                    alert("密碼不相同!!");
                                }else{
                                    $.ajax({
                                    type:"post",
                                    url: "../php/register_back.php",
                                    data: {
                                        yourname: $("#yourname").val(),
                                        youraccount : $("#youraccount").val(), 
                                        yourpassword: $("#yourpassword").val(),
                                        youremail : $("#youremail").val()
                                    },
                                    dataType: "html"
                                    }).done(function(data) {
                                        console.log(data);
                                        if(data=='yes'){
                                            alert("註冊成功!前往登入頁面");
                                            window.location.href="login.php";
                                        }
                                        // console.log(data);
                                    }).fail(function(jqXHR, textStatus, errorThrown) {
                            //失敗的時候
                                        alert("有錯誤產生，請看 console log");
                                        console.log(jqXHR.responseText);
                                    });
                                }
                    //         }).fail(function(jqXHR, textStatus, errorThrown) {
                    // //失敗的時候
                    //             alert("有錯誤產生，請看 console log");
                    //             console.log(jqXHR.responseText);
                    //         });
                            }
                    });
                }
            });
        })
    </script>
</html>