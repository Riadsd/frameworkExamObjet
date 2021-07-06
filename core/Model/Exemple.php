<?php

namespace Model;

class Exemple extends Model
{

    protected $table = "exemples";

    public $id , $proriete1, $propriete2, $user_id;


 

    
    /**
     * crée un nouvel exemple
     * 
     * @param string $propriete1
     * @param string $propriete2
     * @return void
     */

    public function insert(string $proriete1, string $propriete2):void
    {

        $maRequete = $this->pdo->prepare("INSERT INTO exemples (propriete1, propriete2) 
        VALUES (:propriete1, :propriete2)");

          $maRequete->execute([
          'propriete1' => $propriete1,
          'propriete2' => $propriete2
       

          ]);



    }
    /**
     * 
     * modifie un exemple
     */
    public function update(string $propriete1, string $propriete2, int $id) : void
    {

        

        $maRequete = $this->pdo->prepare("UPDATE gateaux 
        SET propriete1=:propriete1, propriete2 = :propriete2 
        WHERE id = :id");

          $maRequete->execute([
          'propriete1' => $propriete1,
          'propriete2' => $propriete2,
          'id' => $id
       

          ]);



    }

    public function findAuthor()
    {
      return  $this->find($this->user_id, \Model\User::class, "autreTable");
       
    }


}