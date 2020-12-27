<?php
include 'PDO.php';
class User{
    private $u_id;  
    private $f_name;  
    private $l_name;
    private $email;  
    private $password;
    private $contact;
    private $blocked;

    public function __construct($u_id, $f_name, $l_name,$email,$password,$contact,$blocked){
            $this->u_id = $u_id;
            $this->f_name = $f_name;
            $this->l_name = $l_name;
            $this->email = $email;
            $this->password = $password;
            $this->contact = $contact;
            $this->blocked = $blocked;            
    }
    public function getId(){
        return $this->u_id;
    }
    public function setId($u_id){
        $this->u_id=$u_id;
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
    public function getContact(){
        return $this->contact;
    }
    public function setContact($contact){
        $this->contact=$contact;
    } 
    public function display(){
        return "ID=".$this->u_id."<br>"."First Name=".$this->f_name."<br>"."Last Name=".$this->l_name."<br>"."Email=".$this->email."<br>"."Password=".$this->password."<br>"."Contact=".$this->contact."<br>"."Blocked=".$this->blocked."<br>";
    }
    

    public function addRecord(){
        $u_id=$this->u_id;
        $f_name=$this->f_name;
        $l_name=$this->l_name;
        $email=$this->email;
        $password=$this->password;
        $password=hash('ripemd160', $password);
        $contact=$this->contact;
        $blocked=$this->blocked; 
        $con=new pdoConnection();     
        $sql="INSERT INTO user VALUES ('$u_id','$f_name','$l_name','$email','$password','$contact','$blocked')";
        $result=$con->crudeQuery($sql);
    }

    public function blockUser(){
        $u_id=$this->u_id;
        $block_status="1";
        $con=new pdoConnection();
        $sql ="UPDATE user SET blocked = '$block_status' WHERE u_id='$u_id'";
        $result=$con->crudeQuery($sql);
    }
    public function viewUsers(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM user";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function searchUser(){
        $u_id=$this->u_id;
        $con=new pdoConnection();
        $sql = "SELECT * FROM user Where u_id='$u_id'";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function DashboardInformation(){
        $info=array();
        $u_id=$this->u_id;
        $con=new pdoConnection();
        $sql = "SELECT Count(u_id) FROM user";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        array_push($info, $row[0]);
        $sql = "SELECT Count(fb_id) FROM feedback";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        array_push($info,$row[0]);
        $sql = "SELECT Count(or_id) FROM `order`";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        array_push($info,$row[0]);
        $sql = "SELECT Sum(total_price) FROM `order`";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        array_push($info,$row[0]);
        return $info;
    }



}
#$u=new User(1,"Talha","Zubair","talhazubair@gmail.com","talha1122","03330164732","0");
#$u1=new User(2,"Bilal","hassan","bilal@gmail.com","bilal1122","03525694578","0");
#$u2=new User(3,"Shahzaib","Haider","malik@gmail.com","malik1122","03229393959","0");
#$u3=new User(4,"Zaka","Pakistan","zaka@gmail.com","zaka1122","03725037035","0");

#$u->addRecord();
#$u1->addRecord();
#$u2->addRecord();
#$u3->addRecord();
#$u->addRecord();
#$u->blockUser();   

#$result= $u->viewUsers();
#while($row = $result->fetch()){
#    echo $row['u_id']."<br>";
#}
#$result=$u->searchUser();
#$row=$result->fetch();
#echo $row['blocked']."<br>";  








#echo $u->getId();
#echo $u->getF_name();
#echo $u->getEmail();
#echo $u->getPassword();
#$u->setEmail("talhazubair21521@gmail.com");
#echo $u->getEmail()."<br>";
#echo $u->display();
?>