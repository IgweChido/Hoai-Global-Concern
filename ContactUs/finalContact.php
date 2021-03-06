<?php

$name = $mail = $subject = $comment = "";

$errors = ['name' => '', 'mail' => '', 'subject' => '', 'comment' => ''];

if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $errors['name'] =  'This name is required';
    }else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
            $errors['name'] = "Name should consist of alphabets only";
        }
    }

    if(empty($_POST['mail'])){
        $errors['mail'] = 'This mail is required';
    }else{
        $mail = $_POST['mail'];
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $errors['mail'] = "A valid email is required";
        }
    }

    if(empty($_POST['subject'])){
        $errors['subject'] = 'This subject is required';
    }else{
        $subject = $_POST['subject'];
    }

    if(empty($_POST['comment'])){
        $errors['comment'] = 'This message is required';
    }else{
        $comment = $_POST['comment'];
    }

    if(array_filter($errors)){

    }else{ 
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);

        $mailTo = "info@hoaiconcerns.com.ng"; //this is meant to be your hosting email
        $headers = "From: " . $mail;
        $txt = "You have received an email from " . $name . ".\n\n" . $comment;

        mail($mailTo, $subject, $txt, $headers);

        
        header("Location: finalContact.php?mailSent");
        
        
        
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>

     <link rel="shortcut icon" href="images/hoai6.png" type="image/x-icon" >

    <link rel="stylesheet" href="../General_CSS/w3.css">
    <link rel="stylesheet" href="../General_CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   
</head>


<body>

   <!-- Navbar -->
<div class="w3-top" >
 <ul class="w3-navbar  w3-theme-d2 w3-left-align w3-indigo">
  <li class=" w3-hide-large w3-opennav w3-right w3-xlarge">
    <a class="w3-hover-indigo w3-theme-d2 w3-indigo" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars w3-padding-16"></i></a>
  </li>
  <li><img src="images/hoai_logo.jpg"style="width:55px" class="w3-margin"></li>


  <li class="w3-hide-small w3-hide-medium"><b><a href="../index.html" class="w3-hover-text-cyan w3-padding-16 w3-hover-indigo ">Home</a></li></b>


  <li class="w3-hide-small w3-hide-medium"><b><a href="../AboutUs/About2.html" class="w3-hover-text-cyan w3-hover-indigo  w3-padding-16 " >About Us</a></li></b>

  <li class="w3-hide-small w3-hide-medium"><b><a href="../Services/services2.html" class="w3-hover-text-cyan w3-padding-16 w3-hover-indigo ">Services</a></li></b>

  <li class="w3-hide-small w3-hide-medium"><b><a href="../Blog/articles2.html" class="w3-hover-text-cyan w3-padding-16 w3-hover-indigo ">Blog</a></li></b>


  <li class="w3-hide-small w3-hide-medium"><b><a href="../Features/features2.html" class="w3-hover-text-cyan w3-padding-16 w3-hover-indigo ">Features</a></li></b>

  
  <li class="w3-hide-small w3-hide-medium"><b><a href="../ContactUs/contact2.html" class="w3-hover-text-cyan w3-padding-16 w3-hover-indigo w3-text-cyan w3-bottombar w3-border-cyan">Contact Us</a></li></b>
 
  
 </ul>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-hide w3-hide-large  w3-indigo">
    <ul class="w3-navbar w3-left-align w3-theme">
      <li><a href="../index.html" class="w3-hover-white "><b>Home</b></a></li>

      <li><a href="../AboutUs/About2.html" class="w3-hover-white "><b>About Us</b></a></li>

      <li><a href="../Services/services2.html" class="w3-hover-white"><b>Services</b></a></li>

   <li><a href="../Blog/articles2.html" class="w3-hover-white"><b>Blog</b></a></li>

      <li><a href="../Features/features2.html" class="w3-hover-white"><b>Features</b></a></li>

      

      <li><a href="../ContactUs/contact2.html" class="w3-hover-white w3-white"><b>Contact us</b></a></li>
      
    </ul>
  </div>
</div>



 <!-- Contact Container -->

 <div class="w3-content" style="max-width:2000px;margin-top:80px;margin-bottom:80px">
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">

  <div class="w3-row">

    <div class="w3-col m5 w3-animate-left">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-grey w3-bottombar ">Contact Us</span></div>
      <h3 class="w3-text-red">Address</h3>
      <p>Plot21, Block 56, Chief M.I Okoro Avenue, Lekki Phase 1, Lagos</p>
      <p><i class="fa fa-map-marker w3-text-indigo w3-xlarge"></i>  Lagos, Nigeria</p>
      <p><i class="fa fa-phone w3-text-indigo w3-xlarge"></i>  +234 8063029313</p>
      <p><i class="fa fa-envelope-o w3-text-indigo w3-xlarge"></i>  igweokey@gmail.com</p>
    </div>


   
        <div class="w3-col m7 w3-animate-right">
        <form class = "w3-container w3-card-4 w3-padding-16 w3-white contacts" method="POST">

            <div class="errorcase w3-group"> <?php echo $errors['name'] ;?>
            <label class="w3-label w3-text-red">Name :</label>
            <input class="w3-input" type="text" name = "name" value="<?php echo htmlspecialchars($name);?>">
        </div>

             <div class="errorcase w3-group"> <?php echo $errors['mail']; ?>
            <label class="w3-label w3-text-red">Email :</label>
            <input class="w3-input" type="text" name = "mail" value="<?php echo htmlspecialchars($mail);?>">
            </div>
            

            <div class="errorcase w3-group"> <?php echo $errors['subject']; ?>
            <label class="w3-label w3-text-red">Subject :</label>
             <input class="w3-input" type="text" name = "subject" value="<?php echo htmlspecialchars($subject);?>"></div>
            

            <div class="errorcase w3-group"> <?php echo $errors['comment']; ?> <label class="w3-label w3-text-red">Message :</label>
        <input class="w3-input" type="text"name = "comment"> </div>
            

            

        

            <button class="w3-btn w3-right w3-theme" type="submit" name = "submit"> Send</button>
        </form>
    </div>



</div>
</div>
</div>






    <!-- Footer -->



<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center w3-indigo">
  
  <h4><div class="w3-xlarge w3-border-bottom w3-border-grey w3-padding-16 w3-margin-bottom ">Reach Us</div></h4>

  
 

  <a class="w3-btn-floating w3-indigo" href="https://facebook.com/HoaiGlobalConcernsTheTaxExperts" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>

  <a class="w3-btn-floating w3-indigo" href="https://twitter.com/TaxConcerns" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
  
  <a class="w3-btn-floating w3-indigo" href="https://www.instagram.com/hoaiglobal/?hl=en" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>

 
  <p> ?? 2020 by HOAI GLOBAL CONCERNS</p>

  <!-- <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-indigo w3-hide-small">Go To Top</span>   
    <a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div> -->
</footer>


<script type="text/javascript" src="../General_JS/head_foot.js"></script>



   
</body>
</html>