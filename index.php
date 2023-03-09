<?php require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <header>
    <h2>STUDENT REGISTER</h2>
    <nav>
      <a href="#">HOME</a>
      
      <a href="#">ABOUT</a>
    </nav>
    <?php
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
{
  echo"
  <div class='user'>
  $_SESSION[username]-<a href='logout.php'>LOGOUT</a>
  </div>
  ";
}
else{
 echo" <div class='sign-in-up'>
  <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
  <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
</div>
";


}
?>
  </header>

  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <div class="form-group col-md-6">
    <label for="course">Choose a course:</label>
    <select id="course" name="course">
    
    
    
    
    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
    <option value="Mechanical Engineering">Mechanical Engineering</option>
    <option value="Biotechnology Engineering">Biotechnology Engineering</option>
    <option value="Civil Engineering">Civil Engineering</option>
    <option value="Automobile Engineering">Automobile Engineering</option>
    <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
    <option value="Data Science">Data Science</option>
  </select>
  </div>
  <div>
        <input type="text" placeholder="Guardian Name" name="guardianname">
        <input type="text" placeholder="Address" name="add">
        <div class="form-group col-md-6">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" aria-describedby="emailHelp" placeholder="dd/mm/yyyy">
    
  </div>

  <div class="form-group col-md-6">
    <label for="mobileno">Mobile Number</label>
    <input  minlength="10" maxlength="10" class="form-control" id="mobileno" name="mobileno" aria-describedby="emailHelp"placeholder="### ### ####" >
    
  </div>


        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>

  <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
  {
         echo"<h1 style='text-align: center;margin-top: 200px;'> WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
  }
  ?>
  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

</body>
</html>
