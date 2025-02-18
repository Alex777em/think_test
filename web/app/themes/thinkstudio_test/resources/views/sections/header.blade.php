<header class="header bg-primary text-white">
  <div class="container mx-auto flex items-center justify-between py-3 gap-4 md:gap-[40px] flex-row">
    <!-- Logo -->
    @if( $logo = get_field('header_logo', 'option') )
      <div class="logo">
        <a href="<?php echo home_url(); ?>">
          <img src="{{ $logo['sizes']['medium'] }}" alt="Site Logo" class="max-h-[50px] md:max-h-[60px]">
        </a>
      </div>
    @endif

    <!-- Search Bar -->
    <div class="hidden md:flex flex-1 max-w-[780px] header-search">
      <input type="search" placeholder="Search for a product"
             class="w-full px-4 py-2 h-[45px] rounded-[3px] bg-white text-[#b8b8b8] focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- User & Cart -->
    <div class="flex items-center space-x-4 md:ml-auto header-right">
      <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account-button">
        <img class="user-icon w-6 h-6 md:w-8 md:h-8" src="{{ asset('../images/user.svg') }}" alt="Profile Icon">
      </a>
      <a href="<?php echo wc_get_cart_url(); ?>"
         class="bg-secondary px-3 py-2 md:px-7 md:py-4 rounded-[3px] flex items-center space-x-2 cart-button">
        <img class="w-4 h-4" src="{{ asset('../images/cart.svg') }}" alt="Cart Icon">
        <span class="cart-label text-sm md:text-base"><?php echo WC()->cart->get_cart_total(); ?></span>
      </a>
    </div>
  </div>
</header>

@include('partials.megamenu')
