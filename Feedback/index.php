<?php include 'components/header.php'?>
  <?php
  $name = $email = $body = '';
  $nameErr = $emailErr = $bodyErr = '';

  if(isset($_POST['submit'])){
    // VALIDATE NAME
    if(empty($_POST['name'])){
      $nameErr =  'Name is Required';
    }else{
      $name = filter_input(INPUT_POST,'name',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

     // VALIDATE EMAIL
     if(empty($_POST['email'])){
      $emailErr =  'Email is Required';
    }else{
      $email = filter_input(INPUT_POST,'email',
    FILTER_SANITIZE_EMAIL);
    }

     // VALIDATE BODY
     if(empty($_POST['body'])){
      $bodyErr =  'Feedback is Required';
    }else{
      $body = filter_input(INPUT_POST,'body',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    
    if(empty($nameErr)&&empty($emailErr)&&empty($bodyErr)){
      // Add to database
      $sql="INSERT INTO feedback (name,email,body) VALUES ('$name','$email','$body')";
      if(mysqli_query($conn,$sql)){;
      // Success
      header('location:feedback.php');
      }else{
        // Error
        echo 'Error'.mysqli_error($conn); 
      }
    }
  }
  
  ?>
<div class="main">
    <section id="instructors" class="p-3">
     <div class="container">
       <div class="row">
         <div class="col-md-12 col-lg-12">
           <div class="card" style="border: none;">
             <div class="card-body text-center">
                 <img src="/Assets/img/new.png" class="rounded-circle  mb-3" style="height: 8rem;width: 8rem;">
                 <h2 class="card-title mb-3">Feedback</h2>
               <p class="card-text lead">
                  Leave feedback for Trex Designs
               </p>
             
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   

   <section class="d-flex justify-content-center align-items-center">
    <div class="form col-lg-4">
      
      <form action="<?php echo htmlspecialchars($_SERVER ['PHP_SELF']);?>" method="POST">
        <div class="form-group">
          <label for="name">
           <h5>Name</h5>
          </label>
          <input type="text" class="form-control <?php echo $nameErr ?'is-invalid': null ;?>" id="name" 
          placeholder="Enter your Name"  name="name">
            <div class="invalid-feedback">
              <?php echo $nameErr;?>
            </div>
        </div>

        <div class="form-group pt-4">
         <label for="email">
          <h5>Email</h5>
         </label>
         <input type="text" class="form-control <?php echo $emailErr ? 'is-invalid':null;?>" id="email" 
         placeholder="Enter your Email" name="email">
         <div class="invalid-feedback">
              <?php echo $emailErr;?>
            </div>
        </div>

        
        <div class="form-group pt-4">
         <label for="feedback">
          <h5>Feedback</h5>
         </label>
         <input type="text" class="form-control <?php echo $bodyErr ?'is-invalid':null;?>"  id="body"
         placeholder="Enter your Feedback" name="body">
         <div class="invalid-feedback">
              <?php echo $bodyErr;?>
            </div>
        </div>

         <button class="btn btn-lg btn-dark col-12 mt-4" name="submit">Send</button>
      </form>

     
    </div>
    </section>
</div>
<?php include 'components/footer.php'?>