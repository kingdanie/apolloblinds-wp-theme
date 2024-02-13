<!-- LOCATION SECTION -->
<?php if( get_field('display_section_on_page') ):
        if( have_rows('location') ): 
            while( have_rows('location') ): the_row(); 
            $branch_location = get_sub_field( 'title' ); 
            $branch_finder = get_sub_field( 'branch_finder' ); 
        ?>

            <section>
                <div class="max-w-[1320px] m-auto flex flex-col p-10 items-center">
                <h2 class="mb-3"><?php echo $branch_location; ?></h2>

                
                <?php if( have_rows('location_posts') ): ?>
                <div class="flex flex-col sm:grid sm:grid-cols-2 md:grid-cols-3 gap-3">

                    <?php $location = get_field('location')['location_posts'];
                    
                        foreach( $location as $post ): 

                        setup_postdata( $post );
                        
                        ?>
                        <div class="border-2 border-border-grey px-2 py-3">
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p>
                            <?php the_content(); ?>
                        </p>
                        </div>

                    <?php endforeach; ?>
                    
                
                    <div 
                        class="gap-5 sm:col-span-2 flex justify-center flex-col p-3 md:p-10 min-h-48" 
                        style="background-image: url(<?php echo $branch_finder['background']['url'] ; ?>)">
                                
                            <p>
                                    <?php echo $branch_finder['title']; ?>
                            </p>
                            <div>
                                <a class="bg-primary py-3 px-10 text-white" href="<?php echo $branch_finder['finder_button']; ?>"> <span class="text-white">Find A Store</span></a>
                            </div>

                    </div>
                </div>

                <?php endif; ?>


                </div>
            </section>
            <?php 
        endwhile;
        endif; 
    endif; ?>
<!-- END OF LOCATION SECTION -->