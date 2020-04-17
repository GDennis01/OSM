<?php
/*
*** ins_casa.php
*** Richiamato da gest_casa.php
*** attiva insert_casa.php
*** 15/3/2020: A.Carlone
*** 25/02/2020  Ferraiuolo:  Modifica:rimosso selezione capofamiglia
*/
$config_path = __DIR__;
$util = $config_path .'/../util.php';
require $util;
$util2 = $config_path .'/../db/db_conn.php';
require_once $util2;
setup();
isLogged("utente");
?>
<?php stampaIntestazione(); ?>
<body>
<?php stampaNavbar(); ?>
<?php
echo "<h3>INSERISCI NUOVA CASA</h3>";
?>
<form action="insert_casa.php" method="POST"><br>
Inserire i dati della casa :<br>
nome casa:&nbsp;&nbsp;<input type="text" name="nome"> <br>
<?php
echo 'moranca:&nbsp;';
$result = $conn->query("SELECT id, nome  FROM morance ");
$nr=$result->num_rows;
echo '<select name="add_moranca">';
echo "<option value=' '></option><br>";
for($i=0;$i<$nr;$i++)
  {
    $row=$result->fetch_array();
	echo $row['id']. " ".  $row['nome'];
    if($row["nome"]!=null || $row["nome"]!="")
     {
		$myMor = utf8_encode ($row['nome']) ;
        echo "<option value='".$row['id']."'>".$myMor."</option>";
     }
   }
echo "</select><br>";
$result -> free_result();

echo "<br>";
echo "id OSM: <input type='text' name='id_osm' ><br>";
?>
<input type="submit" value="Inserisci">
</form>      
<br>
</body>
</html>