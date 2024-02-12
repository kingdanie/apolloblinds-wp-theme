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