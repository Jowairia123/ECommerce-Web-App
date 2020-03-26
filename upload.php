<?php

    require 'config.php';
       
    // Posting Form Data to Server
    $id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);    
    $pname = filter_input(INPUT_POST, 'pName', FILTER_SANITIZE_STRING);
    $categoryName = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST,'price', FILTER_SANITIZE_NUMBER_INT); 
    $quantity = filter_input(INPUT_POST,'quantity', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $rating = filter_input(INPUT_POST,'quantity', FILTER_SANITIZE_NUMBER_INT);

    //Uploading Image to database
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image 
    if(isset($_POST["submit"])) 
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        
        //Check if no file was choosen
        else if ($_FILES['fileToUpload']['name'] == "")
        {
            echo "<br>No file was choosen!<br>";
        }
        
        else 
        {
            echo "<br> File is not an image!<br>";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) 
    {
        echo "<br> Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) )
    {
        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['fileToUpload']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    }
 
    //Insertion SQL query
    $sql = "INSERT INTO products (Id, Image, Name, Brand, CategoryName, Price, Quantity, Description,Rating)
    VALUES ('$id', '$image', '$pname','$brand','$categoryName','$price','$quantity','$description','$rating')";
 
    //Check Insertion
    if (mysqli_query($conn, $sql)) 
    {
        echo "<br> New record inserted successfully";
    } 
    
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    //Updating  Brand Name of id = 16
    $sqlQuery = 'Update Products set Brand = "GulAhmed" where Id = 5';
    
    //Check Updation
    if (mysqli_query($conn, $sqlQuery)) 
    {
        echo "<br> New record updated successfully";
    } 
    
    else 
    {
        echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
    }
    
    //Deleting Records
    $sqlQ = 'DELETE FROM products WHERE Description = "HHH" || Name = "jia"';
    
    //Check Deletion
    if (mysqli_query($conn, $sqlQ)) 
    {
        echo "<br> New record deleted successfully";
    } 
    
    else 
    {
        echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
    }
       
    //Close Connection
    mysqli_close($conn);

 
