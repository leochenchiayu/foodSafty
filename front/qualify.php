
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
    <link rel="stylesheet" type="text/css" href="../css/qualify.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>合格廠商</title>
</head>
<style>
    
</style>
<body>
    <header class="full-width">
        <div class="fixed-width clearfix">
            <nav>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">首頁</a></li>
                        <li><a href="common.php">常見添加物</a> </li>
                        <li><a href="login.php">登入</a></li>
                        <li><a href="register.php">註冊</a></li>
                    </ul>
                </div>
            </nav>
            <div class="bg-success search clearfix">
                <h1 class="t-center">查詢合格食品廠商</h1>
            </div>
        </div>
    </header>

    <div class="full-width clearfix query_word">
        <div class="fixed-width">
            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">查詢合格食品廠商</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="query" action="">
                        <div class="form-row">
                          <div class="col">
                            <input type="text" class="form-control" id="city" placeholder="請輸入地區(縣市或鄉鎮)查詢">
                            <button class="btn btn-primary" type="submit">送出查詢</button>
                          </div>
                        </div>
                      </form>
                      <div class="result">
                        <div class="col-lg-12 col-12">
                            <h4></h4>
                            <br>
                            <div></div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    
    
</body>
    <script>
        


        $(document).ready(function(){

            $(".search h1").click(function(){
                $(".query_word").css("display","block");
            })
            $(".query").submit(function(e){
                e.preventDefault();
                let data = $("#city").val();
                $(".result>div>div").html("<h5 class='t-center'>搜尋中....</h5>");
                $(".result>div>h4").text("您選擇的地區為:" + data);
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "../php/qualify.php",
                    "data": { data:JSON.stringify(data) }
                }
                $.get(settings).done(function(response){
                    $(".result>div>div").html(response);
                    if(response==""){
                        $(".result>div>div").html("<h5 class='t-center'>無資料!!</h5>");
                    }
                }).fail(function(data){
                    console.log(data);
                })
            })


            $(".close").click(function(){
                $(".query_word").css("display","none");
            });
            
            $("#close").click(function(){
                $(".query_word").css("display","none");
            })
        })
    </script>
</html>
