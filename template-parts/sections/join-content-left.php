<div>
  <h2 class="text-3xl sm:text-4xl lg:text-[40px] font-bold text-brand-dark leading-tight mb-4 lg:mb-5">
    Why Join <span class="text-brand-red">RemotIQ</span>
  </h2>
  <p class="text-brand-dark text-sm sm:text-base leading-relaxed mb-8 lg:mb-10 max-w-lg">
    We go beyond staffing — every engagement is built on trust, accountability, and a genuine commitment to creating lasting value for your business and your people.
  </p>

  <div class="space-y-4 lg:space-y-6">
    <?php
    $reasons = [
        ['title' => 'Learn together', 'text' => 'Access to continuous learning resources and mentorship at every stage.'],
        ['title' => 'Own your journey', 'text' => 'We give you visibility, tools, and pride in your craft.'],
        ['title' => 'Every voice matters', 'text' => 'Inclusion isn\'t a policy here — it\'s who we are.'],
        ['title' => 'Rise together', 'text' => 'Grow your reputation, help others, and build a career worth having.'],
    ];
    foreach ($reasons as $reason) :
        ?>
    <div class="bg-white rounded-lg shadow-[0_2px_12px_rgba(0,0,0,0.08)] p-6 lg:p-8">
      <h3 class="text-xl lg:text-2xl font-bold text-brand-dark mb-2"><?php echo esc_html($reason['title']); ?></h3>
      <p class="text-md text-brand-dark leading-relaxed"><?php echo esc_html($reason['text']); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</div>
