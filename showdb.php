
<?php
$link = mysqli_connect("localhost", "root", "kLAoi9o5afCf9C", "users");

$message = "Records from database:";
$sql = "select * from `college`";
$result = mysqli_query($link, $sql);


?>

<html>
<head>
<title>Registration</title>
</head>
<body>
<p><a href="index.html">Back to homepage</a></p>
<h2><?php echo $message; ?></h2>
<br>
        <table border="1">
            <tr><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th></tr>
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
