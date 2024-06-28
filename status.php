<html>
  <head>
    <?php include "header.php";
	session_start(); 
	?>
  </head>
  <body>
  <?php include "config.php";?>
  <?php include "nav.php";?>
    <div class="col-md-offset-3 col-md-6">
       <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
		 <label id="on2">Description</label>
         <input type="text" class="form-control" name="des">
       <br>
       <br>
	   <input type="submit" class="btn btn-success" name="order" value="Save">
	   <input type="clear" class="btn btn-danger pull-right" value="Cancel">
	   <?php
           if(isset($_POST["order"]))
           {
            $sql="UPDATE `hotelbook` SET `status`='1',`des`='{$_POST["des"]}' WHERE bookno='{$_GET["id"]}'";
            if($con->query($sql))
            {
             header("location:booked.php?mes=updated successfully");
            }
           else
           {
		   echo $sql;
           echo"<div class='alert alert-danger '>page not found</div>";
           }
           }
  
       ?>
       </form>
    </div>
  </body>
  <?php include "footer.php";?>
  
  
</html>