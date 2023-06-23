<?php
session_start();?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
<title>Contact Us</title>
<link rel="icon" href="images/Logo/logo.png" />
<style>
    *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
     }
    
footer {
   margin-top: 20px;
}
    
    .container{
        
    margin: auto;
    width: 500px;
    max-width: 90%;
        
        
    }
    
    
    
    .container form{
      
        width: 100%;
        height: 100%;
        padding: 20px;
        background:#2d2c2c;
        border-radius: 50px;
        box-shadow: 0 8px 16px rgba(90, 88, 88, 0.3);
        margin: 100px 0px;
    }    
    
    .container form h1 {
    text-align: center;
    margin-bottom: 24px;
    color: #e0dced; 
        
    }

    .container .form-group label {
      color: #e0dced;
    }
    
    .container form .form-control{
    width: 100%;
    height: 40px;
    background: white;
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
    color:#e0dced;
    border-radius: 50px;
    transition: .3s;
        
    }
  
    .container form .btn:hover{
    opacity: .7;
    background-color: #e0dced;
    color: #088178;
    border: 1px solid #088178;
    }
    

    
</style>
    
    
</head>


<body>
   <?php
   require_once('header.php');?>
<div class="container">
   <form action="">
         <h1>Contact Us</h1>
       
         <div class="form-group">
            <label for="Full name"> Full name </label>
            <input type="text" placeholder="Enter your Full name"  class="form-control" required>
         </div>    
         
          
       
         <div class="form-group">
            <label for="email">  Email </label>
            <input type="email" placeholder="Enter your email" class="form-control" required>
         </div>    
       
         <div class="form-group">
            <label for="phone"> Mobile Number </label>
            <input type="tel" placeholder="Enter your mobile number" class="form-control" required>
         </div>    
         
         
         <div class="form-group"> 
            <label for="subject">Subject</label>
            <textarea  name="subject" placeholder="Write something.." class="form-control"></textarea>
        </div>    
             
         <input type="submit" class="btn" value="Submit">
       
    </form>     
</div>    
    

<?php
    require_once('footer.php');
    ?>
</body>
</html>