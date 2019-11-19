<?php
    $uploadSuccessed = false;

    if($_FILES["upload"]["error"] == UPLOAD_ERR_OK){
        $temp_name = $_FILES["upload"]["tmp_name"];
        $file_name = $_FILES["upload"]["name"];
        $file_size = $_FILES["upload"]["size"];
        $file_type = $_FILES["upload"]["type"];

        $save_name =  iconv("utf-8","cp949",$file_name);

        if(move_uploaded_file($temp_name,"files/$save_name"))
            $uploadSuccessed = true;
    }

    if($uploadSuccessed){
        echo "업로드 성공<br>";
        echo "파일이름 :  $file_name <br>";
        echo "파일크기 : ".number_format($file_size)."bytes<br>" ;
        echo "파일타입 :  $file_type <br>";
    }else{
        echo "업로드 실패";
    }
?>

