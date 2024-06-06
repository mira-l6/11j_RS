<?php
    session_start();

    include "db_connection.php"; 


   if(isset($_POST['email']) && isset($_POST['pass'])) 
   {
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    
    $sqllogin = "SELECT * FROM `login` WHERE `login_Email`='$email' AND `login_Password`='$password'";
    $resultlogin = mysqli_query($con, $sqllogin);

    if(mysqli_num_rows($resultlogin) === 1) 
    {
        $rowlogin = mysqli_fetch_assoc($resultlogin);

        if($rowlogin['login_Email'] === $email && $rowlogin['login_Password'] === $password) 
        {
                $_SESSION['login_Email'] = $rowlogin['login_Email'];
                $_SESSION['login_Password'] = $rowlogin['login_Password'];
                $_SESSION['login_UserID'] = $rowlogin['login_UserID'];

                $userid = $_SESSION['login_UserID'];
                
                $sqlgetuser = "SELECT * FROM `user` WHERE `user_ID`='$userid'";
                $resultgetuser = mysqli_query($con, $sqlgetuser);
                if(mysqli_num_rows($resultgetuser) === 1)
                {
                    $rowgetuser = mysqli_fetch_assoc($resultgetuser);

                    /*$_SESSION['name'] = $rowgetuser['realtor_Name'];
                    $_SESSION['lastname'] = $rowgetrealtor['realtor_LastName'];
                    $_SESSION['email'] = $rowgetrealtor['realtor_Email'];
                    $_SESSION['phone'] = $rowgetrealtor['realtor_PhoneNumber'];
                    $_SESSION['experience'] = $rowgetrealtor['realtor_Experience'];
                    $_SESSION['description'] = $rowgetrealtor['realtor_Description'];*/
                }
                
                header("Location: profile.php");                  
            } 
            else 
            {
                header("Location: login.php?error=Грешно потребителско име или парола");
                exit();
            }
        } else {
            header("Location: login.php?error=Грешно потребителско име или парола");
            exit();
        }
} 
else 
{
    header("Location: login.php?не бачкам");
    exit();
}