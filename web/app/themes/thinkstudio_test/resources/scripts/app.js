import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {


  const megaMenuButton = document.querySelector('#mega-menu-button');
  const megaMenuContent = document.querySelector('#mega-menu-content');

  // Toggle megamenu visibility
  if (megaMenuButton && megaMenuContent) {
    megaMenuButton.addEventListener('click', function() {
      megaMenuContent.classList.toggle('is-active');
    });
  }

  // Change featured image on hover
  document.querySelectorAll('#mega-menu .menu-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
      const featuredImageUrl = item.getAttribute('data-featured-image');
      const featuredImageElement = document.querySelector('#mega-menu .featured-image img');

      if (featuredImageUrl && featuredImageElement) {
        featuredImageElement.src = featuredImageUrl;
        featuredImageElement.style.display = 'block';
      } else if (featuredImageElement) {
        featuredImageElement.src = '';
        featuredImageElement.style.display = 'none';
      }
    });
  });

  /*Mobile SubMenu Accordion*/
  document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth <= 768) {
      const menuItems = document.querySelectorAll("#mega-menu .has-children > a");

      menuItems.forEach((item) => {
        item.addEventListener("click", function (e) {
          e.preventDefault();

          const submenu = this.nextElementSibling;
          const arrow = this.querySelector(".arrow");

          if (submenu.style.maxHeight) {
            submenu.style.maxHeight = null;
            submenu.classList.remove("opacity-100", "visible", "py-2");
            arrow.classList.remove("rotate-90");
          } else {
            submenu.style.maxHeight = submenu.scrollHeight + "px";
            submenu.classList.add("opacity-100", "visible");
            arrow.classList.add("rotate-90");
          }
        });
      });
    }
  });





});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
