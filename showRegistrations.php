<?php
$link = mysqli_connect("34.105.154.223", "root", "kLAoi9o5afCf9C", "users");

$message = "Registered Accounts:";
$sql = "select * from `registered_users1`";
$result = mysqli_query($link, $sql);


?>

<html>
<head>
	<META NAME="robots" CONTENT="noindex,nofollow">
	<Title>Website</Title>
</head>
<body>
<p><a href="index.html">Back to homepage</a></p>
<h2><?php echo $message; ?></h2>
<br>
        <table border="1">
            <tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>
            <?php
            while($row = mysqli_fetch_row($result)){
                echo "<tr>";
                for($i=1; $i<5; $i++){
                    echo "<td> {$row[$i]} </td>";
                }
              
                echo "</tr>";
            }
            
            ?>
        </table>    
</body>
</html>
