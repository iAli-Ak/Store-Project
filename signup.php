<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Form</title>
<link rel="icon" href="images/Logo/logo.png" />
<style>
    * {
        margin: 0;
        padding:0;
        box-sizing: border-box;
     }
    
body{
        min-height: 100vh;
        background: #e0dced;
        display: flex;
        font-family: sans-serif;
        
    }
    
    .container{
        
    margin: auto;
    width: 500px;
    max-width: 90%;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.2);

        
    }
    
    
    
    .container form{
      
        width: 100%;
        height: 100%;
        padding: 20px;
        background:#2d2c2c;
        border-radius: 0px;
        box-shadow: 0 8px 16px rgba(0,0,0,.3);
        
    }  
    
    .container form h1 {
    text-align: center;
    margin-bottom: 24px;
    color: #e0dced; 
        
    }
    
    .container form .form-group label {
      color: #e0dced;
    }


    .container form .form-control{
    width: 100%;
    height: 40px;
    background: #e0dced;
    border-radius: 4px;
    border: 1px solid silver;
    margin: 10px 0 18px 0;
    padding: 0 10px;
         
        
    }
    
    
    .container form .btn{
    margin-left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 34px;
    border: none;
    outline: none;
    background: #088178;
    cursor: pointer;
    font-size: 16px;
    color: #e0dced;
    border-radius: 50px;
    transition: .3s;
        
    }
  
    .container form .btn:hover{
    opacity: .7;
    background-color: #e0dced;
    color: #088178;
    border: 1px solid #088178;
    }
    
    .container form p a{
   
    width: 120px;
    height: 34px;
    border: none;
    outline: none;
    color: #088178;
    text-align: center;
    text-decoration: none;
    }

    .error {
    background: #f2e5e5;
    color: #ba3d3b;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
    margin: 20px auto;
}
    
</style>
    
    
</head>


<body>

<div class="container">
   <form action="php/sign_up.php" method="post">
         <h1>Create New Account</h1>
         <?php
         if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <div class="form-group">
            <label for="first name"> Name </label>
            <input type="text" placeholder="Enter your name"  name="firstName" class="form-control" required>
         </div>    
         <div class="form-group">
            <label for="email">  Email </label>
            <input type="email" placeholder="Enter your email" name="email" class="form-control" required>
         </div>    
       
         <div class="form-group">
            <label for="phone"> Mobile Number </label>
            <input type="text" name="number" placeholder="Enter your mobile number" class="form-control" required>
         </div>    
       
         <div class="form-group">
            <label for=""> Password </label>
            <input type="password" name="password" placeholder="Enter your password" class="form-control" id="mobileNumber" required>
         </div>   

         <div class="form-group">
            <label for="first name"> Address </label>
            <input type="text" name="address" placeholder="Enter your address"  class="form-control" required>
         </div>    
         
         <input type="submit" class="btn" value="Sign Up">
       <p style="margin-left: 30%; color: #e0dced;"> Already a member?  <a href="login.php">Login</a></p>
       
    </form>     
</div>    
    

</body>
</html>