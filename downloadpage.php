

<?php
   //index.php
   
   $error = '';
   $a='';
   $Username ='';
   $name = '';
   $pname='';
   
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
   	 $name = clean_text($_POST["name"]);
    }
	if(empty($_POST["pname"]))
    {
     $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
   	 $pname = $_POST["pname"];
	 echo "$pname";
    }
    
    if(empty($_POST["Username"]))
    {
     $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
   	$Username = clean_text($_POST["Username"]);
   	$a='.csv';
	$b="-";
   	echo " $Username";
   	
   	if ( strstr( $Username, '.' ) ) 
   	{
     	$Username = substr($Username, 0, strpos($Username, "."));
   	echo $Username;
   	} 
	$pname=$b.$pname;
	$Username=$Username.$pname;
     $Username = $Username.$a;
     echo " $Username \n";
    }
   	
   	$file_pointer = $Username;
	$er="404.php";
           if (file_exists($file_pointer)) {
              		header("Location: $file_pointer");
           }else {
				   header("Location: $er");
           }
   	   
    }
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>How to Store Form data in CSV File using PHP</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="css/style2.css">

   </head>
   <body>
     <header>
      <a href="login.php" class="logo">
        <img src="imgs/back.png" alt="logo"  height="40" width="40"/>
      </a>
      </a>
    </header>
      <br />
      <div class="container">
         <h2 align="center">Download Your File/Demo</h2>
         <br />
         <div class="col-md-6" style="margin:0 auto; float:none;">
            <form method="post">
               <?php echo $error; ?>
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="Username" placeholder="Enter Username" class="form-control" value="<?php echo $Username; ?>" />
				   <label>Password</label>
                  <input type="password" name="pname" placeholder="Enter password" class="form-control" value="<?php echo $pname; ?>" />
               </div>
               <div class="form-group" align="center">
                  <input type="submit" name="submit" class="btn btn-info" value="Submit" />
               </div>
            </form>
			   	<div id="contentInner" align="center">
            	<div></div>
				<p> When you have compeleted <b>atleast 1 week</b> worth data, download your file </br>
				<p><b>OR</b></p>
				<p> Click below to download a <b>demo file</b></p>
				<form method="get" action="data.csv">
					<button type="submit" class="btn btn-info">Demo Download!</button>
				</form>
				<p> <br>Lets start with report generation</p>      
			 <div class="form-group" align="center">
			   <input type="button" onclick="location.href='report.html';" class="btn btn-info" value="Start with report generation" />				
             </div>
         </div>
      </div>
   </body>
</html>

