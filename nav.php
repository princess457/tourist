 <nav class="navbar navbar-default">
	   <div class="container.fluid">
	    <div class="navbar-header">
		<span data-toggle="collapse" class="navbar-toggle" data-target="#mynav">HOME</span>
		
		<div class="navbar-brand"id="on">Tourist Guide</div>
		
      </div>
	  <div class="collapse navbar-collapse" id="mynav">
	  <ul class="nav navbar-nav navbar-right">
	  
	  
	 <?php
	 
	 if(isset($_SESSION["aid"]))
	 {
	  echo'
	  <li class="on2"><a href="ahome.php"><i class="fa fa-home" style="color:black;"></i></a></li>
	  <li class="on2"><a href="acontact.php">Contact</a></li>
	  <li class="on2"><a href="aplace.php">Place</a></li>
	  <li class="on2"><a href="pcate.php">Category</a></li>
	  <li class="on2"><a href="restarent.php">Restarent</a></li>
	  <li class="on2"><a href="hoteldetail.php">Hotel</a></li>
	  <li class="on2"><a href="like.php">Like</a></li>
	  <li class="on2"><a href="booked.php"> Booked </a></li>
	  <li class="on2"><a href="messege.php">Comments</a></li>
	  <li class="on2"><div id="profile"><a href="profile.php"></div></a></li>
	  <li class="on2"><a href="alogout.php">Logout</a></li>
	 
	 ';
	 
	 }
	 else if(isset($_SESSION["uid"]))
	 {	include"config.php";
		$sql="select  * from registration where uid='{$_SESSION["uid"]}'";
		$res=$con->query($sql);
		$rec=$res->fetch_assoc();
	  echo"
	  <li class='on2'><a href='userhome.php'><i class='fa fa-home' style='color:black;'></i></a></li>
	  <li class='on2'><a href='search.php'><i class='fa fa-search' style='color:black;'></i></a></li>
	  <li class='on2'><a href='addcart.php'    style='color:black;'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>
	  <li class='on2'><a href='wishlist.php'   style='color:black;'>Wish List</a></li>
	  <li class='on2'><a href='StatusDetails.php'   style='color:black;'>Status Details</a></li>
	  <li class='on2'><a href='book.php'       style='color:black;'>Book Details</a></li>
	  <li class='on2'><a href='userlogout.php' style='color:black;'>Logout</a></li>
	  <li class='on2'><a href='psetting.php' style='color:black;'><img src='{$rec["profile"]}' alt='loading...' class='img img-responsive img-circle' height='50' width='50' style='border:2px solid black;'></a></li>
	 ";
	 }
	 else
	 {
	 echo'
	  <li class="on2"><a href="admin.php"> <i class="fa fa-user-crown">Admin Login</i></a></li>
	  <li class="on2"><a href="rigister.php">User Registration</a></li>
	  <li class="on2"><a href="Userlogin.php"> User Login</a></li>
	  <li class="on2"><a href="contact.php">Contact</a></li>
	 ';
	 }
	 ?>
	  </ul>
	  </div>
	  </div>
	  </nav>
	  