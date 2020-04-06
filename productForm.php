<!DOCTYPE html>
<html>
    <head>
        <title>Product Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        <?php require 'css/formStyle.css'; ?>
    </style>
    <body>
        <h1>Form for Entering Product Details</h1>
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Product id:<span> * </span>            
                        <input type="number" name="id" size="62" min="0" required>                
                    </td>  
                </tr>                
                <tr>
                    <td class="c">Product name:<span> * </span>
                        <input type="text" name="pName" size="46" required>
                    </td>
                </tr>                
                <tr>
                    <td>Category name:
                        <input type="text" name="category" size="46">
                    </td>
                </tr>                                             
                <tr>
                    <td class="c">Product image:<span> * </span>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </td>
                </tr>                 
                <tr>
                    <td>Product brand:
                        <input type="text" name="brand" size="46">
                    </td>
                </tr>     
                <tr>
                    <td class="c">Product price:<span> * </span>            
                        <input type="number" name="price" size="62" min="0" required>                
                    </td>  
                </tr>
                <tr>
                    <td>Product quantity:<span> * </span>            
                        <input type="number" name="quantity" size="62" min="0" required>                
                    </td>  
                </tr>                                                           
                <tr>
                    <td class="c">Product description:
                        <textarea name="description" rows="4" cols="48"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Product rating:<span> * </span>            
                        <input type="number" name="rating" min="1" max="5" required>                
                    </td>  
                </tr>
                
                <tr><td class="s"><input type="submit" name="submit" value="Submit"></td></tr>                    
            </table>            
        </form>      
    </body>
</html>
 