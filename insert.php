<!DOCTYPE html>
<html>
 
<head>
    <title>Success</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "kLAoi9o5afCf9C", "users");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)     
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $phone =  $_REQUEST['phone'];
        $email = $_REQUEST['email'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO college VALUES (null,'$first_name',
            '$last_name','$phone','$email')";
         
        if(mysqli_query($conn, $sql)){
            echo "New Record created successfully";
 
            echo nl2br("\n First Name: $first_name\n Last Name: $last_name\n Phone: $phone\n Email: $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>
