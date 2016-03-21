<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 21/03/16
 * Time: 22:38
 */

$bdd = new mysqli("localhost","root","root","blog");

$query = $bdd -> query("SELECT * FROM post");

//$results = $query -> fetch_all();
//var_dump($results);


while($result = $query -> fetch_object()) {
//    var_dump($result);
    echo "<br>";
    echo "message posté le ".$result -> date_post." : ".$result -> sujet;
}

$sql_insert = "INSERT INTO post (id_auteur,sujet,message,date_post) VALUES (1,'sujet','message',NOW())";
$query = $bdd -> query($sql_insert);

if(!$query) {
    echo "<br>erreur : ".$bdd -> error;
} else {
    echo "<br>ok, ligne insérée : ".$bdd -> insert_id;
}