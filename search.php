<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
?>
<body>
<?php include"nav.php";?>
<?php include"config.php";?>
<div class='row'>
 <div class="col-md-offset-3 col-md-6">
    <form class='form-group'>
        <input type='type' class='form-control ' placeholder='search' id='input'>
		
    <form>
 </div>
</div>
<div id="out" class="row"></div>
</body>
<?php include"footer.php";?>
<script>
  $(document).ready(function(){
   $input=$(this).val();
   $.post("searchplace.php",{input:$input},function(data){
		   $("#out").html(data);
		   });
     $("#input").keyup(function(){
	   $input=$(this).val();
	   $.post("searchplace.php",{input:$input},function(data){
		   $("#out").html(data);
		})
	 })
  
  });

y
</script>   
</html>