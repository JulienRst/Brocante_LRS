<?
// Le chargement du header XHTML peut aussi être dans une classe vue en php.
require_once ROOT."\site_v6\inc\main\connexionbdd.inc.php";
/*
  mysql_connect("localhost", "info3000", "MonMotDePasse");
  mysql_select_db("info3000");*/
  mysql_query("INSERT INTO  utilisateur VALUES($login,$tel,$mail);");
  mysql_close();
?>