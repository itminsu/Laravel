<!DOCTYPE html>
<html>
    <head>
        <title>File Upload</title>
    </head>
    <body>
        <?php
            $filePath = "/home/inet2005/PhpstormProjects/Lee-Minsu-w0293156/Labs/Lab2/uploads/";
            $fileTmpName = $_FILES["upFile"]["tmp_name"];
            $fileOrgName= $_FILES["upFile"]["name"];
            $fileSize = $_FILES["upFile"]["size"];
            $fileUploadError = $_FILES["upFile"]["error"];
            $result = move_uploaded_file($fileTmpName, $filePath.$fileOrgName);


            echo "<p>Tmp: ". $fileTmpName . "</p>";
            echo "<p>Orig: ". $fileOrgName . "</p>";
            echo "<p>Size: ". $fileSize . "</p>";
            echo "<p>Error: ". $fileUploadError . "</p>";

            if($result) {
                echo "<h1>File is stored successfully!!!</h1>";
            }else{
                echo "<h1>Fail</h1>";
            }
        ?>
    </body>
</html>