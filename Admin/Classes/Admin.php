<?php
class Admin{
    private $ad_id;  
    private $f_name;  
    private $l_name;
    private $email;  
    private $password;

    public function __construct($ad_id, $f_name, $l_name,$email,$password){
            $this->ad_id = $ad_id;
            $this->f_name = $f_name;
            $this->l_name = $l_name;
            $this->email = $email;
            $this->password = $password;            
    }
    public function getId(){
        return $this->ad_id;
    }
    public function setId($ad_id){
        $this->ad_id=$ad_id;
    }
    public function getF_name(){
        return $this->f_name;
    }
    public function setF_name($f_name){
        $this->f_name=$f_name;
    } 
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    } 
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password=$password;
    } 
    public function display(){
        return "ID=".$this->ad_id."<br>"."First Name=".$this->f_name."<br>"."Last Name=".$this->l_name."<br>"."Email=".$this->email."<br>"."Password=".$this->password."<br>";
    }

    public function login(){
        
    }
}

?>