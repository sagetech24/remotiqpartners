<?php
$home_url = remotiq_home_url();
$services_url = remotiq_home_url('our-services');
$contact_email = 'connect@remotiqpartners.com';
?>
<section class="bg-brand-red text-center text-white pt-28 lg:pt-36 pb-16 lg:pb-24 min-h-[32rem] lg:min-h-[36rem]">
  <div class="remotiq-partner-thank-you__inner px-4 sm:px-6 lg:px-8 flex flex-col items-center w-full">
    <div class="mb-8 lg:mb-10 flex items-center justify-center w-16 h-16 sm:w-[72px] sm:h-[72px] rounded-full bg-white shrink-0" aria-hidden="true">
      <svg class="w-8 h-8 sm:w-9 sm:h-9 text-brand-red" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 12.5L9.5 17L19 7" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>

    <h1 class="text-[1.75rem] sm:text-2xl w-full sm:max-w-2xl lg:max-w-4xl lg:text-[3.8rem] font-bold lg:leading-[4rem] mb-5 lg:mb-6">
      Thank you for reaching out, we're glad you're here.
    </h1>

    <div class="remotiq-partner-thank-you__intro text-sm sm:text-base leading-relaxed text-white/95 w-full mb-6 lg:mb-8 space-y-4">
      <p>
        Your enquiry has been successfully submitted. A member of the RemotIQ team will review your details and get back to you within 24 hours to start the conversation.
      </p>
      <p>
        In the meantime, know this — you're not just contacting a service provider. You're taking the first step toward a partnership built on purpose.
      </p>
    </div>

    <div class="remotiq-partner-thank-you__divider w-full border-t border-white/35 mb-10 lg:mb-12" aria-hidden="true"></div>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-5 w-full sm:w-auto">
      <a
        href="<?php echo esc_url($home_url); ?>"
        class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-3.5 rounded-md bg-brand-yellow text-brand-dark text-sm sm:text-base font-bold hover:bg-yellow-400 transition-colors shadow-sm"
      >
        Back to Homepage
      </a>
      <a
        href="<?php echo esc_url($services_url); ?>"
        class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-3.5 rounded-md bg-white text-brand-red text-sm sm:text-base font-bold hover:bg-gray-50 transition-colors shadow-sm"
      >
        Explore Our Services
      </a>
    </div>

    <p class="remotiq-partner-thank-you__confirmation mt-8 lg:mt-10 text-xs sm:text-sm text-white/90 w-full leading-relaxed">
      A confirmation has been sent to your email address. If you don't receive it within a few minutes, please check your spam folder or contact us at
      <a href="<?php echo esc_url('mailto:' . $contact_email); ?>" class="underline underline-offset-2 hover:text-white transition-colors">
        <?php echo esc_html($contact_email); ?>
      </a>.
    </p>
  </div>
</section>
