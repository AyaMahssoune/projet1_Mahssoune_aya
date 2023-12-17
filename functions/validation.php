<?php
//Fonction de vérification de l'authentification d'utilisateur dans la base de données
function UserauthValid($username,$password){
    global $conn;
    $isExist=["exist"=>false,"msg"=>""];
    $result = mysqli_query($conn,"SELECT DISTINCT user_name,pwd FROM user WHERE user_name = '$username' and pwd='$password'" );
    $nameFind = mysqli_fetch_assoc($result);
    var_dump($nameFind);
    if($nameFind["user_name"]==$username and $nameFind["pwd"]==$password ){
    $isExist=["auth"=>true,"msg"=>"Utilisateur connecté "]; 
    }
    else{
     $isExist=["auth"=>false,"msg"=>"Veuillez saisir correctement vous informations !"];   
    }
    return $isExist;
 } 
// fonction de controle de formulaire de login 
function loginFormValid($dataForms,$p1,$p2){
    $dataForms=['login'=>$p1,'password'=>$p2];
    $Msg=[];
  if ($dataForms['login']==""||($dataForms["password"]=="")) {
      $Msg =['isEmpty' => true,'msg'=>'Erreur: veuillez remplir tous les champs.'];  
      }
  else{
      $Msg =['isEmpty' => false,'msg'=>'Succés: tous les champs sont remplis.']; 
      }
  return $Msg;
}

?>