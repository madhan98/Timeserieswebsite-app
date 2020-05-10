

<?php
   //index.php
   
   $error = '';
   $a='.csv';
   $Username ='';
   $name = '';
   $name2 = '';
   
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
     $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
   	 $name =$_POST["name"];

    }
	    if(empty($_POST["name2"]))
    {
     $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
   	 $name2 = $_POST["name2"];

    }
	
	if($name==$name2)
	{

    if(empty($_POST["Username"]))
    {
     $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
   	$Username = clean_text($_POST["Username"]);
   	$a='.csv';
	$name= "-";
	$name2=$name.$name2;

   
     $Username = $Username.$name2.$a;

    }
   
    if($error == '')
    {
	   	$file_pointer = $Username;

           if (!file_exists($file_pointer)) {
			   	
     $file_open = fopen($Username, "a");
           }
	}	
	$error .= '<p><label class="text-danger">succesfully registered</label></p>';

    }
	else
	{
		$error .= '<p><label class="text-danger">Passwords dont match</label></p>';
   }
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  	  <link rel="stylesheet" href="tyle.css">
   </head>
   <body>
          <header>
      <a href="login.php" class="logo">
        <img src="imgs/back.png" alt="logo"  height="40" width="40"/>
      </a>
    </header>
      <br />
      <div class="container">
         <h2 align="center">Create Account</h2>
         <br />
         <div class="col-md-6" style="margin:0 auto; float:none;">
            <form method="post">
               <?php echo $error; ?>
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="Username" placeholder="Enter Username" class="form-control" value="<?php echo $Username; ?>" />
                  <label>Password</label>
                  <input type="password" name="name" placeholder="Enter password" class="form-control" value="<?php echo $name; ?>" />
				  <label>Confirm Password</label>
                  <input type="password" name="name2" placeholder="Enter password" class="form-control" value="<?php echo $name2; ?>" />
               </div>
               <div class="form-group" align="center">
                  <input type="submit" name="submit" class="btn btn-info" value="Submit" />
               </div>
            </form>
			<div id="contentInner" align="center">
            	<div></div>
				<p> <b>Username And Password </b>are very important. 
				<p> Due to the portability factor, MySql is not connected. So if a user forgets his/her <b>password</b>, They can Mail the <b>developer</b></p>        
             </div>
         </div>
      </div>
   </body>
</html>

