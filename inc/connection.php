<?php
  //local database connection string
  $dsn        = 'mysql:host=localhost;port=8080;dbname=sseebart_recipes';
  $username   = 'sseebart';
  $pass       = 'nas4cas1';
  $options    = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

  try {
    $db = new PDO($dsn, $username, $pass, $options);
    $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    echo "Unable to connect to database\n";
    echo $e -> getMessage();
    exit;
  }
?>
