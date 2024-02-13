<!-- SHUTTER COLORS SECTION -->
<?php if( have_rows('shutter_colour') ): ?>
    <?php while( have_rows('shutter_colour') ): the_row(); 
        $section_heading = get_sub_field( 'title' );
        $description = get_sub_field( 'description' );

    ?>
        <section class="">
            <div class="max-w-[1320px] m-auto flex flex-col pt-10 px-10 items-center">
                <h2><?php echo esc_html( $section_heading ); ?></h2>
                <p class="text-center"><?php echo esc_html( $description ); ?></p>
                <div class="shutter-samples pt-6" style="">
                <?php 
                if( have_rows('shutter_colours_items') ):
                    while( have_rows( 'shutter_colours_items' ) ): the_row();
                        $shutter_colour = get_sub_field( 'colour' );
                        $shutter_text = get_sub_field( 'shutter_text' );
                    ?>
                        <div class="w-full border-b-2 border-border-grey flex flex-col">
                            <div 
                                class="min-h-36 min-w-36 lg:min-h-[200px] w-full px-5 pt-5" 
                                style="background-color: <?php echo $shutter_colour; ?>"
                            >
                            </div>
                            <p class="pt-2 pb-1"> <?php echo $shutter_text; ?></p>
                        </div>
                    <?php 
                    endwhile;
                endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- END OF SHUTTER COLORS SECTION -->