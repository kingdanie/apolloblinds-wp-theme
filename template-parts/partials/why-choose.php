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