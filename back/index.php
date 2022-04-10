<?php
    // session_start();
    require_once '../php/db.php';
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
    <!-- <link rel="stylesheet" type="text/css" href="../css/css_main.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" type="text/css" href="../css/index_back.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>後台首頁</title>
</head>
<style>
 
    p{
        margin-top:13px;
        margin-right:13px;
        font-size:20px;
        color:white;
        float:right;
    }

</style>
<input type="hidden" class="name" value="<?php echo $_SESSION['name']?>">
<body>
            <nav class="full-width">
                <div class="fixed-width clearfix">
                    <div class="menu">
                        <ul>
                            <li><a href="food.php">文章發表</a></li>
                            <li>|</li>
                            <li><a href="../front/index.php">回前台首頁</a></li>
                            <li>|</li>
                            <li><a href="../php/log_out.php">登出</a></li>
                            <li>|</li>
                            <li><?php echo $_SESSION['name'],"您好!";?></li>
                            <li>|</li>
                        </ul>
                    </div>
                </div>
            </nav>
    <header class="full-width">
        <div class="fixed-width clearfix">
            <!-- <div class="info"> -->
                
            <!-- </div> -->
            <div id="h1">
                <h1 class="t-right"><span class="c1"></span> 後台</h1>
                <h1 class="t-right"><span class="c2"></span> 首頁</h1>
            </div>
        </div>
    </header>


    <div class="mypost full-width">
        <div class="fixed-width">
            <div class="col-xl-12 col-12">
                <h3 class="t-center">我的文章(您可在此編輯文章)</h3>
            </div>
        <?php
                $sql = "SELECT * FROM `food` WHERE `poster` = '{$_SESSION["id"]}' ;";
                if($result = mysqli_query($mysql,$sql)){
                    if(mysqli_num_rows($result)<1){
                        echo "
                                <div class='col-xl-12 col-12'>
                                    <div class='t-center alert-danger alert' role='alert'>
                                        您無任何文章發表!!
                                    </div>
                                </div>"
                            ;
                    }else{
                        while($row = mysqli_fetch_array($result)){?>
                <form class="form_submit" id="<?php echo $row['id'];?>">
                    <div class="form-group" id="title">
                        <label for="account">主題</label>
                        <input class="title" value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group" id="content">
                        <label for="exampleInputPassword1">文章</label>
                        <textarea rows="10" class="article" value=""><?php echo strip_tags($row['content']); ?></textarea>
                    </div>
                    <!-- <div class="form-group" class="file"> -->
                    <div class="img-section">
                        <?php if($row["imgpath"] != NULL){?>
                            <div class="img">
                                <img class="img-fluid rounded w-50" src="<?php echo "../upload".$row["imgpath"]?>" alt="">
                                <div class="delete-img">
                                    <a class="delete btn btn-danger mt-2" id="<?php echo $row["id"];?>" href="javascript:void(0)">刪除</a>
                                </div>
                            </div>
                        <?php }else{?>    
                            <?php }?>
                        </div>
                        <input type="file" id='files' name="fileupload" multiple><br>
                        <button type="submit" id="submit" class="btn btn-primary mt-3">送出更改</button>
                    </div>
                </form>
                <hr>
            <?php       }
                    }
                }
            ?>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".form_submit").submit(function(e){
            e.preventDefault();
            let x = $(this);
            let formData = new FormData();
            let file = x.children("#files")[0].files;
            if(file.length > 0){
                formData.append("file",file[0]);
                formData.append("id",x.attr("id"));
            }else{
                formData.append("file","no");
                formData.append("id",x.attr("id"));
            }

            $.ajax({
                url:"../php/update_img.php",
                type:"post",
                data:formData,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                },
            });
            
            $.ajax({
                url:"../php/update_article.php",
                type:"post",
                data:{
                    id:x.attr("id"),
                    title:x.children("#title").children(".title").val(),
                    content:x.children("#content").children(".article").val()
                },
                datatype:'html',
            }).done(function(data){
                // console.log(data);
                alert("更新成功!!");
            }).fail(function(jqXHR, textStatus, errorThrown) {
                
            });

            
            
            // console.log($(this).attr("id"));
            // console.log($(this).children("#title").children(".title").val());
            // console.log($(this).children("#content").children(".article").val());
            
        })

        //刪除圖片
        $("a.delete").click(function(e){
            e.preventDefault();
            ($(this)).parent().parent().remove();
            // $(".img-section").html(
            //     "<input type='file' id='files' name='fileupload' multiple><br>"
            // )
        })
    })
</script>
</html>