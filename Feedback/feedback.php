<?php include 'components/header.php'?>
<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn,$sql);
$feedback = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<div class="main">
     <div class="row  d-flex justify-content-center align-items-center mt-5">
      <h2 class="text-center  mb-4  mt-1">Past Feedback</h2>
        <?php if(empty($feedback)): ?>
          <p  class="mt-1 text-center lead">There is no Feedback</p>
          <?php endif; ?>
       <?php  foreach($feedback as $item):?>
 <div class="col-md-12 col-lg-8 my-3">
        <div class="card p-3  text-center">
       <?php echo $item['body']?>
       <div class="text-secondary">
        By  <?php echo $item['name']?>  on <?php 
        echo $item['date' ]?>
       </div>
        </div>
      </div>
   
     
    <?php endforeach; ?>
      </div>
     </div>  
   
</div>
<?php include 'components/footer.php'?>