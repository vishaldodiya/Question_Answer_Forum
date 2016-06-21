<?php
    class connection{
        var $host = "localhost";
        var $user = "root";
        var $pass = "";
        var $db = "forum";
        var $mycon;
        
        
        
        function connect(){
            $con = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
            
            if(!$con){
                die("Cound not connect to database!!");
            }else{
                $this->mycon = $con;
               // echo "Successfully Connected";
            }
            
            return $this->mycon;
        }
        
        function close(){
            mysqli_close($this->mycon);
            //echo "Connection closed";
        }
    }

?>