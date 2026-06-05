<?php

get_header();
?>
<main class="pt-16 lg:pt-20">
  <?php
  if (have_posts()) {
      while (have_posts()) {
          the_post();
          the_content();
      }
  }
  ?>
</main>
<?php
get_footer();
