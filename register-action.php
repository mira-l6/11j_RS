<?php
    session_start();
    include "db_connection.php"; 

    if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password'])) 
    {
        $firstname = trim($_POST['firstname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(isset($_POST['lastname']))
        {
            $lastname = trim($_POST['lastname']);
        }
        else
        {
            $lastname = null;
        }
        if(isset($_POST['man']))
        {
            $gender = "man";
        }
        else if(isset($_POST['woman']))
        {
            $gender = "woman";
        }
        else
        {
            $gender = null;
        }
        if(isset($_POST['birthday']))
        {
            $birthday = trim($_POST['birthday']);
        }
        else
        {
            $birthday = null;
        }
        if(isset($_POST['colour']))
        {
            $colour = trim($_POST['colour']);
        }
        else
        {
            $colour = null;
        }
        if(isset($_POST['phone']))
        {
            $phone = trim($_POST['phone']);
        }
        else
        {
            $phone = null;
        }

        //image handling
        $targetdirectory = "img/";
        $isupload = 1;

        //dali ima kacheni failove
        if(isset($_POST['picture'])) 
        {
            $targetdirectory = "img/";
            $isupload = 1;
            //obhozhdane na vsichki snimki
            foreach($_FILES['file']['name'] as $key => $val) 
            {
                $target_file = $targetdirectory . basename($_FILES['file']['name'][$key]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $uploadOk = 1;

                //proverka dali e kacheno izobrazhenie
                $check = getimagesize($_FILES['file']['tmp_name'][$key]);
                if($check === false) 
                {
                    echo "Файлът не е изображение.";
                    $uploadOk = 0;
                }

                // proverqva dali veche ne syshtestvuva
                if(file_exists($target_file)) 
                {
                    echo "Файлът вече съществува.";
                    $uploadOk = 0;
                }

                // ogranichenie za razmera
                if($_FILES['file']['size'][$key] > 5000000) 
                {
                    echo "Файлът е твърде голям.";
                    $uploadOk = 0;
                    $img_size = $_FILES['images']['size'][$key];
                }

                // proverka za razshireniqta na failovete
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
                {
                    echo "Разрешени са само JPG, JPEG, PNG & GIF файлове.";
                    $uploadOk = 0;
                }

            
                if($uploadOk == 0) 
                {
                    echo "Файлът не беше качен.";
                } 
                else 
                {
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_file)) 
                    {
                        //echo "Файлът ". htmlspecialchars(basename($_FILES['images']['name'][$key])). " беше успешно качен.";
                        $image_name = htmlspecialchars(basename($_FILES['file']['name'][$key]));
                    
                        $sql_img = "INSERT INTO `image` (`image_Name`, `image_URL`, `image_Size`)
                                VALUES ('$image_name', '$target_file', '$img_size')";
                        $result_img = mysqli_query($con, $sql_img);
                        if($result_img)
                        {
                            $userpicid = mysqli_insert_id($con);
                            //header("Location: add-offer-business.html?uspeshno dobavihte oferta i snimka");
                        }
                        else
                        {
                            header("Location: register.php?error=Неуспешно добавяне на snimka v image");
                        }
                    }
                    else 
                    {
                        header("Location: register.php?error=Възникна проблем при качването на вашия файл");
                    }
                }
            }
        } 
        else 
        {
            header("Location: register.php?error=Не са избрани файлове за качване");
        }
        //img handle end
        
        $sqlnewuser = "INSERT INTO `user`(`user_FirstName`, `user_LastName`, `user_Gender`, `user_Birthday`, `user_Phone`, `user_Email`, `user_Color`) 
            VALUES('$firstname', '$lastname', '$gender', '2006-06-25', '$phone', '$email', '$colour')";
        $resultnewuser = mysqli_query($con, $sqlnewuser);

        if($resultnewuser)
        {
            $newuserid = mysqli_insert_id($con);

            $sqlnewlogin = "INSERT INTO `login`(`login_Email`, `login_Password`, `login_UserID`)
                VALUES('$email', '$password', '$newuserid')";
            $resultnewlogin = mysqli_query($con, $sqlnewlogin);
            if($resultnewlogin)
            {
                $_SESSION['login_UserID'] = $newuserid;
                header("Location: profile.php");
            }
            else
            {
                header("Location: register.php?error=Неуспешно добавяне на потребител в login");
            }
        }
        else
        {
            header("Location: register.php?error=Неуспешно добавяне на потребител в юзър");
        }

        /*if(mysqli_num_rows($resultlogin) === 1) 
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
                //}
                
                //header("Location: profile.php");                  
            //} 
            //else 
            //{
               // header("Location: login.php?error=Грешно потребителско име или парола");
                //exit();
            //}
        //} 
        // else 
        // {
        //     header("Location: login.php?error=Грешно потребителско име или парола");
        //     exit();
        // }
} 
else 
{
    header("Location: login.php?не бачкам");
    exit();
}