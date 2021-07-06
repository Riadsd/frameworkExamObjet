<?php 

namespace Model;

use PDO ;

abstract class Model 
{

    protected $pdo;
    protected $table;
  

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }


/**
 * Trouver un garage par son id
 * Renvoie un tableau contenant un garage , ou un booleen
 * si inexistant
 * 
 * @param integer $id
 * @return array|bool
 * 
 */

public function find(int $id, string $className, ? string $table = null)
{

  $sql = "SELECT * FROM {$this->table} WHERE id =:id";

    if(!empty($table)){

        $sql = "SELECT * FROM $table WHERE id =:id";

    }

    $maRequete = $this->pdo->prepare($sql);

    $maRequete->execute(['id' => $id]);

    $item =  $maRequete->fetchObject($className);

    return $item;

}

/**
 * Retourne un tableau contenant tous les garages de la tables garages 
 * 
 * @return array
 */

 public function findAll(string $className) : array 
 {

  

    $resultat = $this->pdo->query("SELECT * FROM {$this->table}");

    $items = $resultat->fetchAll( PDO::FETCH_CLASS, $className);

    return $items;


 }

 /**
 * supprime un garage via son ID
 * @param integer $id
 * @return void
 */
public function delete(int $id) :void
{
  

  $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);


}


}