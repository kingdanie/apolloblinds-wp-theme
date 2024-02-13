<!-- INSPIRATION SECTION -->
    <?php if( have_rows('inspiration') ): ?>
    <section class="">
        <div class="max-w-[1320px] m-auto flex flex-col p-10 items-center">

            <?php while( have_rows('inspiration') ): the_row(); ?>
                <h2 class="py-3"><?php echo esc_html( get_sub_field( 'inspiration_title' ) ); ?></h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
                    <?php 
                    if( have_rows('shutter_images') ):
                        while( have_rows( 'shutter_images' ) ): the_row();
                        $image = get_sub_field( 'image' );
                        ?>
                            <div>
                                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                            </div>

                        <?php 
                        endwhile;
                    endif; ?>
                </div>
            <?php endwhile; ?>
            <div class="bg-primary mt-10 px-10 py-2 text-white">
                View More
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- END OF INSPIRATION SECTION -->