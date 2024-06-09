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
        if(isset($_FILES['picture']))
        {
            $picture = $_FILES['picture'];

            //Snimkata
            $target_dir = "img/";
            $target_file = $target_dir . basename($picture["name"]);
            $file_name = basename($picture["name"]);
            $file_size = $picture["size"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Proverka dali e istinska snimka ili e amongus
            $check = getimagesize($picture["tmp_name"]);
            if($check !== false) 
            {
                $uploadOk = 1;
            } 
            else 
            {
                //failut ne e sn
                $uploadOk = 0;
            }

            // Dali failut veche sushestvuva, nujno li e??
            if (file_exists($target_file)) 
            {
        
                $uploadOk = 0;
            }

            if ($picture["size"] > 500000) 
            { 
                // 500KB max size
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) 
            {
                $uploadOk = 0;
            }

            //Opit za kachvane ako uploadok = 1
            if ($uploadOk == 0) 
            {
                //echo "Failut ne be kachen :(";
            } 
            else 
            {
                if (move_uploaded_file($picture["tmp_name"], $target_file)) 
                {
                    //echo "Failut ". htmlspecialchars( basename( $picture["name"])). " e kachen uspeshno.";

                    //vsichki danni sa podgotveni
                    $sqladdimg = "INSERT INTO `image`(`image_Name`, `image_URL`, `image_Size`)
                            VALUES('$file_name', '$target_file', '$file_size')";
                    $resultaddimg = mysqli_query($con, $sqladdimg);
                    if($resultaddimg)
                    {
                        $imageid = mysqli_insert_id($con);
                    }
                    else
                    {
                        header("Location: register.php?error=Грешка при добавянето на снимка в имаге");
                        exit();
                    }
                } 
                else 
                {
                    header("Location: register.php?error=Грешка при качването на файла");
                    exit();
                }
            }
        }
        else
        {
            $imageid = null;
        }
//img handling end
        
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
} 
else 
{
    header("Location: login.php?не бачкам");
    exit();
}