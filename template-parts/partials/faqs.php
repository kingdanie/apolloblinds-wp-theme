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