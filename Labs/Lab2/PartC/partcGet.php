<!DOCTYPE html>
<html>
    <head>
        <title>Process Page for Get</title>
    </head>
    <body>
    <h1>
        <?php
            $month = $_GET["birthMonth"];
            $day = $_GET["birthDay"];

            if($day < 10 ) {
                $day = "0".$day;
            }

            $sum =  $month.$day;
            $zodiacSign;

            if( $sum < 120 )
                $zodiacSign = "Capricorn";
            elseif( $sum >= 120 && $sum < 219 )
                $zodiacSign = "Aquarius";
            elseif( $sum >= 219 && $sum < 321 )
                $zodiacSign = "Pisces";
            elseif( $sum >= 321 && $sum < 420 )
                $zodiacSign = "Aries";
            elseif( $sum >= 420 && $sum < 521 )
                $zodiacSign = "Taurus";
            elseif( $sum >= 521 && $sum < 621 )
                $zodiacSign = "Gemini";
            elseif( $sum >= 621 && $sum < 723 )
                $zodiacSign = "Cancer";
            elseif( $sum >= 723 && $sum < 823 )
                $zodiacSign = "Leo";
            elseif( $sum >= 823 && $sum < 923 )
                $zodiacSign = "Virgo";
            elseif( $sum >= 923 && $sum < 1023 )
                $zodiacSign = "Libra";
            elseif( $sum >= 1023 && $sum < 1122 )
                $zodiacSign = "Scorpio";
            elseif( $sum >= 1122 && $sum < 1222 )
                $zodiacSign = "Sagittarius";
            elseif( $sum >= 1222 && $sum <= 1231)
                $zodiacSign = "Capricorn";

            echo "Hello, " . $_GET['firstName'] . " " . $_GET['lastName'] . "<br/><br/>";
            echo "Your zodiac sign is: " . $zodiacSign;
        ?>
    </h1>
    </body>
</html>