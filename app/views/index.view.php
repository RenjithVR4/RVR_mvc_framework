<?php

require('partials/head.php') ;

?>

<div class="container">

	<center><h1>Home Page </h1></center>	

 <?php 
 
 foreach ($users as $user) : ?> 

		<ul >
		
			<li> <?= $user->name ?> </li>

		</ul>


	<?php endforeach; ?> 


	<center><h1>Submit your name</h1></center>

	<form class="form" method="POST" action="names">

		<input type="text" name="name">

		<button type="submit">Submit</button>

	</form> 
</div>
	

 

<?php require('partials/footer.php') ?>