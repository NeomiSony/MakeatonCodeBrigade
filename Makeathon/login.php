<?php
$conserv= mysqli_connect('localhost','root','');
if($conserv->connect_error)
{
    die("Connection Error".$conserv->connect_error);
}
mysqli_select_db($conserv,'student');
    
     if(isset($_POST['user_name'])&&isset($_POST['pwd']))
     {
         $user=$_POST['user_name'];
		 $pass=$_POST['pwd'];
         $query="SELECT * FROM login WHERE username='$user' and password='$pass'";
         $result=mysqli_query($conserv , $query);
         $row=mysqli_fetch_array($result);
         test_pass($_POST,$row['password']);
    }
    else{
        echo "Login Failed";
    }

 function test_pass($enterpass,$fetchpass)
    {
        if($enterpass['pwd']===$fetchpass &&$fetchpass!=null)
        {
            header('location:demo.html');
        }
        
        
    }
$conserv->close();
