<?php
$provinces = array("Newfoundland",
                   "Nova Scotia",
                   "PEI",
                   "Quebec")

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fun with arrays</title>
    </head>
    <body>
        <section>
            <article>
                <pre>
                <?php
                    print_r($provinces);
                ?>
                </pre>
            </article>
            <article>
                <?php
                    $provinces[] = "Ontario";

                    for($counter = 0; $counter < count($provinces); $counter++)
                    {
                        echo $provinces[$counter] . "</br>";
                    }
                ?>
            </article>
                <hr/>
            <article>
                <?php
                    foreach($provinces as $province)
                    {
                        echo $province . "</br>";
                    }
                ?>
            </article>
                <hr/>
            <article>
                <?php
                foreach($provinces as $provindex => $proname)
                {
                    echo "The province at index $provindex is $proname </br>";

                    // echo $province . "</br>";
                }
                ?>
            </article>
            <article>
                <?php
                    // echo phpinfo();
                    //echo ini_get("memory_limit");
                ?>
            </article>
        </section>
    </body>
</html>