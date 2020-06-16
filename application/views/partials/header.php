<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto" rel="stylesheet"> <!-- google web font-open sans  -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> <!-- google web font-oswald  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!-- this is use to add social media icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        body{
            padding-top: 70px;
            padding-bottom: 20px;
        }
        nav {
            background: #000;
            background: linear-gradient(#0d0d0d,#404040,#0d0d0d); 
            border-radius: 5px 
        }
        div.introtext a{
            text-transform: uppercase;
            color: blue;
            float: right;
        }
        p{
            font-family: 'Open Sans', sans-serif;
        }
        title,h1,h2,h3{
            font-family: 'Oswald', sans-serif;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    
 <div class="container">
   
     <a class="navbar-brand" href="#">Artist Page</a>
   <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
   <li class="active"><a href="<?php echo base_url ('index.php/Home/index'); ?>">Home</a></li>
   <li><a href="<?php echo base_url ('index.php/Home/go'); ?>">Go</a></li>
   
   </ul>
   </div>
  </div>   
  </nav>