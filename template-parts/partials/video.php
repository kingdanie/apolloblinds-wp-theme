<section class="bg-apollo-grey ">
    <div class="max-w-[1320px] m-auto flex p-3 sm:p-10 justify-center content-center">
        <?php if( !empty(the_field('video_link')) ): ?>
            <div class="embed-container">
                <?php the_field('video_link'); ?>
            </div>
        <?php endif; ?>
        </div>
</section>