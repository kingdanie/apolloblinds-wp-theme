<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apolloblind
 */

get_header();
?>

	<main id="primary" class="site-main">
        <section class="w-full">
            <?php if( have_rows('slides') ): ?>
                <ul class="slides w-full" style="background-color: red; background-size: cover;">
                    <?php while( have_rows('slides') ): the_row(); 
                        $image = get_sub_field('slide_background');
                        $heading = get_sub_field('heading');
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
                            <div class="py-5 flex gap-3">
                            <div class="flex items-center px-10 py-0 text-white bg-primary">
                                <a  href="<?php echo esc_url( $book_appointment ) ; ?>"> 
                                    <span class="text-white">
                                        Book Appointment
                                    </span> 
                                </a>
                            </div>
                            <p class="p-5 text-primary"> or Call
                                <a  href="<?php echo esc_url( $book_call ) ; ?>"> <span class="text-primary"> <?php echo esc_url( $book_call ); ?> </span> </a>
                            </p>
                            <div>
                        </div>
                    </div>
                   
                <?php endwhile; ?>
            <?php endif; ?>
        </section>

        <section class="bg-apollo-grey ">
            <div class="max-w-[1320px] m-auto flex p-10 content-center">
        <?php if( !empty(the_field('video_link')) ): ?>
            <div class="embed-container">
                <?php the_field('video_link'); ?>
            </div>
            <?php endif; ?>
                    </div>
        </section>


        
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
                                    <span class="absolute inline-block text-sm text-white md:text-lg p-5 bg-red-600 w-full">
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

            <!-- OUR PROCESSES SECTION -->
             <?php if( have_rows('our_process') ): ?>
                <?php while( have_rows('our_process') ): the_row(); 
                    $section_heading = get_sub_field( 'heading' );
                    $section_description = get_sub_field( 'description' );
                    $processes = get_sub_field('process_steps');
                ?>
                    <section>
                        <div class="max-w-[1320px] m-auto flex flex-col p-10 items-center">
                            <h2> <?php echo esc_html( $section_heading ); ?> </h2>
                            <p class="text-center md:w-[80%] m-auto"> <?php echo esc_html( $section_description); ?> </p>

                            <div class="pt-10 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4 w-full">
                                <?php if( $processes ): 
                                    $total = count($processes);
                                    $count = 1;
                                    //looping through the subgroup repeater
                                    while( have_rows('process_steps')  ): the_row(); 
                                        $section_heading = get_sub_field('title');
                                        $image_item = get_sub_field('image');
                                    ?>
                                        <a href="#" class="group relative flex h-48 items-end overflow-hidden md:h-[271px] md:w-[271px]">
                                            <img src="<?php echo $image_item['url']; ?>"  alt="<?php echo $image_item['alt']; ?>" 
                                                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-scale-110"
                                            />
                                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                                            </div>
                                                <span class="absolute inline-block text-sm p-5 text-accent bg-white">
                                                    <?php echo $count . '.'; ?>
                                                    <?php echo esc_html( $section_heading ); ?>
                                                </span>
                                        </a>
                                        <?php if( $count == $total) {
                                            break;
                                        } ?>
                                    <?php $count++; endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>
            <!-- END OF OUR PROCESSES SECTION -->

            <!-- WHY CHOOSE SECTION -->
            <?php if( have_rows('why_choose_us') ): ?>
                <?php while( have_rows('why_choose_us') ): the_row(); 
                    $section_heading = get_sub_field( 'heading' );
                    $sebsection = get_sub_field('subsections');
                ?>
                <section class="bg-apollo-grey">
                    <div class="max-w-[1320px] m-auto flex flex-col p-10 items-center">
                        <h2 class="">
                            <?php echo esc_html( $section_heading ); ?>
                        </h2>

                        <div class="flex flex-col gap-3 md:flex-row py-5">
                            <?php if($sebsection): 
                                $total = count($sebsection);
                                $count = 1;
                               // $number = 8;				
                                //looping through the subgroup repeater
                                while( have_rows('subsections')  ): the_row(); 
                                    $section_heading = get_sub_field('title');
                                    $description = get_sub_field('description');
                                ?>

                                <div class="grid md:grid-cols-4 relative gap-3  border-border-grey border-b-2 border-t-2 py-10">
                                    <div class="relative">
                                        <div class="text-lg md:text-[10em] absolute bottom-2 font-bold"> <?php echo $count; ?> </div>
                                    </div>
                                    <div class="relative md:col-span-3">
                                        <h6 class='text-md font-bold'> 
                                            <?php echo esc_html( $section_heading ); ?>
                                        </h6>
                                        <p>
                                            <?php echo esc_html( $description ); ?>
                                        </p>
                                    </div>
                                </div>
                                    <?php
                                        if ($count == $total) {
                                            // we've shown the number, break out of loop
                                            break;
                                        } ?>	

                                <?php $count++; endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <?php endwhile; ?>
            <?php endif; ?>
            <!-- END OF WHY CHOOSE SECTION -->

            <!-- SHUTTER COLORS SECTION -->

            <!-- END OF SHUTTER COLORS SECTION -->

   <!-- FAQ SECTION -->
<?php if( have_rows('faq') ): ?>
    <?php while( have_rows('faq') ): the_row(); 
        $section_heading = get_sub_field( 'title' );
    ?>
        <section class="bg-apollo-grey">
            <div id="faqs-container" class="max-w-[1320px] m-auto flex flex-col p-10 items-center">
                <h2><?php echo esc_html( $section_heading ); ?></h2>
            
                <?php 
                if( have_rows('faq_questions') ): 
                    $initial_number = 3; // Moved this initialization out of the loop to avoid reinitialization.
                ?>
                    <div class=" flex justify-center items-center w-full py-2">
                        <!-- Component Start -->
                        <div class="faq-item flex flex-col w-full gap-y-2">
                            <?php 
                            $faqs_count = 1; // Moved initialization here to reset the counter for each section
                            while( have_rows('faq_questions') ): the_row(); 
                                $faq_heading = get_sub_field( 'title' );
                                $faq_desc = get_sub_field( 'description' );
                            ?>
                                <button class="group border-t border-r border-l border-accent focus:outline-none">
                                    <div class="flex items-center justify-between h-12 px-3 font-semibold bg-[#938D8C] hover:bg-gray-700">
                                        <span class="text-white truncate"><?php echo esc_html( $faq_heading ); ?></span>
                                        <svg class="h-5 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#fff">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="max-h-0 overflow-hidden duration-300 group-focus:max-h-40">
                                        <div class="flex items-center h-8 p-10 text-sm hover:bg-gray-200"><?php echo esc_html( $faq_desc ); ?></div>
                                    </div>
                                </button>
                            <?php 
                                    if ($faqs_count == $initial_number) {
                                        // we've shown the number, break out of loop
                                        break;
                                    } 
                                    $faqs_count++; 
                            endwhile; 
                            ?>
                        </div>
                        <!-- Component End  -->
                    </div>
                    <div id="more-faqs"
                        <?php if ($faqs_count < $initial_number) { ?> style="display: none;"<?php } ?> 
                        class="bg-primary py-2 px-10 text-white" 
                        onclick="repeater_show_more(); this.onclick=null; return false;"
                    >
                        Load More Faqs
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- END OF FAQ SECTION -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function repeater_show_more() {
        jQuery('#more-faqs').prop('disabled', true);
        var my_repeater_field_post_id = <?php echo $post->ID; ?>;
        var my_repeater_field_offset = <?php echo $initial_number; ?>;
        var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
        var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';

        jQuery.post(
            my_repeater_ajax_url, {
                'action': 'my_repeater_show_more',
                'post_id': my_repeater_field_post_id,
                'offset': my_repeater_field_offset,
                'nonce': my_repeater_field_nonce
            },
            function(json) {
                jQuery('#faqs-container .faq-item:last').append(json['content']);
                my_repeater_field_offset = json['offset'];
                if (!json['more']) {
                    jQuery('#more-faqs').hide();
                }
            },
            'json'
        );
    }
</script>

            
            <!-- LOCATION SECTION -->
            <?php if( get_field('display_section_on_page') ):
                 if( have_rows('location') ): 
                     while( have_rows('location') ): the_row(); 
                        $branch_location = get_sub_field( 'branch_location' );
                        if( have_rows('branch_location') ): 
                            while( have_rows('branch_location') ): the_row(); 
                                $branch_location = get_sub_field( 'branch_location' );
                            ?>
                            <div>location goes here </div>

                            <?php endwhile;
                        endif; 
                    endwhile;
                 endif; 
             endif; ?>
            <!-- END OF LOCATION SECTION -->
            


	</main><!-- #main -->

   

<?php
get_footer();
