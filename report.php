<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Form Data Entry and Report</title>
   </head>
   <body>
      <center>
         <h1>Form Data Entry and Report</h1>
         <form action="insert.php" method="post">
             
<p>
               
               <label for="firstName">First Name:</label>
               <input type="text" name="first_name" id="firstName" required>
            </p>
 
             
<p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="last_name" id="lastName" required>
            </p>
 

 
             
<p>
               <label for="Phone Number">Phone Number:</label>
               <input type="text" name="phone" id="phone" pattern="^[0-9]{6}|[0-9]{8}|[0-9]{10}$"  required>
            </p>
 
             
<p>
               <label for="emailAddress">Email Address:</label>
               <input type="text" name="email" id="emailAddress" required>
            </p>
 
            <input type="submit" value="Register"> <button type="button"> <a href="showdb.php">Show registrations</a></button>
         </form>
      </center>
   </body>
</html>
