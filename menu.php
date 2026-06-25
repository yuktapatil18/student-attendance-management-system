
<!-- Navbar Start -->
   <!-- Spinner Start -->
  
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>e-attendance</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
               
                    <a class="nav-item nav-link active" aria-current="page" href="index.php">Home</a>
        
        <?php
        if($_SESSION['email']==null && $_SESSION['aemail']==null){
          ?>
        
        
          <a class="nav-item nav-link" href="login.php">Student Login</a>
           <a class="nav-item nav-link" href="teacher/index.php">Teacher Login</a>
           <a class="nav-item nav-link" href="admin.php">mentor Login</a>
        
        <?php
      }else if($_SESSION['aemail']==null && $_SESSION['email']!=null){
        ?>
        <a class="nav-item nav-link" href="report1.php">Report1</a> 
          <a class="nav-item nav-link" href="logout.php">Logout</a>
                 

        <?php
      }
      else {
      ?>
      
           <a class="nav-item nav-link" href="report2.php">Report2</a> 
        <a class="nav-item nav-link" href="logout.php">Logout</a>
        <?php
      }
      ?>
                   
              
                
            </div>
           
        </div>
    </nav>
    <!-- Navbar End -->
          
          