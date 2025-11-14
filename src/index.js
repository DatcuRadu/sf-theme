import 'alpinejs';
// import './styles.css';
import './styles.scss';
// import '@fortawesome/fontawesome-free/js/all.js'; 
import '@fortawesome/fontawesome-free/css/all.css';

document.addEventListener("DOMContentLoaded", function () {
  const mainMenu = document.querySelector(".sf-slide-menu__menu");
  const menuItems = document.querySelectorAll(".sf-slide-menu__item");

  menuItems.forEach(item => {
    const subMenu = item.querySelector(".sf-slide-menu__sub-menu");
    if (subMenu) {
      item.querySelector(".sf-slide-menu__item__link").addEventListener("click", function (event) {
        event.preventDefault();

        const activeSubMenus = document.querySelectorAll(".sf-slide-menu__sub-menu.active");
        const activeItems = document.querySelectorAll(".sf-slide-menu__item.is-active");

        activeSubMenus.forEach(activeSubMenu => activeSubMenu.classList.remove("active"));
        activeItems.forEach(activeItem => activeItem.classList.remove("is-active"));

        subMenu.classList.add("active");
        item.classList.add("is-active");
        mainMenu.classList.add("is-active");

        mainMenu.style.height = `${subMenu.scrollHeight}px`;

      });

      const backButton = subMenu.querySelector(".sf-slide-menu__back");

      if (backButton) {
        backButton.addEventListener("click", function (event) {
          event.preventDefault();

          subMenu.classList.remove("active");
          item.classList.remove("is-active");

          if (!item.querySelector(".sf-slide-menu__sub-menu.active")) {
            mainMenu.classList.remove("is-active");
          }

          mainMenu.style.height = 'auto';
        });
      }
    }
  });
});


// function initHamburgerMenu(menuSelector, buttonSelector, wrapperSelector, overlaySelector) {
//   const menu = document.querySelector(menuSelector);
//   const wrapper = document.querySelector(wrapperSelector);
//   const buttons = document.querySelectorAll(buttonSelector);
//   const overlay = document.querySelector(overlaySelector);

//   // Iterează prin fiecare set de elemente și aplică funcționalitatea
//   buttons.forEach((button, index) => {
//     function toggleMenu() {
//       // const isExpanded = button.getAttribute('aria-expanded') === 'true';
//       // button.setAttribute('aria-expanded', !isExpanded);
//       // button.classList.toggle('active');
//       wrapper.classList.toggle('active');
//       menu.classList.toggle('active');
//       overlay.classList.toggle('hidden');
//       console.log('test')
//     }

//     button.addEventListener('click', toggleMenu);
//     overlay.addEventListener('click', toggleMenu);
//   });
// }

// initHamburgerMenu('.sf-sidebar-nav', '.sf-hamburger', '.sf-main-wrapper', '.sf-main-overlay');

function initHamburgerMenu(menuSelector, buttonSelector, wrapperSelector, overlaySelector, buttonClose) {
  const menu = document.querySelector(menuSelector);
  const wrapper = document.querySelector(wrapperSelector);
  const buttons = document.querySelectorAll(buttonSelector);
  const overlay = document.querySelector(overlaySelector);
  const btnClose = document.querySelector(buttonClose);

  function openMenu(activeButton) {
    buttons.forEach(button => {
      button.setAttribute('aria-expanded', 'true');
      button.classList.add('active');
    });
    wrapper.classList.add('active');
    menu.classList.add('active');
    overlay.classList.remove('hidden');
  }

  function closeMenu() {
    buttons.forEach(button => {
      button.setAttribute('aria-expanded', 'false');
      button.classList.remove('active');
    });
    wrapper.classList.remove('active');
    menu.classList.remove('active');
    overlay.classList.add('hidden');
  }

  buttons.forEach(button => {
    button.addEventListener('click', openMenu);
  });

  overlay.addEventListener('click', closeMenu);
  btnClose.addEventListener('click', closeMenu);
}

initHamburgerMenu('.sf-sidebar-nav', '.sf-hamburger', '.sf-main-wrapper', '.sf-main-overlay', '#sf-close-sidebar');


const cartButton = document.getElementById('cartButton');
const cartDropdown = document.getElementById('cartDropdown');
const closeButton = document.getElementById('closeButton');
const cartOverlay = document.getElementById('cartOverlay');

function openCart() {
  cartDropdown.classList.add('active');
  cartOverlay.classList.remove('hidden');
}

function closeCart() {
  cartDropdown.classList.remove('active');
  cartOverlay.classList.add('hidden');
}

cartButton.addEventListener('click', openCart);
closeButton.addEventListener('click', closeCart);

cartOverlay.addEventListener('click', closeCart);

document.addEventListener('click', (event) => {
  if (!cartDropdown.contains(event.target) && !cartButton.contains(event.target) && !cartOverlay.contains(event.target)) {
    closeCart();
  }
});
