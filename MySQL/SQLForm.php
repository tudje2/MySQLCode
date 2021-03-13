<?php

        session_start();

    if (array_key_exists('email', $_POST) OR array_key_exists('department', $_POST)) {
        
    
        $database = mysqli_connect("sdb-c.hosting.stackcp.net", "Fellowship-3137318afe", "GKSSFEKPOMA2020", "Fellowship-3137318afe");
    
            if (mysqli_connect_error()) {
                                  
              die("Connection was not successful");
              
            }
                    
            if ($_POST['email'] == '') {
                
                echo "Email field required";
                
            } else if ($_POST['department'] == '') {
                
                echo "Department field required";
                
            } else {
                
                $query = "SELECT `id` FROM `Students` WHERE email = '".mysqli_real_escape_string($database, $_POST['email'])."'";
                
                $result = mysqli_query($database, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    
                    echo "That email address has been taken";
                    
                } else {
                    
                    $query = "INSERT INTO `Students` (`email`, `department`) VALUES('".mysqli_real_escape_string($database, $_POST['email'])."','".mysqli_real_escape_string($database, $_POST['department'])."')";
                    
                    if  (mysqli_query($database, $query)) {
                        
                        $_SESSION['email'] = $_POST['email'];
                        
                        header("Location: session.php");
                        
                    } else {
                        
                        echo "Sign Up failed";
                    }
                }
            }
            
            
            
    }
    



   

?>

    <form method="post">
        
        <p>Email: <input type="text" name="email"></p>
        
        <p>Department: <input type="text" name="department"></p>
        
         <input type="submit" value="Sign Up"></p>
        
        
        
    </form>






    