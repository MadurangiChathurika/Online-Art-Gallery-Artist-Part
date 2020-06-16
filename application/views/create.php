<?php include 'partials/header.php' ?>



<div class = "container">
    <h1>Add New Art <span><a href="#"> < Add New</a></span></h1>
    <p>Please fill this form and submit to add new art information record to the database.</p>
    
  <?php 
  if ($this->session->flashdata('msg')){
  echo "<h3>".$this->session->flashdata('msg')."</h3>";
  }
  ?>
<hr>

<?php echo validation_errors(); ?>
<?php echo form_open('Create/CreateArt'); ?>

   <div class="form-group">
    <label for="exampleInputPassword1">Artist Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Artist Name" name="Name">
   </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Art Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Art Name" name="Art_Name">
   </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Category" name="Category">
   </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Date</label>
    <input type="Date" class="form-control" id="exampleInputPassword1" placeholder="Date" name="Date">
   </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Size" name="Size">
   </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Directory</label>
    <input type="file" class="form-control" id="image" placeholder="Directory" name="Directory">
   </div>   

  <button type="submit" class="btn btn-success">Submit</button>
  <a href="<?php echo base_url ('index.php/Home/go'); ?>" class="btn btn-danger">Cancel</a>
  <?php echo form_close(); ?>
   
  </div>

<?php include 'partials/footer.php' ?>
  
  

