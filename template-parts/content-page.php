<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apolloblind
 */

?>


            <?php if( have_rows('slides') ): ?>
                <section class="w-full">
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
                </section>
            <?php endif; ?>


            <?php if( have_rows('about_us') ): ?>
            <section>
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
            </section>
            <?php endif; ?>

        <?php if( have_rows('video_link') ): ?>
            <section class="bg-apollo-grey ">
                <div class="max-w-[1320px] m-auto flex p-3 sm:p-10 justify-center content-center">
                    <?php if( !empty(the_field('video_link')) ): ?>
                        <div class="embed-container">
                            <?php the_field('video_link'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>


        <?php if( have_rows('gallery_section') ): ?>
            <section>
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
            </section>
        <?php endif; ?>

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
                                                <span class="absolute inline-block text-sm px-1 py-3 text-accent bg-white">
                                                    <span class="pr-3"><?php echo $count . '.'; ?></span>
                                                    <span class="pr-5"><?php echo esc_html( $section_heading ); ?></span>
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
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    var mySwiper = new Swiper('.swiper-container', {
                        // Optional parameters
                        slidesPerView: 1,
                        spaceBetween: 10,
                        // Navigation arrows
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        // Responsive breakpoints
                        breakpoints: {
                            // When window width is >= 640px
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 20
                            },
                            // When window width is >= 768px
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 30
                            }
                        }
                    });
                    });
                    </script>
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
                                <div class="grid grid-cols-4 relative gap-3  border-border-grey border-b-2 border-t-2 py-10">
                                    <div class="relative">
                                        <div class="choose-us-count font-light text-[5em] top-[-25px] md:top-[-40px] md:text-[10em] absolute md:right-[15px]"
                                            style="<?php echo $count % 2 === 0 ? 'color: #efefef; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;' : ''; ?>"
                                        > 
                                            <?php echo $count; ?> 
                                        </div>
                                    </div>
                                    <div class="relative col-span-3">
                                        <h6 class='text-md font-bold mb-3 md:mb-0'> 
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
                                <button id="more-faqs"
                                    <?php if ($faqs_count < $initial_number) { ?> style="display: none;"<?php } ?> 
                                    class="bg-primary disabled:bg-accent py-2 px-10 text-white cursor-pointer" 
                                    onclick="repeater_show_more(); this.onclick=null; return false;"
                                >
                                    Load More Faqs
                                </button>
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
                    $('#more-faqs').text('Loading...');
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