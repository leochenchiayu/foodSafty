<?php
    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']){
        $_SESSION['link']=basename(__FILE__);
        $_SESSION['login_error']=true;
        header("Location:../front/login.php");
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
    <link rel="stylesheet" type="text/css" href="../css/index_back.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>食農推廣</title>
</head>
<body>
    <input type="hidden" class="name" value="<?php echo $_SESSION['name']?>">
    <nav class="full-width">
       
        <div class="fixed-width clearfix">
            <ul style="right:0; float:right;">
                <li>|</li>
                <li><a href="../php/log_out.php">登出</a></li>
                <li>|</li>
                <li><a href="index.php">後台首頁</a></li>
                <li>|</li>
                <li><a href="../front/index.php">回前台首頁</a></li>
                <li>|</li>
                <li><?php echo $_SESSION['name'],"您好";?></li>
                <li>|</li>
            </ul>
        </div>
 
    </nav>
    <header class="full-width">
            <h1 style="color:white;">文章發表</h1>
    </header>
    <!-- <div class="full-width">
        <div class="fixed-width">
            <div class="col-xl-12">
                <h3 class="t-center">文章發表</h3>
            </div>
        </div>
        <form class="form_submit">
                <div class="form-group">
                    <label for="account">主題</label>
                    <input class="title">
                </div>
                <div class="form-group" id="content">
                    <label for="exampleInputPassword1">文章</label>
                    <textarea rows="10" class="article"></textarea>
                </div>
                <div class="form-group" class="file">
                    <label class="txt_img" for="">上傳圖片</label>
                </div>
               
                <div class="form-group" enctype="multipart/form-data">
                    <input type="file" id='files' name="files[]" multiple><br>
                    <input class="btn btn-success" type="button" name="image_path" id="sending_file" value='上傳圖片檔案'>
                </div>
                <div id='preview'></div>
                <button type="submit" id="submit" class="btn btn-primary">送出</button>
        </form>
    </div> -->

    <div class="mypost full-width">
        <div class="fixed-width">
            <div class="col-xl-12 col-12">
                <h3 class="t-center">文章發表</h3>
            </div>
            <form class="form_submit" id="">
                <div class="form-group" id="title">
                    <label for="account">主題</label>
                    <input class="title" value="">
                </div>
                <div class="form-group" id="content">
                    <label for="exampleInputPassword1">文章</label>
                    <textarea rows="10" class="content" value=""></textarea>
                </div>
                <!-- <div class="form-group" class="file"> -->
                <!-- <div class="img-section">
                    <div class="img">
                        <div class="delete-img">
                            <a class="delete btn btn-danger mt-2" id="" href="javascript:void(0)">刪除</a>
                        </div>
                    </div>
                </div> -->
                    <input type="file" id='files' name="fileupload" multiple><br>
                    <div class="delete">

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mt-3">送出更改</button>
            </form>
        </div>
    </div>

</body>
<script>
    // $(document).ready(function(){
        
    // })
    $(document).ready(function(){
        $(".form_submit").submit(function(e){
            e.preventDefault();
            let x = $(this);
            let file = $("#files")[0].files
            let title = $(".title").val();
            let content = $(".content").val();
            let formData = new FormData();
            if(file.length > 0){
                formData.append("file",file[0]);
            }

            formData.append("title",title);
            formData.append("content",content);

            $.ajax({
                url:"../php/add_article.php",
                type:"post",
                data:formData,
                dataType:"html",
                contentType: false,
                processData: false
            }).done(function(data){
                console.log(data);
            })
        })
    })
</script>
</html>