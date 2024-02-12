<section>
    <?php if( have_rows('about_us') ): ?>
        <?php while( have_rows('about_us') ): the_row(); 

            // Get sub field values.
            $image = get_sub_field('section_image');
            $heading = get_sub_field('section_heading');
            $description = get_sub_field('description');
            $book_call = get_sub_field( 'book_call' );
            $book_appointment = get_sub_field( 'book_appointment' );
            // var_dump($image);

            ?>
            <div id="about-us" class="grid grid-cols-1 md:grid-cols-3 gap-20 py-8 px-14 max-w-[1320px] m-auto">
                <?php if($image): ?>
                    <div class="border-design">
                        <div class="image-container">
                            <img height="768" width="907" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_url( $image['alt'] ); ?>"/>
                        </div>
                    </div>
                    <?php endif; ?>
                <div class="content md:col-span-2 p-5">
                    <h2> <?php echo esc_html( $heading ); ?> </h2>
                    <p class="py-3"><?php echo  $description; ?> </p>
                    <div class="py-5 flex flex-col sm:flex-row gap-3">
                    <div class="flex items-center min-h-[50px] px-10 py-0 text-white bg-primary">
                        <a  href="<?php echo esc_url( $book_appointment ) ; ?>"> 
                            <span class="text-white">
                                Book Appointment
                            </span> 
                        </a>
                    </div>

                    <?php if ($book_call && $book_call !== '#'): ?>
                    <p class="p-5 text-primary"> or Call
                        <a href="<?php echo esc_url($book_call); ?>"> 
                            <span class="text-primary"> <?php echo esc_url($book_call); ?> </span> 
                        </a>
                    </p>
                    <?php endif; ?>
                    <div>
                </div>
            </div>
            
        <?php endwhile; ?>
    <?php endif; ?>
</section>