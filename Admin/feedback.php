<?php
include 'PDO.php';
class Feedback{
    private $fd_id;  
    private $u_id;  
    private $time;
    private $description;  

    public function __construct($fd_id, $u_id, $time, $description){
            $this->fd_id = $fd_id;
            $this->u_id = $u_id;
            $this->time = $time;
            $this->description = $description;
    }
    public function getId(){
        return $this->fd_id;
    }
    public function setId($fd_id){
        $this->fd_id=$fd_id;
    }
    public function getUId(){
        return $this->u_id;
    }
    public function setUId($u_id){
        $this->u_id=$u_id;
    } 
    public function getTime(){
        return $this->time;
    }
    public function setTime($time){
        $this->time=$time;
    } 
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description=$description;
    } 
    public function display(){
        return "ID=".$this->fd_id."<br>"."User ID=".$this->u_id."<br>"."Time=".$this->time."<br>"."Description=".$this->description."<br>";
    }


    public function addRecord(){
        $fd_id=$this->fd_id;
        $u_id=$this->u_id;
        $time=date("Y-m-d\TH:i:s");
        $description=$this->description;
        $con=new pdoConnection();     
        $sql="INSERT INTO feedback VALUES ('$fd_id','$u_id','$time','$description')";
        $result=$con->crudeQuery($sql);
    }

    public function ViewFeedbacks(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM feedback join user on feedback.u_id=user.u_id";
        $result=$con->execQuery($sql);
        return $result;
    }
}

#$p=new Feedback(1,1,"12:00","Poor");
#$p1=new Feedback(2,2,"11:00","Fair");
#$p2=new Feedback(3,3,"14:00","Good");
#$p3=new Feedback(4,4,"13:00","Excellent");
#echo $p->getId();
#echo $p->getUId();
#echo $p->getTime();
#echo $p->getDescription();
#echo $p->display();
#$p->addRecord();
#$p1->addRecord();
#$p2->addRecord();
#$p3->addRecord();
#$result=$p->viewFeedbacks();
#while($row=$result->fetch()){
#    echo $row['description']."<br>";
#}


?>