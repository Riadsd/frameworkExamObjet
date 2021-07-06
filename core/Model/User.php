<?php

namespace Model;

use PDO;


class User extends Model 
{

    protected $table = "users";

    public $id;
    public $username;
    private $password;
    public $email;

    public function setPassword($password){


        $this->password = $password;


    }



  /**
    * 
    * 
    * 
    * 
    */
  public function findByUsername(string $username){


   $sql = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");

   $sql->execute(['username' => $username]);

  $user = $sql->fetchObject(\Model\User::class);

  return $user;


    }

  /**
    * 
    * 
    * 
    * 
    */
   public function signIn($username, $password){

        
     $user = $this->findByUsername($username);

    if(!$user){

     die("tu n'a pas de compte crée toi un compte !");

     }

     if($password == $user->password){


      $_SESSION['user'] = [


        "id" => $user->id,
        "username" => $user->username,
        "email" => $user->email

         ];


         return true;
                                
         }else{

          return false;
         }


         }


    


    /**
     * 
     * 
     * 
     * 
     */
    public function isLoggedIn(){


        if(isset($_SESSION["user"]["id"]) 
        && !empty($_SESSION["user"]["id"])
        ){


            return true;


        }else{

            return false;

        }




    }

    /**
     * 
     * 
     * 
     * 
     */
    public function getUser(){


        if($this->isLoggedIn()){


            $user = $this->find($_SESSION["user"]["id"], \Model\User::class);

            return $user;

        }else{

            return false;
        }


    }


    /**
     * 
     * 
     * 
     */
    public function signOut(){

        session_unset();

    }


    /**
     * 
     * 
     * 
     * 
     */ 
    public function signUp(User $user)
    {

     $maRequete = $this->pdo->prepare("INSERT INTO users (username, password, email) 
     VALUES (:username, :password, :email)");

       $maRequete->execute([
       'username' => $user->username,
       'password' => $user->password,
       'email' => $user->email
    

       ]);

    }


    public function isAuthor(object $gateauOuRecette){

      if($this->id == $gateauOuRecette->user_id){
          return true;
      }else{
          return false;
      }
  }

  

  public function hasMade(object $gateauOuRecette)
  {
  
           $modelMake = new \Model\Make();
   if(   $modelMake->findByUser( $this ,  $gateauOuRecette)                   )
   {
       return true;
   }else{
       return false;
   }

  }


}

