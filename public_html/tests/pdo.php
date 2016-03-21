<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 21/03/16
 * Time: 22:41
 */

$pdo = new PDO("mysql:dbname=blog;host=localhost","root","root");

// simple requete
$statement = $pdo -> query('SELECT * FROM post WHERE id_post=2',PDO::FETCH_ASSOC);
$result = $statement -> fetch();
echo "<br>date du post 2 : ".$result["date_post"];
var_dump($result);
exit;


















echo "<br><br>";
// requete préparée
$statement = $pdo -> prepare('SELECT * FROM post WHERE id_post=?');
$statement -> setFetchMode(PDO::FETCH_CLASS,"StdClass");

// 1ere exécution
$statement -> execute(array(2));
$result = $statement -> fetch();
echo "<br>date du post 1 : ".$result -> date_post;
// 2eme execution
$result = $statement -> execute(array(1));
$result = $statement -> fetch();
echo "<br>date du post 2 : ".$result -> date_post;


exit;











// insertion avec paramètres nommés
$sql_insert = "INSERT INTO post (id_auteur,sujet,message,date_post) VALUES (:id_auteur,:sujet,:message,NOW())";
$statement = $pdo -> prepare($sql_insert);

$statement -> bindParam(":id_auteur",1,PDO::PARAM_INT);
$statement -> bindParam(":sujet","sujet",PDO::PARAM_STR);
$statement -> bindParam(":message",1,PDO::PARAM_STR);

$result = $statement -> execute(array(
    "id_auteur" => 1,
    "sujet" => "sujet ".rand(0,100),
    "message" => "message qui va bien"
));
var_dump($result);
if(!$result) {
    echo "<br>erreur : ".$statement -> errorCode().var_export($statement -> errorInfo(),true);
} else {
    echo "<br>ok, ligne insérée : ".$pdo -> lastInsertId();
}

