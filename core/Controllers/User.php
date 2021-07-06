<?php


namespace Controllers;


class User extends Controller
{


    protected $modelName = \Model\User::class;


    
    public function login(){




        if(!empty($_POST['username']) && !empty($_POST['password'])){



            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);


            if($this->model->signIn($username, $password)){


                \Http::redirect('index.php');


            }else{

                die("tu n'est pas logger");

            }

            }else{

                    $userModel = new \Model\User();

                    $user = $userModel->getUser();

                    $titreDeLaPage = "Connexion";

                    \Rendering::render('user/login' , 
                    compact('user' , 'titreDeLaPage'));

                }

    }

    /**
     * 
     * 
     * 
     * 
     */
    public function logout(){

        $this->model->signOut();
        \Http::redirect('index.php');

    }


    public function register(){


            if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){

                $user = new \Model\User();

                $password = htmlspecialchars($_POST['password']);
                $user->username = htmlspecialchars($_POST['username']);
                $user->setPassword($password);
                $user->email = htmlspecialchars($_POST['email']);

                $this->model->signup($user);
                
    
                \Http::redirect('index.php');
    

            }else{
                $userModel = new \Model\User();
        
                $user = $userModel->getUser();
    
            $titreDeLaPage = "Inscription";
            \Rendering::render('user/signup', compact('user','titreDeLaPage'));
        }
    
    }




}