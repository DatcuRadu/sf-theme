/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@fortawesome/fontawesome-free/css/all.css":
/*!****************************************************************!*\
  !*** ./node_modules/@fortawesome/fontawesome-free/css/all.css ***!
  \****************************************************************/
/***/ (() => {

eval("{throw new Error(\"Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\\nModuleNotFoundError: Module not found: Error: Can't resolve '/Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/css-loader/dist/cjs.js' in '/Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/@fortawesome/fontawesome-free/css'\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/Compilation.js:2029:28\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:1031:13\\n    at eval (eval at create (/Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/tapable/lib/HookCodeFactory.js:31:10), <anonymous>:10:1)\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:432:22\\n    at eval (eval at create (/Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/tapable/lib/HookCodeFactory.js:31:10), <anonymous>:9:1)\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:617:22\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:183:10\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:849:23\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/webpack/lib/NormalModuleFactory.js:1341:5\\n    at /Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/neo-async/async.js:2830:7\");\n\n//# sourceURL=webpack://my-tailwind-alpine-project/./node_modules/@fortawesome/fontawesome-free/css/all.css?\n}");

/***/ }),

/***/ "./node_modules/alpinejs/dist/module.esm.js":
/*!**************************************************!*\
  !*** ./node_modules/alpinejs/dist/module.esm.js ***!
  \**************************************************/
/***/ (() => {

eval("{throw new Error(\"Module build failed: Error: ENOENT: no such file or directory, open '/Users/radudatcu/Downloads/sa/wordpress/wp-content/themes/saffordequipment-shop/node_modules/alpinejs/dist/module.esm.js'\");\n\n//# sourceURL=webpack://my-tailwind-alpine-project/./node_modules/alpinejs/dist/module.esm.js?\n}");

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var alpinejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! alpinejs */ \"./node_modules/alpinejs/dist/module.esm.js\");\nObject(function webpackMissingModule() { var e = new Error(\"Cannot find module './styles.scss'\"); e.code = 'MODULE_NOT_FOUND'; throw e; }());\n/* harmony import */ var _fortawesome_fontawesome_free_css_all_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @fortawesome/fontawesome-free/css/all.css */ \"./node_modules/@fortawesome/fontawesome-free/css/all.css\");\n\n// import './styles.css';\n\n// import '@fortawesome/fontawesome-free/js/all.js'; \n\n\ndocument.addEventListener(\"DOMContentLoaded\", function () {\n  const mainMenu = document.querySelector(\".sf-slide-menu__menu\");\n  const menuItems = document.querySelectorAll(\".sf-slide-menu__item\");\n\n  menuItems.forEach(item => {\n    const subMenu = item.querySelector(\".sf-slide-menu__sub-menu\");\n    if (subMenu) {\n      item.querySelector(\".sf-slide-menu__item__link\").addEventListener(\"click\", function (event) {\n        event.preventDefault();\n\n        const activeSubMenus = document.querySelectorAll(\".sf-slide-menu__sub-menu.active\");\n        const activeItems = document.querySelectorAll(\".sf-slide-menu__item.is-active\");\n\n        activeSubMenus.forEach(activeSubMenu => activeSubMenu.classList.remove(\"active\"));\n        activeItems.forEach(activeItem => activeItem.classList.remove(\"is-active\"));\n\n        subMenu.classList.add(\"active\");\n        item.classList.add(\"is-active\");\n        mainMenu.classList.add(\"is-active\");\n\n        mainMenu.style.height = `${subMenu.scrollHeight}px`;\n\n      });\n\n      const backButton = subMenu.querySelector(\".sf-slide-menu__back\");\n\n      if (backButton) {\n        backButton.addEventListener(\"click\", function (event) {\n          event.preventDefault();\n\n          subMenu.classList.remove(\"active\");\n          item.classList.remove(\"is-active\");\n\n          if (!item.querySelector(\".sf-slide-menu__sub-menu.active\")) {\n            mainMenu.classList.remove(\"is-active\");\n          }\n\n          mainMenu.style.height = 'auto';\n        });\n      }\n    }\n  });\n});\n\n\n// function initHamburgerMenu(menuSelector, buttonSelector, wrapperSelector, overlaySelector) {\n//   const menu = document.querySelector(menuSelector);\n//   const wrapper = document.querySelector(wrapperSelector);\n//   const buttons = document.querySelectorAll(buttonSelector);\n//   const overlay = document.querySelector(overlaySelector);\n\n//   // Iterează prin fiecare set de elemente și aplică funcționalitatea\n//   buttons.forEach((button, index) => {\n//     function toggleMenu() {\n//       // const isExpanded = button.getAttribute('aria-expanded') === 'true';\n//       // button.setAttribute('aria-expanded', !isExpanded);\n//       // button.classList.toggle('active');\n//       wrapper.classList.toggle('active');\n//       menu.classList.toggle('active');\n//       overlay.classList.toggle('hidden');\n//       console.log('test')\n//     }\n\n//     button.addEventListener('click', toggleMenu);\n//     overlay.addEventListener('click', toggleMenu);\n//   });\n// }\n\n// initHamburgerMenu('.sf-sidebar-nav', '.sf-hamburger', '.sf-main-wrapper', '.sf-main-overlay');\n\nfunction initHamburgerMenu(menuSelector, buttonSelector, wrapperSelector, overlaySelector, buttonClose) {\n  const menu = document.querySelector(menuSelector);\n  const wrapper = document.querySelector(wrapperSelector);\n  const buttons = document.querySelectorAll(buttonSelector);\n  const overlay = document.querySelector(overlaySelector);\n  const btnClose = document.querySelector(buttonClose);\n\n  function openMenu(activeButton) {\n    buttons.forEach(button => {\n      button.setAttribute('aria-expanded', 'true');\n      button.classList.add('active');\n    });\n    wrapper.classList.add('active');\n    menu.classList.add('active');\n    overlay.classList.remove('hidden');\n  }\n\n  function closeMenu() {\n    buttons.forEach(button => {\n      button.setAttribute('aria-expanded', 'false');\n      button.classList.remove('active');\n    });\n    wrapper.classList.remove('active');\n    menu.classList.remove('active');\n    overlay.classList.add('hidden');\n  }\n\n  buttons.forEach(button => {\n    button.addEventListener('click', openMenu);\n  });\n\n  overlay.addEventListener('click', closeMenu);\n  btnClose.addEventListener('click', closeMenu);\n}\n\ninitHamburgerMenu('.sf-sidebar-nav', '.sf-hamburger', '.sf-main-wrapper', '.sf-main-overlay', '#sf-close-sidebar');\n\n\nconst cartButton = document.getElementById('cartButton');\nconst cartDropdown = document.getElementById('cartDropdown');\nconst closeButton = document.getElementById('closeButton');\nconst cartOverlay = document.getElementById('cartOverlay');\n\nfunction openCart() {\n  cartDropdown.classList.add('active');\n  cartOverlay.classList.remove('hidden');\n}\n\nfunction closeCart() {\n  cartDropdown.classList.remove('active');\n  cartOverlay.classList.add('hidden');\n}\n\ncartButton.addEventListener('click', openCart);\ncloseButton.addEventListener('click', closeCart);\n\ncartOverlay.addEventListener('click', closeCart);\n\ndocument.addEventListener('click', (event) => {\n  if (!cartDropdown.contains(event.target) && !cartButton.contains(event.target) && !cartOverlay.contains(event.target)) {\n    closeCart();\n  }\n});\n\n\n//# sourceURL=webpack://my-tailwind-alpine-project/./src/index.js?\n}");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;