<?php
    session_start();
    include "db_connection.php";
    //za uploadvane na snimki

    $targetdirectory = "img/";
    $isupload = 1;

    //dali ima kacheni failove
    if(!empty($_FILES['images']['name'][0])) 
    {
        //obhozhdane na vsichki snimki
        foreach($_FILES['images']['name'] as $key => $val) 
        {
            $target_file = $targetdirectory . basename($_FILES['images']['name'][$key]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadOk = 1;

            //proverka dali e kacheno izobrazhenie
            $check = getimagesize($_FILES['images']['tmp_name'][$key]);
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
            if($_FILES['images']['size'][$key] > 5000000) 
            {
                echo "Файлът е твърде голям.";
                $uploadOk = 0;
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
                if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) 
                {
                    //echo "Файлът ". htmlspecialchars(basename($_FILES['images']['name'][$key])). " беше успешно качен.";
                    $image_name = htmlspecialchars(basename($_FILES['images']['name'][$key]));
                    $offer_id = $_SESSION['last_id'];
                    
                    $img_size = $_FILES['images']['size'][$key];

                    $sql_img = "INSERT INTO `image` (`image_Name`, `image_URL`, `image_Size`) VALUES ('$image_name', '$target_file', '$img_size')";
                    $result_img = mysqli_query($con, $sql_img);
                    if($result_img)
                    {
                        $imgid = mysqli_insert_id($con);

                        //промяна на потребител в базата данни
                        $userid = $_SESSION['login_UserID'];
                        $sqlupdate = "UPDATE `user`
                                        SET
                                        `user_ImageID`='$imgid'
                                        WHERE `user_ID`='$userid'";
                        $resultupdate = mysqli_query($con, $sqlupdate);
                        if($resultupdate)
                        {
                            header("Location: profile.php?uspeshno dobavihte oferta i snimka");
                        }
                        else
                        {
                            header("Location: profile.php?error=neshto se oburka :<");
                        }
                    }
                    else
                    {
                        header("Location: add-offer-business.html?error=Neuspeshno se dobavi snimka");
                    }
                } 
                else 
                {
                    echo "Възникна грешка при качването на вашия файл.";
                }
            }
        }
    } 
    else 
    {
        echo "Не са избрани файлове за качване.";
    }