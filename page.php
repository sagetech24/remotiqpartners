<?php
/**
 * Default page template.
 */

get_header();

while (have_posts()) {
    the_post();
    ?>
    <main class="w-full min-h-[25vh] py-12 lg:py-[6.2rem]">
      <article <?php post_class('remotiq-page-content w-full'); ?>>
        <?php the_content(); ?>
      </article>
    </main>
    <?php
}

get_footer();
