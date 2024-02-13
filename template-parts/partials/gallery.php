<section>
    <?php if( have_rows('gallery_section') ): ?>
        <?php while( have_rows('gallery_section') ): the_row(); 
            $section_heading = get_sub_field( 'section_heading' );
            $image = get_sub_field('image_gallery');
                            ?>

            <div class="max-w-[1320px] m-auto flex flex-col p-10 items-center">
            <h2> <?php echo esc_html( $section_heading ); ?> </h2>

            <div class="pt-10 grid grid-cols-1 gap-3 sm:grid-cols-3 w-full">
            <?php if( $image ): 
                //looping through the subgroup repeater
                while( have_rows('image_gallery')  ): the_row(); 
                    $section_heading = get_sub_field('image_title');
                    $image_item = get_sub_field('image');
                ?>
                    <a href="#" class="group relative flex h-48 items-end overflow-hidden md:h-80">
                        <img src="<?php echo $image_item['url']; ?>"  alt="<?php echo $image_item['alt']; ?>" 
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-scale-110"
                        />
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>
                            <span class="absolute inline-block text-sm text-white md:text-lg p-5 bg-[#676767e0] w-full">
                                <?php echo esc_html( $section_heading ); ?>
                            </span>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>