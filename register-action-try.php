<?php
    session_start();
    include "db_connection.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
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
    //$bday = $_POST['birthday'];
    $bday = null;
    $colour = $_POST['colour'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

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

            }

            //$sql = "INSERT INTO users (name, username, phone, picture) VALUES (?, ?, ?, ?)";
        } 
        else 
        {
            
        }
    }
}
else
{
    $imageid = null;
}
    //dobavqne na ostanalite danni
    $sqladduser = "INSERT INTO `user`(`user_FirstName`, `user_LastName`, `user_Gender`, `user_Birthday`, `user_Phone`, `user_Email`, `user_Color`)
            VALUES('$firstname', '$lastname', '$gender', '$bday', '$phone', '$email', '$colour')";
    $resultadduser = mysqli_query($con, $sqladduser);
    if($resultadduser)
    {
        $_SESSION['userid'] = mysqli_insert_id($con);
        header("Location: profile.php?Uspeshno se registrirahte");
    }
    else
    {

    }
    $con->close();
}

