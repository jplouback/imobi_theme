<?php 
//Template Name: Home 2
get_header(); 
 ?>


 <div class="container">
 	<div class="row">
 		<div class="col-sm-10">
 			<h1>Home template 2</h1>
			<?php 
 			while ( have_posts() ) : the_post();

				the_content();

				
			endwhile; // End of the loop.
 			 ?>
 		</div>
 	</div>
 </div>

 <?php get_footer(); ?>