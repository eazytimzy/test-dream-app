<!DOCTYPE html>
<html>
<head>
<title>DREAMLANDing page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
     <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //server connection details
        $servername = "us-cdbr-east-02.cleardb.com";//insert the name of your server
        $username = "bd18dcb727a755"; //insert your mysql username
        $password = "96f30e8c"; //insert your password
        $dbname = "heroku_12f74203d5ae84d"; //insert your database name
        //establish new connection to mysql database
        $conn = new mysqli($servername, $username, $password, $dbname);
        $email = $error = $responseMsg = "";
        //test input to ensure it is secure and free from any form of injections
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        /* this block of code helps to create the table where the emails will be stored,if you don't
        already have the table*/
        /*$table = "CREATE TABLE mails (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            mails VARCHAR(100) NOT NULL
     )";
     if($conn->query($table) == true) {
        echo "Table created";
     } else {
        echo "Error creating " .$conn->error;
    }*/
        //when the submit button is clicked
        if(isset($_POST["submit"])) {
        //if mail field is empty    
            if(empty( $_POST["email"])) {
                $error = "The mail field is required";
            } else {
                $email = test( $_POST["email"]);
                //checks if email is a valid address
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email format";
                } else {
                    //inserts validated email value to database and returns response message
                    $sql = "INSERT INTO mails (mails) VALUES ('$email')";
                    $insert_email = $conn->query($sql);
                        if ($insert_email) {
                                            //return response message
                    $responseMsg ="Thank you, we promise to reach out";
                    }
                    else{
                        $error = "Email not saved";
                }
                }
            }
        }
    }
    ?>

<div class="container-fluid  p-0" id="mainbody">
        <a href="#" class="navbar-brand animate__animated animate__bounce head-logo margin-add mt-5 pl-3 ml-5"><h1 class=""><img src="./assets/images/logo.svg" alt="logo.svg" style="background-color: #021859;"></h1></a>
        
              <div class="container margin-add pt-5 ml-5">
                     <p class="text-head">Create The Perfect Dream You Want And Watch It Happen While You Sleep.</p> <br>
                         <div class="clouds">
                            <img class="absolute hvr-pulse-grow w3-animate-fading mix-blend star-img image-fluid" src="./assets/images/star.svg" alt="star.svg">
                            <img class="absolute animate__animated animate__jackInTheBox w3-animate-fading  mix-blend moon-img image-fluid" src="./assets/images/moon.svg" alt="moon.svg">
                      <!-- <img class="absolute w3-animate-fading  mix-blend cloud-one image-fluid" src="./assets/images/cloud-small.svg" alt="cloud.svg"> -->
                           <img class="absolute  w3-animate-fading mix-blend cloud-two image-fluid" src="./assets/images/cloud-2.svg" alt="cloud.svg">
                           <img class="absolute  w3-animate-fading mix-blend cloud-three image-fluid" src="./assets/images/cloud2.svg" alt="cloud.svg">
                           <img class="absolute moon-img" src="./assets/images/Dots.svg" alt="bg-dots.svg">
                     </div>
                  </div>
            <div class="container  margin-add ml-5 text-pack display-on-desk">
                <span class="text-small ">We know you would like to dive into this beautiful fantasy right away but we are still making it perfect for you.
                     However we can keep you updated about our development and have you on DreamLand as an early user.</span>
                             <div class=" fish-div absolute">
                                <img class="fish-img  absolute image-fluid" src="./assets/images/Hero.svg" alt="Fish-img.svg">
                  </div>
              </div> 
                    <br>

            <div class="container  margin-add ml-5 text-pack-2 display-on-mob">
                <span class="text-small ">We know you would like to dive into this beautiful fantasy right away but we are still making it perfect for you.
                     However we can keep you updated about our development and have you on DreamLand as an early user.</span>
                         <div class=" fish-div absolute">
                            <img class="fish-img  absolute image-fluid" src="./assets/images/Fish.svg" alt="Fish-img.svg">
                       </div>
                  </div>
             <br>
                <p class="update margin-add pl-3 ml-5">Please Send Me The Latest Update About DreamLand</p> <br> <br> <br>
                      <div class="container margin-add  form-container ml-5">
                          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                               <input class="inpt" type="email" name="email" placeholder="Enter Your Email Address" value="<?php if (isset($email)) {echo $email;} ?>"> <br>
                                  <span class="error"><?php if (isset($error)){ echo $error;} ?></span><br>
                                 <button class=" mt-4 hvr-pulse-grow  frm-btn" type="submit" name="submit">YES! KEEP ME UPDATED</button>
                                     <p class="sucess"><?php if (isset($responseMsg)) {echo $responseMsg;} ?></p>
                             </form>
            </div>

            <!-- <div class="container margin-add  form-container ml-5">
                <form action="">
                    <input class="inpt" type="email" name="email" placeholder="Enter Your Email Address" > <br>
                    <span class="error"></span>show errors if any<br>
                    <!-- <button class=" mt-4 hvr-pulse-grow  frm-btn" type="submit" name="submit">YES! KEEP ME UPDATED</button> -->
                    <!-- <span class="sucess"></span>returns response message -->
                <!-- </form> -->
            <!-- </div>  -->
            <div class="container-fluid display-on-desk break pb-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="jumbotron">
                                <span class="span-logo">
                                <p>Know</p>
                                <p>DreamLand</p>
                            </span>
                                <span class="span-div-line"><div class="div-line"></div></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="jumbotron ">
                                <span class="span-text mb-0 ">
                                    With DreamLand, you don’t have to go to sleep with uncertainties. 
                                    You record/write what you would like to dream about it before going to sleep. Go to sleep, dream about it, 
                                    and wake up fullfilled. 
                                </span>
                                <br> <br> <br> <br> <br>
                                <div class="lists mt-5 mb-0">
                                <p>&#8212; Premeditate your dream</p>
                                <p>&#8212; Reccord your dreams</p>
                                <p>&#8212; Enjoy your dreams</p>
                                  </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="container display-on-mob we-do text-white">
                <p class="text-center"> What We Do</p>
                  <div class="what-we-do">
                    With DreamLand, you don’t have to go to sleep with uncertainties. 
                       You record/write what you would like to dream about it before going to sleep. Go to sleep, dream about it, 
                           and wake up fullfilled. 
             </div>
              <br>
                    <p class="text-center">How We Do It</p>
                         <div class="how-we-do">
                              We developed a tACS system to show you scenes from the perfect dream you designed by triggering parts of the visual cortex, 
                              parts of the motor cortex and certain motion-sensing areas deeper in your brain. 
                              During the induction stages of this semi-hypnotic phase,
                             your body become more relaxed and the brain enters changing levels of brain wave pattern. 
                       </div>
                </div>

            <div class="container- display-on-desk break-sec mt-0 pt-0">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="jumbotron">
                            <span class="span-logo">
                            <p>How Do We</p>
                            <p>Do This</p>
                        </span>
                            <span class="span-div-line"><div class="div-line"></div></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="jumbotron">
                            <span class="span-text-sec mb-5 ">
                                We developed a tACS system to show you scenes from the perfect dream you designed by triggering parts of the visual cortex, 
                                parts of the motor cortex and certain motion-sensing areas deeper in your brain.  <br> <br>
                         <p class="span-text-sec bb">
                           During the induction stages of this semi-hypnotic phase,
                          your body become more relaxed and the brain enters changing levels of brain wave pattern. 
                          The optimal wave pattern is when your brain shows a Theta wave pattern which is from 4 to 8 cycles per second.
                          This then shows you scenes from the perfect dream you have created. </p>
                            </span>
                        </div>
                    </div>
                </div>
        </div>


             <center><div class="heading pt-5">   
                  <h2 class="head-1 color1 ">What You Should Look Foward To With Dreamland</h2> <br>
                       <h4 class="head-2 pb-4">Record Your Dream Before Sleeping</h4>
             </div>
             </center>

            <div class="container-fluid ml-5 ">
                <div class="row row-mob ml-5 pt-5">
                    <div class=" hvr-wobble-horizontal mob-pad-b col-md-4"> <a data-fancybox="gallery" href="./assets/images/big1.png"><img src="./assets/images/small1.png"></a></div>
                    <div class=" hvr-wobble-horizontal mob-pad-b col-md-4"><a data-fancybox="gallery" href="./assets/images/big2.png"><img src="./assets/images/small2.png"></a></div>
                    <div class=" bd hvr-wobble-horizontal mob-pad-b col-md-4"><a data-fancybox="gallery" href="./assets/images/big3.png"><img src="./assets/images/small3.png"></a></div>
                </div>
                <h4 class="head-2 pb-4 pt-4 text-center pt-5 pl-0 ml-0 mr-5" >Go To Sleep, Watch It And Capture It</h4>
                <div class="row row-mob ml-5 pt-4">
                 <div class=" hvr-wobble-horizontal mob-pad-b col-md-4"><a data-fancybox="gallery" href="./assets/images/big4.png"><img src="./assets/images/small4.png"></a></div>
                 <div class=" hvr-wobble-horizontal mob-pad-b col-md-4"><a data-fancybox="gallery" href="./assets/images/big5.png"><img src="./assets/images/small5.png"></a></div>
                 <div class=" bd hvr-wobble-horizontal mob-pad-b col-md-4"><a data-fancybox="gallery" href="./assets/images/big6.png"><img src="./assets/images/small6.png"></a></div>
             </div> 
                    <br> <br> <br> <br>
             <div class="form-words form-word-mob mr-5">
                 <span class="text-center color1">Your Days Of Nightmares And Dreams</span>
                    <p class="text-center color1">Uncertainities Are Almost Over</p>
                        <p class="text-center label-x">Feel free to drop your email so we can keep you in the loop.</p>
             <form class="text-center " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
                  <input class="input" type="email" name="email" placeholder="we promise you, no spams" value="<?php if (isset($email)) {echo $email;} ?>" > <br>
                    <span class="error"><?php if (isset($error)){ echo $error;} ?></span><!-- show errors if any --><br>
                     <button class="mt-4 pb-5  hvr-pulse-grow input-btn" type="submit" name="submit">YES! KEEP ME UPDATED</button>
                        <p class="sucess"><?php if (isset($responseMsg)) {echo $responseMsg;} ?></p><!-- returns response message -->
                 </form>
            </div>
             
        </div> 
                  <br> <br> <br>
              <footer>
                <div class="footer-container">
                     <center>  <a href="#"><img class="foot-img" src="./assets/images/Frame 6.svg" alt="ffooter-logo.svg"></a> </center>
                     </div>
             </footer>
         </div>

            
 </div>

		    <script src="./assets/javascript/main.js"></script>
</body>
</html>
