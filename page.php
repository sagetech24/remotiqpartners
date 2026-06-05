<?php

get_header();
?>
<main class="pt-16 lg:pt-20">
  <?php
  while (have_posts()) {
      the_post();
      ?>
      <article <?php post_class(); ?>>
        <?php the_content(); ?>
      </article>
      <?php
  }
  ?>
</main>
<?php
get_footer();
