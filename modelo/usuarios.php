<?php

class Usuario {
    
    private $email;
    private $nickname;
    private $idusuarios;
    private $roles_idroles;



    public function __construct(){}
    
    //recibame el email del usuario
    public function setEmail($email){
        $this->email = $email;
    }

    //recibame el nickname
    public function setNickname($nickname){
        $this->nickname = $nickname;
    }

    //recibame el idusuarios
    public function setIdusuarios($idusuarios){
        $this->idusuarios = $idusuarios;
    }

    //recibame el roles_idroles
    public function setRoles_idroles($roles_idroles){
        $this->roles_idroles = $roles_idroles;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getNickname(){
        return $this->nickname;
    }

    public function getIdusuarios(){
        return $this->idusuarios;
    }

    public function getRoles_idroles(){
        return $this->roles_idroles;
    }

}
?>