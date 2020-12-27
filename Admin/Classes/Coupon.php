<?php
include 'PDO.php';
class Coupon{
    private $c_id;      
    private $name;  
    private $start_time;
    private $end_time;  
    private $u_id;
    private $value;

    public function __construct($c_id, $name, $start_time,$end_time,$u_id,$value){
            $this->c_id = $c_id;
            $this->name = $name;
            $this->start_time = $start_time;
            $this->end_time = $end_time;
            $this->u_id = $u_id;
            $this->value = $value;
    }
    public function getId(){
        return $this->c_id;
    }
    public function setId($c_id){
        $this->c_id=$c_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    } 
    public function getStartTime(){
        return $this->start_time;
    }
    public function setEndTime($end_time){
        $this->end_time=$end_time;
    } 
    public function getUID(){
        return $this->u_id;
    }
    public function setUID($u_id){
        $this->u_id=$u_id;
    } 
    public function getValue(){
        return $this->value;
    }
    public function setValue($value){
        $this->value=$value;
    } 
    public function display(){
        return "ID=".$this->c_id."<br>"."Name=".$this->name."<br>"."Start Time=".$this->start_time."<br>"."End Time=".$this->end_time."<br>"."User ID=".$this->u_id."<br>"."Value=".$this->value;
    }
    

    public function addRecord(){
        $con=new pdoConnection();
        $sql = "SELECT max(c_id) FROM coupon";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        $c_id=$row[0];
        $c_id=$c_id+1;
        $name=$this->name;
        $start_time=$date=date("Y-m-d\TH:i:s");
        $end_time=date("Y-m-d\TH:i:s",strtotime("+7 days", strtotime($start_time)));
        $u_id=$this->u_id;
        $value=$this->value;
        $sql="INSERT INTO coupon VALUES ('$c_id','$name','$start_time','$end_time','$u_id','$value')";
        $result=$con->crudeQuery($sql);
    }

}
#$u=new Coupon(1,"sdfsd34","Zubair","talhazubair1598@gmail.com",1,100);
#$u1=new Coupon(2,"nvbkt45","Zubair","talhazubair1598@gmail.com",2,120);
#$u2=new Coupon(3,"grswe34","Zubair","talhazubair1598@gmail.com",3,150);
#$u3=new Coupon(4,"cfcvd67","Zubair","talhazubair1598@gmail.com",4,200);

#$u->addRecord();
#$u1->addRecord();
#$u2->addRecord();
#$u3->addRecord();



?>