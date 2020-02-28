<?php
class CreateDb
{
    public $servername,$username,$password,$dbname,$con,$tablequery;    //variables

    //contructor intializing the batabase features
    public function __construct()
    {
	$this->servername="localhost";
 	$this->username="root";
    $this->password="";
    $this->dbname="AKA";
    }
    
  
    public function createthebeast($tablequery)
    {
        $this->tablequery=$tablequery;
        //creating connection
	    $this->con = mysqli_connect($this->servername,$this->username,$this->password);
        //checking
        if($this->con){}
        else //if false, then show error msg. else we r good to go
        {
               die("connection failed".mysqli_connect_error());
        }
	
        //query to create new db
        $sql="CREATE DATABASE IF NOT EXISTS $this->dbname";  

       
        if(mysqli_query($this->con,$sql))    //execute query $sql
        {

            $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);//connecting to database

            //sql to create new table (not needed)
  
            //if(!mysqli_query($this->con,$this->tablequery))
        //    {           }
         //   else
	     //   {
        //        echo " ".mysqli_error($this->con);
        //    }
        }//end of if
    }//end of function



  }//end of class



  //the above is a class of which we are creating a object and the then calling functions to create three tables
  $obj=new CreateDb();
  $querie="CREATE TABLE products(id INT(11) AUTO_INCREMENT PRIMARY KEY,product_name VARCHAR(25),product_price FLOAT,product_image VARCHAR(100),product_discount FLOAT)";
  $obj->createthebeast($querie);
  $querie="CREATE TABLE Registered_users(Email varchar(20) primary key,Username varchar(10),password int(10))";
  $obj->createthebeast($querie);
  $querie="CREATE TABLE Active_Session(Email varchar(20) primary key references Registered_users(EmaiL) ,Username varchar(10) references Registered_users(Username))";
  $obj->createthebeast($querie);

?>
