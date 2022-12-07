<?php
if (isset($_POST['submit']) && isset($_FILES['image'])){

    include "connect.php";

        $name = $_POST['name']; 
        // $image = $_FILES['image'];
            echo "<pre>";
            print_r($_FILES["image"]);
            echo "</pre>";

            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if($error === 0){

            if ($img_size > 1250000) {
                $em = "Too large";
                header("location: index.php?error=$em");
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $image_upload_path = 'web/'.$new_img_name;
                    
                    move_uploaded_file($tmp_name, $image_upload_path);

                    $sql = "insert into table1(name,image) values('$name','$new_img_name')";
                    mysqli_query($con, $sql);

                    echo "<script>
                    alert('Successfully inserted!')
                    </script>";
                    // $em = "Successfully inserted!";
                    //   header("location: index.php");



                }
                else
                {
                    echo "<script>
                    alert('Wrong file format!')
                    </script>";
                    // $em = "Wrong file format!";
                    // header("location: index.php");
                }
            }
            }
            else
            {
                
                echo "<script>
                    alert('Unknown error!')
                    </script>";
            }
        
            }
            else
            {
            header('location: index.php');
            }
            