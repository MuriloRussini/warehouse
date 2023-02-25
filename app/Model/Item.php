<?php
namespace App\Model;
use App\Core\DBConnection;
use PDO;


class Item{
  protected $pdo;



  public function __construct(){
    $this->pdo = DBConnection::start([
      'driver' => 'mysql',
      'host' => '127.0.0.1',
      'dbname' => 'warehouse',
      'username' => 'root',
      'password' => '',
      'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
    ]);
  }


  public function insert($data){
    $statement = $this->pdo->prepare("INSERT INTO Items (sku, title, quantity, company, location, created_at, updated_at) VALUES (:sku, :title, :quantity, :company, :location, now(), now()) ");
    
    return $statement->execute($data);
  }

}