<?php
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
    <link rel="stylesheet" type="text/css" href="../css/css_main.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>首頁</title>
</head>
<style>
    .thumb_up{
        float:left;
        width:100%;
    }
    .hr{
        width:100%;
        float:left;
    }
    .title{
        font-size:25px;
    }

    <?php
        if(!isset($_GET["cancel"])){
    ?>
    body {
        /* float: right; */
        background: url("https://www.unido.org/sites/default/files/styles/fullwidth_image/public/styles/1_1_crop_widget/public/2017-12/supermarket-2384476.jpg?itok=o4BekLPR") no-repeat center center fixed;
        background-size: 80% 100%;
        background-position: top right;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
    <?php }?>
</style>

<body>
    <?php //$_GET['cancel']="";?>
    
    <input type="hidden" id="cancel-yes" value="<?php if( isset($_GET['cancel']) ){
        echo "yes";   
    }?>">
    <?php //echo $_GET['cancel'];?>
    <input type="hidden" id="person" value="<?php if(isset($_SESSION['name'])){
        echo $_SESSION['name'];
    }else{
        echo 'no';
    }

    
    ?>">
        <div class="full-width">
            <div class="fixed-width clearfix">
                    <div class="menu">
                        <nav>
                            <ul>
                                <li><a id="popular" href="index.php?cancel=yes">熱門文章</a> </li>
                                <li><a href="common.php">常見添加物</a>
                                <li><a href="qualify.php">合格食品業者查詢</a>
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                   
                    <?php
                        if(!isset($_GET["cancel"])){
                    ?>
                        <div id="topic">
                            <h1 class="food_security">食品安全</h1>
                            <div class="topic2">
                                <h1 class="comm">知多</h1>
                                <h1 class="emphasize">少</h1>
                            </div>
                        </div>
                    <?php }?>

                    <?php if(isset($_GET['cancel'])){?>

                            <div id="content">
                                <ul class="article_list">
                                    <li><a href="index.php?cancel=yes">全部</a> </li>
                                    <li><a href="index.php?cancel=popular">熱門</a> </li>
                                    <li><a href="index.php?cancel=latest">最新</a> </li>
                                </ul>
                                <hr>                           
    
                              
                        
                                    <div class="popular">
                                            <?php 
                                                // $row=array();
                                                if($_GET['cancel'] == "yes"){
                                                    $sql = "SELECT food.*,count(thumb_up.post_id) as number_of_thumb_up FROM food left join thumb_up on (food.id = thumb_up.post_id ) GROUP BY food.id";
                                                }else if($_GET['cancel'] == "popular"){
                                                    $sql = "SELECT food.*,count(thumb_up.post_id) as number_of_thumb_up FROM food left join thumb_up on (food.id = thumb_up.post_id ) GROUP BY food.id ORDER BY number_of_thumb_up DESC LIMIT 3;";
                                                }else if($_GET['cancel'] == "latest"){
                                                    $sql = "SELECT food.*,count(thumb_up.post_id) as number_of_thumb_up FROM food left join thumb_up on (food.id = thumb_up.post_id ) GROUP BY food.id ORDER BY date_of_post DESC LIMIT 3;";
                                                }
                                                
                                                if($result = mysqli_query($mysql,$sql)){
                                                    if(mysqli_num_rows($result)<1){
                                                        echo "<div class='alert alert-danger t-center' role='alert'>無相關文章!</div>";
                                                    }else{
                                                        while($row = mysqli_fetch_array($result)){
                                                            $_SESSION['key'] = $row['id'];
                                                            echo "<div class='main'>";
                                                            echo "<div class='title'>",$row['title'],"</div>";
                                                            echo "<div class='date_of_post'>",$row['poster'],"</div>";
                                                            echo "<div class='date_of_post'>",$row['date_of_post'],"</div>";
                                                            echo "<div class='content_less' id='",$row['id'],"less","'><p class='content'>";
                                                            echo (mb_strlen($row['content']) > 30) ? mb_substr($row['content'],0,30,"UTF-8").".......<span id='".$row["id"]."' class='see_more' style='font-size:10px'>查看更多</span><p></div>" : $row["content"] ."</p></div>";
                                                            echo (isset($row["imgpath"]) != NULL)? "<img src='../upload".$row['imgpath']."' class='rounded'>" : "";
                                                            $num = 0;
                                                            if(isset($_SESSION["id"]) && $_SESSION["id"] != null){
                                                                $sql = "SELECT count(user_id) FROM thumb_up WHERE post_id = {$row['id']} AND user_id = {$_SESSION['id']} ;";
                                                                $result = mysqli_query($mysql,$sql);
                                                                $num = mysqli_num_rows($result);
                                                            }
                                                            echo "<div class='thumb ";
                                                            echo ($num>0)? "text-primary": "no"; 
                                                            echo "' id='".$row["id"]."'>讚"," ",$row["number_of_thumb_up"],"</div>";
                                                            echo "</div>";
                                                            echo "<hr class='hr'>";
                                                        }
                                                            
                                                    }
                                                }
                                                
                                            ?>
                                    </div>
                                    
                                
                                    
                                </div>
                                    
                                <div class="login_register">
                                    <ul>
                                        <?php
                                            if(!isset($_SESSION["id"]) || $_SESSION["id"] == null){
                                        ?>
                                            <li><a href="login.php">登入</a> </li>
                                        <?php }?>    
                                        <li><a href="register.php"> 註冊</a></li>
                                    </ul>
                                </div>
                            <?php }?> 
                   

            </div>
        </div>


    

    <footer class="full-width">
        <div class="fixed-width">
            <div class="col-xl-12">
            <?php if(isset($_GET['cancel'])==false){?>
                <div class="menu1">
                    <nav>
                        <ul>
                            <li><a href="login.php">登入</a> </li>
                            <li><a href="register.php">註冊</a></li>
                        </ul>
                    </nav>
                </div>
            <?php }?>
            </div>
        </div>
    </footer>

    
</body>
<script>
    function gogo(id){
        // var less = id+"less";
        // var more = id+"more";
        // var img = id+"img";
        // var comment_on_below = "comment_on_below" + id;
        // var thumb_up_comment = "thumb_up_comment" + id;
        // var response = "response" +id;
        // document.getElementById(less).style.display = "none";
        // document.getElementById(more).style.display = "block";
        // document.getElementById(id).style.width = "100%";
        // document.getElementById(img).style.width = "100%";
  
        
    }
    $(document).ready(function(){
        if($("#cancel-yes").val()=="yes"){
            $("body").css("background","transparent");
            $("#topic").remove();
            $(".main").css("cursor","pointer");
        }

        $("a[name='submit']").click(function(e){
            e.preventDefault();
            var id = $(this).attr("class");
            console.log(id);
            if($("#person").val() != "no"){
                $.ajax({
                    url: '../php/like.php', 
                    type: 'post',
                    data:{
                        person : $("#person").val(),
                        post_id : id,
                        delete_add : $(this).attr("data-id"),
                    },
                    dataType: 'html',
                    }).done(function(data) {
                        console.log(data);
                        if(data=="yes"){
                            // alert("成功,請更新網頁觀看結果!");
                            window.location.reload();
                        }else{
                            alert("失敗");
                        }
                        
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                    //失敗的時候
                        alert("有錯誤產生，請看 console log");
                        console.log(jqXHR.responseText);
                    });
                    
            }else{
                alert("您尚未登入，請登入驗證身分!");
            }

            
            
        })

        //取更多字
        $(".see_more").click(function(){
            let x = $(this);
            $.ajax({
                url:'../php/see_more.php',
                type:'post',
                data:{
                    id:x.attr("id")
                },dataType:'html',
            }).done(function(data){
                x.parents("p.content").text(data);
            })
        })

        //按下讚
        $(".thumb").click(function(){
            if($("#person").val() == "no"){
                alert("請先登入!!! 在按讚!! ");
                window.location.href="login.php";
            }else{
                let x = $(this);
                let b = x.attr("class").includes("text-primary");
                let cnt = x.html().split(" ");
                cnt = parseInt(cnt[1]);
                $.ajax({
                    url:"../php/like.php",
                    type:'post',
                    data:{
                        id:x.attr("id")
                    },dataType:'html',
                }).done(function(data){
                    console.log(data);
                    if(b != true){ //如果還沒按下like的話
                        x.html("讚 " + (cnt+1));
                        x.addClass("text-primary");
                    }else{
                        x.html("讚 " + (cnt-1));
                        x.removeClass("text-primary");
                    }
                })
            }
        })

        // $(".submit").submit(function(e){
        //     e.preventDefault();
        //     var id = $(this).attr("id");
        //     var comment = $(this).prev().val();
        //     if($("#person").val() != "no"){
        //         $.ajax({
        //             url: '../php/comment.php', 
        //             type: 'post',
        //             data:{
        //                 person : $("#person").val(),
        //                 post_id : id,
        //                 comment : comment,
        //             },
        //             dataType: 'html',
        //             }).done(function(data) {
                       
        //             }).fail(function(jqXHR, textStatus, errorThrown) {
        //             //失敗的時候
        //                 alert("有錯誤產生，請看 console log");
        //                 console.log(jqXHR.responseText);
        //             });
        //     }
        // })
        
    })

</script>
</html>