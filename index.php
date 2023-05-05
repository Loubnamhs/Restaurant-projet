<?php
try
{
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=restaurant;charset=utf8',
    'restaurant',
    'ax8r9dhacham123'

);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>

<head>

<title>Restaurant</title>

</head>



<body>
<h1> Restaurant P </h1>



</body>
