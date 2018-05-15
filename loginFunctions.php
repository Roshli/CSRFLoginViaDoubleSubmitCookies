<?php

//start session - server
session_start();
if(isset($_POST['submit']))
{
    ob_end_clean(); //clean previous displayed echoed  --End of Outer Buffer--
    
    //validate the logins
    loginvalidate($_POST['CSR'],$_COOKIE['session_id2'],$_POST['userName'],$_POST['passwd']);
}
//function to validate Login
function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
{
    if($username=="Admin" && $password=="Admin" && $user_CSRF==$_COOKIE['csrfToken'] && $user_sessionID==session_id())
    {
        echo "<script> alert('Login Sucess') </script>";
        echo "Welcome User"."<br/>"; 
        //apc_delete('csrfToken');
        
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>"."Authorization Failed!! Please Re Enter User name and Password!"."<br/>";
        
        
    }
}
?>
