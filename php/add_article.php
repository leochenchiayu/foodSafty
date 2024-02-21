<?php

    require_once '../php/db.php';
    $id = $_SESSION["id"];
    $content = $_POST["content"];
    $title = $_POST["title"];
    // echo $_FILES["file"]["name"];
    if(isset($_FILES["file"]["name"])){
        $filename = $_FILES["file"]["name"];
        if(!is_dir("../upload/".$_SESSION['id'])){
            mkdir("../upload/".$_SESSION['id']);
        }

        if(file_exists($filename)){
            $i=0;
            while(true){
                $i++;
                if(!file_exists($filename,$i)){
                    $filename = "$filename.$i";
                    break;
                }
            }
        }

        $location = "../upload/".$_SESSION['id']."/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
    
        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png");
    
        $response = 0;
        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                $response = $location;
                echo $response;
            }
        }

        $sql = "INSERT INTO food (title,content,poster,imgpath) VALUES ( '$title','$content',$id,'/$id/$filename')";
        $query = mysqli_query($mysql, $sql);
    }else{
        $sql = "INSERT INTO food (title,content,poster) VALUES ( '$title','$content',$id)";
        $query = mysqli_query($mysql, $sql);
    }

?>
