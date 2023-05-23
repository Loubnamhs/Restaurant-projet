<?php 
use App\Connection;
use App\Authentication;
use App\Table\ImageTable;

Authentication::check();

dd($_POST);
if(!empty($_POST)){
    dd($_POST);
}
//$sql = "DELETE FROM articles WHERE ArticleId=?";
//$stmt= $pdo->prepare($sql);
//$stmt->execute([$id]);
//header('Location: ' .$router->generate('admin_image') . '?delete=1');

?>