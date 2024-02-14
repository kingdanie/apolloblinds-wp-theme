<section class="w-full">
	<?php if ( have_rows( 'slides' ) ) : ?>
		<ul class="slides w-full">
			<?php 
			while ( have_rows( 'slides' ) ) :
				the_row(); 
				$image   = get_sub_field( 'slide_background' );
				$heading = get_sub_field( 'heading' );
				?>
				<li class="min-h-[565px] flex flex-col place-content-end p-12" style="background-image: url(<?php echo $image['url']; ?>);">			
					<h1 class="text-white" > <?php echo $heading; ?> </h1>
					<div class="flex gap-3">
						<span class="p-2 rounded-lg bg-white"></span>
						<span class="p-2 rounded-lg bg-white"></span>
						<span class="p-2 rounded-lg bg-white"></span>
					</div>
				</li>		
			<?php endwhile; ?>
		</ul>   
	<?php endif; ?>
</section>
