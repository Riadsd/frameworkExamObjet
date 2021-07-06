<?php

namespace Controllers;

class Exemple extends Controller
{

    protected $modelName = \Model\Exemple::class;


    /**
     * 
     * affiche la liste des gateaux
     */
    public function index()
    
    {
        

           /*  $userModel = new \Model\User();
             $user = $userModel->getUser(); */
        
           


     /*  $donneesExemple = $this->model->findAll($this->modelName); */
         


       /*  $titreDeLaPage = "Le titre de la page"; */

       /*  \Rendering::render('exemples/exemple', compact('user','donneesExemple','titreDeLaPage')); */
    }
    public function indexApi()
    
    {
        

            /* $userModel = new \Model\User();
             $user = $userModel->getUser(); */
        
           


     // $donneesExemple = $this->model->findAll($this->modelName);

     $donneesExemple = ["truc1" => "quelquechose", "truc2" => "autrechose"];
     
      header('Access-Control-Allow-Origin: *');

      
      echo json_encode($donneesExemple);


           }


    /**
     * 
     * affiche un gateau
     * 
     */
    public function show()
    {

       /*  $userModel = new \Model\User();
        $user = $userModel->getUser(); */


/* 
            $exemple_id= null;

            if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


                $exemple_id = $_GET['id'];
            }


        $unObjetExemple = $this->model->find($exemple_id, $this->modelName);
           
        
        

        $titreDeLaPage = $unObjetExemple->name;
  
        $modelAutreExemple = new \Model\AutreExemple();
        $autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id); */
        
        
       
       
        


        \Rendering::render('exemples/exemple', compact('user','unObjetExemple', 'autresDonnees','titreDeLaPage'));

    }

     /**
     * 
     * affiche un gateau
     * 
     */
    public function showApi()
    {

     /*    $userModel = new \Model\User();
        $user = $userModel->getUser(); */



          /*   $exemple_id= null;

            if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


                $exemple_id = $_GET['id'];
            }


        
        
        
    $exemple = $this->model->find($exemple_id, $this->modelName);
           
        
        

     
  
        $modelAutreExemple = new \Model\AutreExemple();
       
        
        $autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id);
        
        
           // $recettes = [];
       
           header('Access-Control-Allow-Origin: *');
            echo json_encode(
                [
                'exemple' => $exemple, 
                'autresDonnees' => $autresDonnees
                ]
            ); */


    }


    /**
     * 
     * supprimer un gateau
     */
    public function suppr()
    {
        /* $exemple_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


            $exemple_id = $_GET['id'];
        }

        if(!$exemple_id){
            die("pas d'id de exemple donné");
        }


        //verifier si le exemple existe
        $exemple = $this->model->find($exemple_id);

        if(!$exemple){
            die("exemple inexistant");
        }

        $this->model->delete($exemple_id);

        \Http::redirect("index.php"); */
    }
  
}