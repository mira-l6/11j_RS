<?php
    session_start();
    include "db_connection.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $firstname = trim($_POST['firstname']);
        if(isset($_POST['lastname']))
        {
            $lastname = trim($_POST['lastname']);
        }
        else
        {
            $lastname = null;
        }
        
        $woman = isset($_POST['woman']) ? 1 : 0;
        $man = isset($_POST['man']) ? 1 : 0;
        if($woman)
        {
            $gender = "woman";
        }
        else if($man)
        {
            $gender = "man";
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
        //$bday = $_POST['birthday'];
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
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
/*
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
                    }
                } 
                else 
                {
                    header("Location: register.php?error=Грешка при качването на файла");
                }
            }
        }
        else
        {
            $imageid = null;
        }
*/
        //dobavqne na ostanalite danni
        $sqladduser = "INSERT INTO `user`(`user_FirstName`, `user_LastName`, `user_Gender`, `user_Birthday`, `user_Phone`, `user_Email`, `user_Color`)
                VALUES('$firstname', '$lastname', '$gender', '$birthday', '$phone', '$email', '$colour')";
        $resultadduser = mysqli_query($con, $sqladduser);
        if($resultadduser)
        {
            $_SESSION['userid'] = mysqli_insert_id($con);
            header("Location: profile.php?Uspeshno se registrirahte");
        }
        else
        {
            header("Location: register.php?error=Грешка при добавяне на потребител в юзър");            
        }

        $con->close();
    }
    else
    {
        header("Location: register.php?error=Липсва име, имейл или парола");
    }
}
else
{
    header("Location: register.php?Сървър методът не е пост");
}

