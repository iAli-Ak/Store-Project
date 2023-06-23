<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Form</title>
<link rel="icon" href="images/Logo/logo.png" />
<style>
    *{
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
    height: 350px;
    }
    
    
    
    .container form{
      
        width: 100%;
        height: 120%;
        padding: 20px;
        background:#2d2c2c;
        border-radius: 50px;
        box-shadow: 0 8px 16px rgba(0,0,0,.3);
    }    
    
    .container form h1 {
    text-align: center;
    margin: 24px;
    color: #e0dced; 
        font-size: 35x;
    }

    .container form .form-group {
        color: #e0dced;
    }
    
    .container form .form-control{
    width: 100%;
    height: 40px;
    background: rgb(247, 244, 244);
    border: 1px solid #cce7d0;
    border-radius: 50x;
    border: none;
    margin: 10px 0 18px 0;
    padding: 0 10px;
         
        
    }
    
    
    .container form .btn{
    margin-left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 34px;
    border: 1px solid #cce7d0;
    outline: none;
    background: #088178;
    cursor: pointer;
    font-size: 16px;
    color: #e0dced;
    border-radius: 50px;
    transition: .4s;
        
    }
  
    .container form .btn:hover{
    opacity: .7;
    background-color: #e0dced;
    color: #088178;
    border: 1px solid #088178;
    }
    
    .container form a{
    margin-left: 140px;
    border: none;
    outline: none;
    color: #e0dced;
    text-align: center;
    text-decoration: none;
    padding-top: 50px;
    transition: .4s;
    padding-top: 50px;
}

.container form a:hover {
    color: rgb(184, 208, 248);
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
   <form action="php/LOGIN.php" method="post">
         <h1>Login Form</h1>
         <?php
         if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <div class="form-group">
            <label for=""> Email </label>
            <input type="text" name="email" class="form-control" >
         </div>    
         
         <div class="form-group">
            <label for=""> Password </label>
            <input type="password" name="password" class="form-control" >
         </div>   
         
         <input type="submit" class="btn" value="Login">
         <br>
       <a href="signup.php">Don't have an account?</a>
    </form>     
</div>    
    

    
</body>
</html>