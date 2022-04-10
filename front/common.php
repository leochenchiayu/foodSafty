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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

    <title>常見添加物</title>
</head>
<style>
    .common{
        width:100%;
        height:50px;
    }
    .common hr{
        float:left;
        width:100%;
    }        
    .p{
        float:left;
        width:60%;
        line-height:30px;
    }
    .img{
        padding:20px;
        width:40%;
        float:left;
    }
    .img img{
        width:100%;
    }

</style>
<body>
   
        <div class="full-width">
            <div class="fixed-width clearfix">
                    <div class="menu">
                        <nav>
                            <ul>
                                <li><a id="popular" href="index.php?cancel=yes">熱門文章</a> </li>
                                <li><a href="qualify.php">合格食品業者查詢</a>
                                <li><a href="register.php">註冊</a></li>
                                <li><a href="login.php">登入</a></li>
                                <!-- <li><a href="index.php?cancel=yes">熱門文章</a> -->
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                   
                    

                  

                            <div id="content">
                                <ul class="article_list">
                                    <li>常見添加物</li>
                                    
                                <hr>                           
                                <div class="common">
                                    
                
                                    <div class="p">
                                    <h4>防腐劑</h4>
                                    <p>防腐劑的功能在於防止食品腐爛變質，]
                                            可間接預防食品中毒的發生。適當劑量的防腐劑可以抑制微生物、
                                            細菌的生長，延長保存期限，讓食物更容易儲存久放，但罐頭類食
                                            品依法規定不可添加防腐劑。常見的防腐劑類型有：用於魚肉煉製品
                                            、醬菜、果醬的「己二烯酸（山梨酸）」、「苯甲酸（安息香酸）」
                                            ；用於乾酪、乳酪、奶 油及人造奶油等產品的「去水醋酸類」；香
                                            腸、臘肉中用來預防肉毒桿菌滋生的「硝酸鹽、亞硝酸鹽」。不過，
                                            「長期過量」攝取防腐劑可能會對身體造成傷害，如：腸胃道疾病。</p>
                                
                                        
                                    </div>

                                    <div class="img">
                                        <img src="data:image/jpeg;base64,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" alt="">
                                    </div>
                                    <hr>
                                </div>
                                <div class="common">
                                    
                                    <div class="img">
                                        <img class="lazy" data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_xxkzcuV9CIjPHza2cJHhvHZHXr2M_rAGrQ&usqp=CAU" alt="">
                                    </div>
                
                                    <div class="p">
                                        <h4>抗氧化劑</h4>
                                        <p>食品在存放或加工過程中，容易被氧化而造成變質，例如油脂，一旦氧化就會變質出現臭油味，因此抗氧化劑是用於阻止氧化，與防腐劑目的不同。抗氧化劑可分為天然或化學合成，「維生素E（生育醇）」及「維生素 C（L–抗壞血酸）」就是常見的天然抗氧化劑，多存在於蔬果中。化學抗氧化劑包含「二丁基羥基甲苯（BHT）」、「丁基羥基甲氧苯（BHA）」，主要用來避免食物中的油脂氧化酸敗，常見於洋芋片、植物油、香腸、穀片或餅乾、泡麵等。有些研究顯示抗氧化劑可能具有致癌性，對人體健康有疑慮，但目前仍是眾說紛紜。</p>
                                    </div>

                                    <hr>
                                </div>
                                
                                <div class="common">
                                    
                                    
                                    <div class="p">
                                        <h4>著色劑</h4>
                                        <p>色彩繽紛的玉米圈。

著色劑就是一般俗稱的「色素」，可以讓食物變得鮮豔，改善加工過程中食物褪色的狀況，讓食品更鮮豔可口，但著色劑不可添加於生鮮蔬果或魚蝦貝類、肉類、豆類、海 苔、醬油等食品中。著色劑的來源可分為天然或化學，天然的例如：「類胡蘿蔔素、葉綠素、薑黃、胭脂紅」等。化學合成人工合成色素多以煤焦油或石油為主要原料，包含：「紅色 6、7、40 號」及「黃色 4、5 號」及「綠色 3 號」及「藍色 1、2 號」。常添加著色劑的食品像是人造奶油、果凍、甜點和飲料等，但有研究指出，食用黃色 4 號可能與氣喘、過敏及幼童過動有關，但相關性仍有待更多研究證實。</p>
                                    </div>
                                    
                                    <div class="img">
                                        <img class="lazy" data-src="https://www.superlab.com.tw/wp-content/uploads/2017/05/9560826_xxl-%E5%86%B0%E6%A3%92.png" alt="">
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="common">
                                    
                                    
                                    
                                    
                                    <div class="img">
                                        <img class="lazy" data-src="https://img.soundofhope.org/2018/01/3a36a1fd27a30dfb3ee70bf69625e5dbf53c89955311d22727pimgpsh-fullsize-distr.jpg" alt="">
                                    </div>
                                    <div class="p">
                                        <h4>調味劑</h4>
                                        <p>
                                        調味劑是日常生活中常見且必備的添加物，像是味精等，用來增加或調整食物的味道。其中又可分為鮮味劑、酸味劑等不同種類。鮮味劑例如俗稱的「味精（麩胺酸鈉）」，可以增強食品的鮮味，讓口味更好吃。酸味劑則可增添食物中的酸味，產生清爽的口感，並具有抑制微生物生長的作用，像是「檸檬酸」、「醋酸」等，常被使用於飲料、果汁、御飯糰等食物。不過，如果是高血壓、心臟病、腎臟等疾病的限鈉患者，應遵從醫師指示減少食鹽與味精的攝取，避免食用過量的鈉。
                                        </p>
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="common">
                                    
                                    
                                <div class="p">
                                        <h4>膨脹劑</h4>
                                        <p>
                                        膨脹劑可以增加食物的空隙，讓食物蓬鬆柔軟、酥脆。常用在包子、麵包、蛋糕等食物上。常見的膨脹劑主要可分為兩大類，生物膨脹劑和化學膨脹劑。生物膨脹劑依靠能產生二氧化碳的微生物發酵而是麵團膨脹，主成分是酵母。而化學膨脹劑則屬食品添加物，可分為兩類，鹼性膨脹劑和複合膨脹劑。鹼性膨脹劑如「碳酸氫鈉」、「碳酸氫銨」、「碳酸鈉」等。複合膨脹劑主要由碳酸鹽、酸性鹽、澱粉和脂肪酸等組成。膨脹劑中多含有硫酸鋁鉀、硫酸鋁鈉成分，若長期過量使用可能會導致鋁含量超標。
                                    </p>
                                    </div>
                                    
                                    <div class="img">
                                        <img class="lazy" data-src="data:image/jpeg;base64,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" alt="">
                                    </div>
                                    
                                    <hr>
                                </div>
                                
                        
                                  
                                    
                                <div class="login_register">
                                    <ul>
                                        <li><a href="login.php">登入</a> </li>
                                        <li><a href="register.php"> 註冊</a></li>
                                    </ul>
                                </div>
                           
                   

            </div>
        </div>



    
</body>
<script>
    $(document).ready(function(){
        $("body").css("background","transparent");

        $('.lazy').Lazy();
    })
</script>
</html>