<?php

namespace Controllers;

class Home extends Controller
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
         
        $contenu = "votreContenuIci";

         $titreDeLaPage = "Le titre de la page"; 

        \Rendering::render('home/home', compact('contenu','titreDeLaPage')); 
    }


}   