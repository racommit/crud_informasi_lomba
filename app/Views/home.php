<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Site Metas -->
   <title>Poltek Landing Page</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Favicon -->
   <link rel="icon" href="images/logo-poltek.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Fancybox -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
   <style>
      h2,a{
         color: white;
      }
      .footer{
         padding-bottom: 10px;
      }
   </style>
</head>
<!-- Body -->

<body class="main-layout">
   <!-- Loader -->
   <!-- Add loader section if needed -->
   <!-- Header -->


   <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="#"><img src="/images/logo-poltek.png" alt="logo" width="90" height="auto" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto" id="navbarNav">
         <ul class="navbar-nav ml-auto">
           
            <li class="nav-item">
               <a class="nav-link" href="login" tabindex="-1"><button type="button" class="btn btn-primary">Login</button></a>
            </li>
         </ul>
      </div>
   </nav>


   <!-- End Header -->

   <!-- Main Content Sections (Add your content here) -->

   <!-- About Section -->
   <section id="about" class="about_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="about_content">
                  <h2>About Politeknik Gajah Tunggal</h2>
                  <p>Welcome to Politeknik Gajah Tunggal, where innovation meets education. We are committed to providing high-quality education and fostering a learning environment that prepares students for the challenges of the future. Our dedicated faculty and state-of-the-art facilities ensure a holistic learning experience.</p>
                  <p>Explore our programs, discover cutting-edge research, and join a community of passionate learners. At Politeknik Gajah Tunggal, we believe in shaping the leaders of tomorrow.</p>
               </div>
            </div>
            <!-- Add more columns or sections as needed -->
         </div>
      </div>
   </section>

   <!-- Contact Section -->



   <!-- Footer Section -->
   <footer>
      <div class="footer" style="color: white;" >
        
           
                  <div class="container">
                     <div class="row">
                        
                        <div class="col-md-12">
                           <div class="contact_info">
                              <h2>Visit Us</h2>
                              <p>Politeknik Gajah Tunggal <br>
                                 Jl. Gajah Tunggal No.16, RT.001/RW.002, Alam Jaya,
                                 Kec. Jatiuwung, Kota Tangerang, Banten 15133</p>
                              <h2>Connect With Us</h2>
                              <ul>
                                 <li><i class="fab fa-facebook"></i> <a href="#">Facebook</a></li>
                                 <li><i class="fab fa-twitter"></i> <a href="#">Twitter</a></li>
                                 <li><i class="fab fa-instagram"></i> <a href="#">Instagram</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
              
         </div>
     
   </footer>

   <!-- Javascript Files -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- Sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- Fancybox -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
   <script>
      $(document).ready(function() {
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
         });

         $(".zoom").hover(function() {
            $(this).addClass('transition');
         }, function() {
            $(this).removeClass('transition');
         });
      });
   </script>
</body>

</html>