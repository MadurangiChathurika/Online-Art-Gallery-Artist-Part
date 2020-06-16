
<?php include 'partials/header.php' ?>


  <div class="container">
  <div class="jumbotron text-center">
  <h1>Welcome to the art gallery!!</h1>
  <p>"Not what man knows but what man feels, concerns art. All else is science."</p>
    <button type=button class="btn btn-primary">click</button>
    <button type=button class="btn btn-success">Thank you</button>
  </div>
  
  <div class="row">
  <div class="col-md-4">
  <a href="#" class="thumbnail">
  <img src="img_snow" alt="arts">
  </a>
  <h3> Snow</h3>
  </div>

   <div class="col-md-4">
   <a href="#" class="thumbnail">
   <img src="img_forest" alt="arts">
   </a>
  <h3> Bridge</h3>
  </div>

   <div class="col-md-4">
   <a href="#" class="thumbnail">
   <img src="img_mountains" alt="arts">
   </a>
  <h3> Mountain</h3>
   </div> 
	
	<div class="introtext">
	<a href="<?php echo base_url ('index.php/Home/read_more'); ?>">Read More>></a>
	</div> 
  </div>

 <?php include 'partials/footer.php' ?> 

   
  
  


 