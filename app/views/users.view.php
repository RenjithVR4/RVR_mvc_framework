<?php

require('partials/head.php') ?>

<div class="container">

	<center><h1>Users</h1></center>	

	<?php
	
	
	foreach ($users as $user) : ?> 

		<ul >
		
			<li>
		 
				<div class="input-group">

					<?= $user->name ?> &nbsp | &nbsp

					<form action="users/<?= $user->id?>" method="POST">

						<input name="_method" type="hidden" value="delete" />

						<span class="input-group-btn"><button class="btn btn-dark btn-sm">Delete</button> </span>

					</form>
					 
				</div>

			</li>

		</ul>


	<?php endforeach; ?> 

    <hr>

	<h3>Submit your name</h3>

	<form class="form" method="POST" action="users">

		<input type="text" name="name">

		<button type="submit">Submit</button>

	</form>
</div>
	

 

<?php require('partials/footer.php') ?>