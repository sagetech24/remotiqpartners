<?php
$home_url = remotiq_home_url();
$contact_email = 'people@remotiqpartners.com';
?>
<section class="bg-brand-red text-center text-white pt-28 lg:pt-36 pb-16 lg:pb-24 min-h-[32rem] lg:min-h-[36rem]">
  <div class="remotiq-join-thank-you__inner px-4 sm:px-6 lg:px-8 flex flex-col items-center w-full">
    <div class="mb-8 lg:mb-10 flex items-center justify-center w-16 h-16 sm:w-[72px] sm:h-[72px] rounded-full bg-white shrink-0" aria-hidden="true">
      <svg class="w-8 h-8 sm:w-9 sm:h-9 text-brand-red" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 12.5L9.5 17L19 7" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>

    <h1 class="text-[1.75rem] sm:text-4xl w-full sm:max-w-2xl lg:max-w-3xl lg:text-[2.75rem] font-bold lg:leading-[3.5rem] mb-5 lg:mb-6">
      You're in the queue — and
      it's a good one.
    </h1>

    <p class="remotiq-join-thank-you__intro text-sm sm:text-base leading-relaxed text-white/95 w-full mb-10 lg:mb-12">
      Thanks for taking the time to apply. We read every submission carefully, and we'll be in touch soon.
    </p>

    <div class="remotiq-join-thank-you__divider w-full border-t border-white/35 mb-10 lg:mb-12" aria-hidden="true"></div>

    <a
      href="<?php echo esc_url($home_url); ?>"
      class="inline-flex items-center justify-center px-8 py-3.5 rounded-md bg-brand-yellow text-brand-dark text-sm sm:text-base font-bold hover:bg-yellow-400 transition-colors shadow-sm"
    >
      Back to Homepage
    </a>

    <p class="remotiq-join-thank-you__confirmation mt-8 lg:mt-10 text-sm text-white/90 w-full leading-relaxed">
      A confirmation has been sent to the email address you provided.
    </p>

    <p class="mt-6 lg:mt-8 text-xs sm:text-sm text-white/85">
      Questions? Reach us at
      <a href="<?php echo esc_url('mailto:' . $contact_email); ?>" class="underline underline-offset-2 hover:text-white transition-colors">
        <?php echo esc_html($contact_email); ?>
      </a>
    </p>
  </div>
</section>
