--TEST--
Drupal V7 Node Edit
--FILE--
<?php 
date_default_timezone_set('America/New_York');

require("testdb.inc");
global $db;  
open_db();

try {  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql0 = 'DROP TABLE "simpletest919392node" CASCADE IF EXISTS';
  $db->query($sql0);

  $sql0 = 'DROP TABLE "simpletest919392node_revision" CASCADE IF EXISTS';
  $db->query($sql0);

  $sql1 = 'CREATE TABLE "simpletest919392node" (
	"nid" INT GENERATED BY DEFAULT AS IDENTITY,
	"vid" INT NULL DEFAULT NULL,
	"type" VARCHAR(32) NOT NULL DEFAULT \'\',
	"language" VARCHAR(12) NOT NULL DEFAULT \'\',
	"title" VARCHAR(255) NOT NULL DEFAULT \'\',
	"uid" INT NOT NULL DEFAULT 0,
	"status" INT NOT NULL DEFAULT 1,
	"created" INT NOT NULL DEFAULT 0,
	"changed" INT NOT NULL DEFAULT 0,
	"comment" INT NOT NULL DEFAULT 0,
	"promote" INT NOT NULL DEFAULT 0,
	"sticky" INT NOT NULL DEFAULT 0,
	"tnid" INT NOT NULL DEFAULT 0,
	"translate" INT NOT NULL DEFAULT 0,
	PRIMARY KEY (nid),
	CONSTRAINT simpletest919392node_vid_key UNIQUE (vid)
)';
  $db->query($sql1);

  $sql2 = 'CREATE TABLE "simpletest919392node_revision" (
	"nid" INT NOT NULL DEFAULT 0,
	"vid" INT GENERATED BY DEFAULT AS IDENTITY,
	"uid" INT NOT NULL DEFAULT 0,
	"title" VARCHAR(255) NOT NULL DEFAULT \'\',
	"log" TEXT NOT NULL,
	"timestamp" INT NOT NULL DEFAULT 0,
	"status" INT NOT NULL DEFAULT 1,
	"comment" INT NOT NULL DEFAULT 0,
	"promote" INT NOT NULL DEFAULT 0,
	"sticky" INT NOT NULL DEFAULT 0,
	PRIMARY KEY (vid)
)';

  $db->query($sql2);

  $sql3 = 'INSERT INTO simpletest919392node ("nid", "vid", "type", "language", "title", "uid", "status", "created", "changed", "comment", "promote", "sticky") VALUES (1, :nuopdo1, :nuopdo2, :nuopdo3, :nuopdo4, :nuopdo5, :nuopdo6, :nuopdo7, :nuopdo8, :nuopdo9, :nuopdo10, :nuopdo11)';
  $stmt3 = $db->prepare($sql3);
  $db_insert_placeholder_0 = "1";
  $db_insert_placeholder_1 = "page";
  $db_insert_placeholder_2 = "und";
  $db_insert_placeholder_3 = "h1ASzwAF";
  $db_insert_placeholder_4 = "3";
  $db_insert_placeholder_5 = "1";
  $db_insert_placeholder_6 = "1383142553";
  $db_insert_placeholder_7 = "1383142553";
  $db_insert_placeholder_8 = "1";
  $db_insert_placeholder_9 = "0";
  $db_insert_placeholder_10 = "0";
  $stmt3->bindParam(':nuopdo1', $db_insert_placeholder_0, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo2', $db_insert_placeholder_1, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo3', $db_insert_placeholder_2, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo4', $db_insert_placeholder_3, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo5', $db_insert_placeholder_4, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo6', $db_insert_placeholder_5, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo7', $db_insert_placeholder_6, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo8', $db_insert_placeholder_7, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo9', $db_insert_placeholder_8, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo10', $db_insert_placeholder_9, PDO::PARAM_STR);
  $stmt3->bindParam(':nuopdo11', $db_insert_placeholder_10, PDO::PARAM_STR);
  $stmt3->execute();


  $sql4 = 'INSERT INTO simpletest919392node_revision ("nid", "vid", "uid", "title", "log", "timestamp", "status", "comment", "promote", "sticky") VALUES (:nuopdo1, 1, :nuopdo2, :nuopdo3, :nuopdo4, :nuopdo5, :nuopdo6, :nuopdo7, :nuopdo8, :nuopdo9)';
  $stmt4 = $db->prepare($sql4);

  $db_insert_placeholder_0 = "1";
  $db_insert_placeholder_1 = "3";
  $db_insert_placeholder_2 = "h1ASzwAF";
  $db_insert_placeholder_3 = "";
  $db_insert_placeholder_4 = "1383142553";
  $db_insert_placeholder_5 = "1";
  $db_insert_placeholder_6 = "1";
  $db_insert_placeholder_7 = "0";
  $db_insert_placeholder_8 = "0";

  $stmt4->bindParam(':nuopdo1', $db_insert_placeholder_0, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo2', $db_insert_placeholder_1, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo3', $db_insert_placeholder_2, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo4', $db_insert_placeholder_3, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo5', $db_insert_placeholder_4, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo6', $db_insert_placeholder_5, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo7', $db_insert_placeholder_6, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo8', $db_insert_placeholder_7, PDO::PARAM_STR);
  $stmt4->bindParam(':nuopdo9', $db_insert_placeholder_8, PDO::PARAM_STR);
  $stmt4->execute();


  $sql5 = 'SELECT revision.vid AS vid, base.uid AS uid, revision.title AS title, revision.log AS log, revision.status AS status, revision.comment AS comment, revision.promote AS promote, revision.sticky AS sticky, base.nid AS nid, base.type AS type, base.language AS language, base.created AS created, base.changed AS changed, base.tnid AS tnid, base.translate AS translate, revision.timestamp AS revision_timestamp, revision.uid AS revision_uid FROM  simpletest919392node base INNER JOIN simpletest919392node_revision revision ON revision.vid = base.vid  WHERE  (base.nid IN ( :nuopdo1 ))';
  $stmt5 = $db->prepare($sql5);

  $db_insert_placeholder_0 = "1";
  $stmt5->bindParam(':nuopdo1', $db_insert_placeholder_0, PDO::PARAM_STR);
  $stmt5->execute();
  $result = $stmt5->fetchAll(PDO::FETCH_ASSOC);
  var_dump($result);


  $db = NULL;
} catch(PDOException $e) {  
  echo $e->getMessage();  
}
$db = NULL;  
echo "\ndone\n";
?>
--EXPECT--
array(1) {
  [0]=>
  array(17) {
    ["VID"]=>
    int(1)
    ["UID"]=>
    int(3)
    ["TITLE"]=>
    string(8) "h1ASzwAF"
    ["LOG"]=>
    NULL
    ["STATUS"]=>
    int(1)
    ["COMMENT"]=>
    int(1)
    ["PROMOTE"]=>
    int(0)
    ["STICKY"]=>
    int(0)
    ["NID"]=>
    int(1)
    ["TYPE"]=>
    string(4) "page"
    ["LANGUAGE"]=>
    string(3) "und"
    ["CREATED"]=>
    int(1383142553)
    ["CHANGED"]=>
    int(1383142553)
    ["TNID"]=>
    int(0)
    ["TRANSLATE"]=>
    int(0)
    ["REVISION_TIMESTAMP"]=>
    int(1383142553)
    ["REVISION_UID"]=>
    int(3)
  }
}

done