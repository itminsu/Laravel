<?php
$radius = empty($_POST["radius"]) ? 0 : $_POST["radius"];
$width = empty($_POST["width"]) ? 0 : $_POST["width"];
$length = empty($_POST["length"]) ? 0 : $_POST["length"];
$base = empty($_POST["base"]) ? 0 : $_POST["base"];
$height = empty($_POST["height"]) ? 0 : $_POST["height"];
$percentage = empty($_POST["percent"]) ? 0 : $_POST["percent"];
$mode = empty($_POST["mode"]) ? 0: $_POST["mode"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Calculate Area</title>
        <script>
            function clickGrow() {
                document.getElementById("mode").value = "grow";
                var percent = document.getElementById("percent").value;
                if(percent == '' || percent == 0) {
                    alert("Enter resizable percentage");
                }else {
                    document.forms.calForm.submit();
                }
            }

            function clickShrink() {
                document.getElementById("mode").value = "shrink";
                var percent = document.getElementById("percent").value;
                if(percent == '' || percent == 0) {
                    alert("Enter resizable percentage");
                }else {
                    document.forms.calForm.submit();
                }
            }
        </script>
    </head>
    <body>
        <form action="index.php" id="calForm" method="post">
            Percentage: <input type="text" id="percent" name="percent" value="<?php echo $percentage ?>"/>%
            <input type="button" id="grow" name="grow" value="Grow" onclick="clickGrow();"/>
            <input type="button" id="shrink" name="shrink" value="Shrink" onclick="clickShrink();"/>
            <input type="hidden" id="mode" name="mode" />
            <fieldset>
                <legend>Circle</legend>
                Radius: <input type="text" id="radius" name="radius" value="<?php echo $radius ?>" />
            </fieldset>
            <fieldset>
                <legend>Rectangle</legend>
                Length: <input type="text" id="length" name="length" value="<?php echo $length ?>" />
                Width: <input type="text" id="width" name="width" value="<?php echo $width ?>" />
            </fieldset>
            <fieldset>
                <legend>Triangle</legend>
                Base: <input type="text" id="base" name="base" value="<?php echo $base ?>" />
                Height: <input type="text" id="height" name="height" value="<?php echo $height ?>"/ >
            </fieldset>
            <input type="submit" id="btnCal" name="btnCal" value="Calculate" />

        </form>


        <p>Result:</p>
        <?php
        include_once("Circle.php");
        if(!empty($radius)) {
            $circle = new Circle("Circle",$radius);
            echo "<h3>Shape: " . $circle->getShape_name() . "</h3>";
            echo "<h5>" . $circle->calculateArea() . "</h5>";

            if(!empty($mode) && !empty($percentage)) {
                echo "<h6>" . $circle->resize($mode, $percentage) . "</h6>";
            }

        }

        include_once("Rectangle.php");
        if(!empty($length) && !empty($width)){
            $rectangle = new Rectangle("Rectangle", $length, $width);
            echo "<h3>Shape: " . $rectangle->getShape_name() . "</h3>";
            echo "<h5>" . $rectangle->calculateArea() . "</h5>";
        }

        include_once("Triangle.php");
        if(!empty($base) && !empty($height)){
            $triangle = new Triangle("Triangle", $base, $height);
            echo "<h3>Shape: " . $triangle->getShape_name() . "</h3>";
            echo "<h5>" . $triangle->calculateArea() . "</h5>";

            if(!empty($mode) && !empty($percentage)) {
                echo "<h6>" . $triangle->resize($mode, $percentage) . "</h6>";
            }
        }
        ?>
    </body>
</html>