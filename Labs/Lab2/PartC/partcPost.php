<!DOCTYPE html>
<html>
<head>
    <title>Process Page for Post</title>
</head>
<body>
<h1>
    <?php
        $feet = $_POST['heightFeet'];
        $inches =  $_POST['heightInches'];
        $metres = round((( $feet * 12 ) + $inches ) * 0.0254, 2) ;
        echo "Your first name is: " . $_POST['firstName'] . "<br/><br/>";
        echo "Your last name is: " . $_POST['lastName'] . "<br/><br/>";
        echo "Your height in metres is: " . $metres;
    ?>
</h1>
</body>
</html>