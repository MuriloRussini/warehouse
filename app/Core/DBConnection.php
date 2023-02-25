<?php

namespace App\Core;
use PDO;

class DBConnection {
  public static function start($config){
    try {
     return new PDO(
      $config['driver'].':host='.$config['host'].';dbname='.$config['dbname'],
      $config['username'],
      $config['password'],
      $config['options']
     );
    } catch (\PDOException $e) {
      dd($e->getMessage());
    }
  }
}

?>
