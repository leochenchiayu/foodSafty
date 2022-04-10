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
    <link rel="stylesheet" type="text/css" href="../css/common.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>熱門文章</title>
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
                        <li><a href="compare.php">製作比較</a></li>
                        <li><a href="login.php">登入</a></li>
                        <li><a href="register.php">註冊</a></li>
                    </ul>
                </div>
            </nav>
                <h1 class="t-right"><span class="c1"></span>熱門文章</h1>
        </div>
    </header>
    <div class="full-width" id="product">   
        <div class="fixed-width clearfix">
            <div class="col-xl-12 col-12">
                <h2 class="t-center">熱門文章</h2>
            </div>
            <div class="col-lg-4 t-center">
                <img src="https://www.rt-mart.com.tw/website/uploads_product/website_7/P0000700934630_1_1611020.jpg" alt="">
                <a href="#" class="modal-btn" data-modal="modal">XXXXXXXXXx</a>
                <a name="common.php#1"></a>
            </div>
            <div class="col-lg-4 t-center">
                <img src="https://www.rt-mart.com.tw/website/uploads_product/website_7/P0000700934630_1_1611020.jpg" alt="">
                <a href="#" class="modal-btn" data-modal="modal2">XXXXXXXXXx</a>
                <a name="common.php#2"></a>
            </div>
            <div class="col-lg-4 t-center">
                <img src="https://www.rt-mart.com.tw/website/uploads_product/website_7/P0000700934630_1_1611020.jpg" alt="">
                <a href="#" class="modal-btn" data-modal="modal2">XXXXXXXXXx</a>
                <a name="common.php#3"></a>
            </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="wrapper">
            <h2>TITLE</h2>
            <p>
                晚上基礎上自主我有首次不管網咖太多考慮貼布一座事情業主引擎，用品好友不多基礎上，走到不能下載我想什麼樣確定，研究生辛苦友情連結藝術一名，外掛老婆污染沒有什麼，垃圾相信不了批准上來，情。
            </p>
            <a href="#" class="close" data-modal="no1">CLOSE</a>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="modal" id="modal2">
        <div class="wrapper">
            <h2>TITLE</h2>
            <p>
                圖片登記無數不大就像卻是她是交通難道，晚上基礎上自主我有首次不管網咖太多考慮貼布一座事情業主引擎，用品好友不多基礎上，走到不能下載我想什麼樣確定，研究生辛苦友情連結藝術一名，外掛老婆污染沒有什麼，垃圾相信不了批准上來，情。
            </p>
            <a href="#" class="close" data-modal="no2">CLOSE</a>
        </div>
        <div class="overlay"></div>
    </div>
</body>
    <script>
        // $('a.modal_btn').click(function(e)
        // {
        //     e.preventDefault();
        // });
        document.onclick = function(data){
            let target = data.target.dataset.modal;
            if(target.indexOf("modal") >= 0 || target.indexOf("no") >= 0 ){
                data.preventDefault();
            }
            console.log(target)
            let modal = document.getElementById(target);//給他定義一個變數
            if(data.target.className === 'modal-btn'){
                //document.getElementById('modal').style.display = 'block';
                
                modal.style.display = 'inline-block';
            }

            //if(data.target.className === 'close' || data.target.className === 'overlay'/*點外面也可以刪除*/){
                //document.getElementById('modal').style.display = 'none';
              //  modal.style.display = 'none';
                //data.target.parentElement.parentElement.style.display = 'none';
            
           // }
             let closes = document.querySelectorAll('.close');
             closes.forEach(function(close){
                close.onclick = function(e){
                    console.log(e);
                    e.target.parentElement.parentElement.style.display = 'none';
                }
             })
             
        }
    </script>
</html>