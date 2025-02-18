@php use App\Walkers\MegaMenuWalker; @endphp

@if (has_nav_menu('primary_navigation'))
  <div id="mega-menu" class="mega-menu relative">
    {{--Megamenu Top --}}
    <div class="mega-menu-top bg-primary">
      <div class="container mx-auto py-2.5">
        <button id="mega-menu-button" class="mega-menu-button text-white relative pl-5">Products</button>
      </div>
    </div>

    {{--Megamenu Content --}}
    <div id="mega-menu-content" class="mega-menu-content bg-white">
      <div class="container py-4">
        <nav class="mega-menu-nav relative">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation',
    'walker' => new MegaMenuWalker(),
     'menu_class' => 'menu-products', 'echo' => false]) !!}
        </nav>
      </div>
    </div>
  </div>
@endif
