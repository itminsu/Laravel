<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
		<title>Kilo Pound Converter</title>
	</head>
	<body>
		<h1>Results:</h1>
			<?php
				$poundsResult = 0;
				$kilosResult = 0;

				if (isset($_POST['ConverttoPounds'])) //(true)
				{
					$kilosResult = $_POST['kilos'];
					//$kilosResult = 32;
					$poundsResult = $kilosResult * 2.2;

					echo "<p>";
					echo "$kilosResult kilos equals $poundsResult pounds.";
					echo "</p>"; //fixed concentration operator and variable name (poundResult => pound's'Result
				}
				elseif (isset($_POST['ConverttoKilos'])) // delete ! because to work when variable is set
				{
					$poundsResult = $_POST['pounds']; // fixed variable name pound to pounds

					$kilosResult = $poundsResult / 2.2;

					echo "<p>";
					echo "$poundsResult pounds equals $kilosResult kilos.";
					echo "</p>"; //fixed concentration operator
				}
				else
				{
					echo "<p>Nothing to do.</p>";
				}
			?>
			<p><a href="KiloPoundForm.html">Go back.</a></p>
	</body>
</html>