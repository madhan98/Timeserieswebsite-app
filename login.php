

<?php
   //index.php
   
   $error = '';
   $a='.csv';
   $user1='';
   $Username ='';
   $name = '';
   $name1='';
   $pname= '';
   $p='';
   $b="-";
   $datee =date("d/m/Y");
   
   function clean_text($string)
   {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
   }
   
   if(isset($_POST["submit"]))
   {
    if(empty($_POST["name"]))
    {
     $error .= '<p><label class="text-danger">Please Enter a number</label></p>';
    }
    else
    {
   	 $name1 = $_POST["name"];
	 if($name1>=11)
	 {
		 $error .= '<p><label class="text-danger">Please Enter number in range of 1-10</label></p>';
	 }
	 else if($name1<=0)
		 	 {
		 $error .= '<p><label class="text-danger">Please Enter number in range of 1-10</label></p>';
	 }
	 $name = $_POST["name"];
    }
	if(empty($_POST["pname"]))
    {
     $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
   	 $p = $_POST["pname"];

    }
    
	 if(empty($_POST["Username"]))
    {
     $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
   	$user1 = clean_text($_POST["Username"]);
   	$a='.csv';
	$b="-";
	$Username= $user1;
	$pname=$p;

   	
   	if ( strstr( $Username, '.' ) ) 
   	{
     	$Username = substr($Username, 0, strpos($Username, "."));

   	} 
	$pname=$b.$pname;
	$Username=$Username.$pname;
     $Username = $Username.$a;
    }
	
	if($error == '')
    {
	   	$file_pointer = $Username;

           if (file_exists($file_pointer)) {
			   	
     $file_open = fopen($Username, "a");
     $no_rows = count(file($Username));
     if($no_rows > 1)
     {
      $no_rows = ($no_rows - 1) + 1;
     }
     $form_data = array(
      'sr_no'  => $no_rows,
      'times' => $datee,
      'name'  => $name,
     );
     fputcsv($file_open, $form_data);
     $error = '<label class="text-success">Data has been entered successfully</label>';
     $name = '';
     $$datee = '';
           }
		   else {
				   $error .= '<p><label class="text-danger">Username is wrong.. register if you dont have an account</label></p>';
           }	

    }
	
	$p='';
	
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>How to Store Form data in CSV File using PHP</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  	  <link rel="stylesheet" href="tyle.css">
   </head>
   <body>
             <header>
      <a href="index.html" class="logo">
        <img src="imgs/back.png" alt="logo"  height="40" width="40"/>
      </a>
    </header>
      <br />
      <div class="container">
         <h2 align="center">Daily Entry</h2>
         <div class="col-md-6" style="margin:0 auto; float:none;">
            <form method="post">
               <br />
               <?php echo $error; ?>
               <div class="form-group">
                  <input type="hidden" name="datetime" value="<?php echo $datee; ?>" />
                  <label>Username</label>
                  <input type="text" name="Username" placeholder="Enter Username" class="form-control" value="<?php echo $User1; ?>" />
				  <label>Password</label>
                  <input type="password" name="pname" placeholder="Enter password" class="form-control" value="<?php echo $p; ?>" />
                  <label>Enter Number</label>
                  <input type="number" name="name" placeholder="Enter a number between 1- 10" class="form-control" value="<?php echo $name; ?>" />
               </div>
               <div class="form-group" align="center">
                  <input type="submit" name="submit" class="btn btn-info" value="Submit" />
			   <input type="button" onclick="location.href='register.php';" class="btn btn-info" value="Register" />
               </div>
            </form>
			<div id="contentInner" align="center">
            	<div></div>
				<p> This app's main objective is show the application and working of timeseries. </br>
				<p> Click below to start the <b>download and start with report</p>         
             </div>
			 				                 <div class="form-group" align="center">
			   <input type="button" onclick="location.href='downloadpage.php';" class="btn btn-info" value="Download/Report" />
			   </div>
         </div>
      </div>
   </body>
</html>

