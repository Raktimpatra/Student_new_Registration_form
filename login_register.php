
<?php

require('connection.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
$fullname =$_POST["fullname"];
$username =$_POST["username"];
$email = $_POST["email"];
    $password = $_POST["password"];
    $course = $_POST["course"];
    $guardianname = $_POST["guardianname"];
    $add = $_POST["add"];
    $dob = $_POST["dob"];
    $mobileno = $_POST["mobileno"];
 
}
//login button
if(isset($_POST['login']))
{
  $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
  $result = mysqli_query($con,$query);

if($result)
{
if(mysqli_num_rows($result)==1)
{
$result_fetch=mysqli_fetch_assoc($result);
if(password_verify($_POST['password'],$result_fetch['password']))
{
$_SESSION['logged_in']=true;
$_SESSION['username']=$result_fetch['username'];
header("location: index.php");
}
else{
   echo"
  <script>
  alert('Incorrect password');
  window.location.herf='index.php';
  </script>
";
}
}

else{
  //Email or Username Not Registered
  echo"
  <script>
  alert('Email or Username Not Registered');
  window.location.herf='index.php';
  </script>
";
}
}
else
{
    echo"
      <script>
      alert('Cannot Run Query');
      window.location.herf='index.php';
      </script>
    ";
}
}
//registration button
if(isset($_POST['register']))

{

    $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";

    $result=mysqli_query($con,$user_exist_query);

    if($result)

{
  if(mysqli_num_rows($result)>0)
  {
    #if any user has already taken username or email
    $result_fetch=mysqli_fetch_assoc($result);
    if($result_fetch['username']==$_POST['username'])
    {
        #error for username already resister
        echo"
      <script>
      alert('$result_fetch[username] - Username already taken');
      window.location.herf='index.php';
      </script>
    ";
    }  
    else{
      #error for email already resister
        echo"
      <script>
      alert('$result_fetch[email] - E-mail already registered');
      window.location.herf='index.php';
      </script>
    ";
    }
}
  else
  {
        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`,`course`,`guardianname`,`add`,`dob`,`mobileno`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$course','$guardianname','$add','$dob','$mobileno')";
        if(mysqli_query($con,$query))
        {
          echo"
      <script>
      alert('Registration Successfull');
      window.location.herf='index.php';
      </script>
    ";
}
}
}
else
{
    echo"
      <script>
      alert('Cannot Run Query');
      window.location.herf='index.php';
      </script>
    ";
}
}

?>
