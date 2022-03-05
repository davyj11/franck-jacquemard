"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["components/blocks/last_realisations/index"],{

/***/ "./assets/components/blocks/last_realisations/index.js":
/*!*************************************************************!*\
  !*** ./assets/components/blocks/last_realisations/index.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_pcss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles.pcss */ "./assets/components/blocks/last_realisations/styles.pcss");
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! swiper */ "./node_modules/swiper/swiper.esm.js");
/* harmony import */ var swiper_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! swiper/css */ "./node_modules/swiper/swiper.min.css");
/* harmony import */ var swiper_css_navigation__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! swiper/css/navigation */ "./node_modules/swiper/modules/navigation/navigation.min.css");




swiper__WEBPACK_IMPORTED_MODULE_1__["default"].use([swiper__WEBPACK_IMPORTED_MODULE_1__.Navigation, swiper__WEBPACK_IMPORTED_MODULE_1__.Autoplay]);
var selectors = {
  slider: '[js-reals-slider]',
  container: '[js-reals]',
  next: '[js-slider-next]',
  prev: '[js-slider-prev]'
};
/**
 * Realisations slider
 * @type {Swiper}
 */

var sliderContainer = document.querySelector(selectors.container);

if (sliderContainer) {
  var realisationsSlider = new swiper__WEBPACK_IMPORTED_MODULE_1__["default"](selectors.slider, {
    slidesPerView: 'auto',
    spaceBetween: 24,
    navigation: {
      nextEl: sliderContainer.querySelector(selectors.next),
      prevEl: sliderContainer.querySelector(selectors.prev)
    }
  });
}

/***/ }),

/***/ "./assets/components/blocks/last_realisations/styles.pcss":
/*!****************************************************************!*\
  !*** ./assets/components/blocks/last_realisations/styles.pcss ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_swiper_modules_navigation_navigation_min_css-node_modules_swiper_swiper_-798489"], () => (__webpack_exec__("./assets/components/blocks/last_realisations/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29tcG9uZW50cy9ibG9ja3MvbGFzdF9yZWFsaXNhdGlvbnMvaW5kZXguanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUVBQSxrREFBQSxDQUFXLENBQUNDLDhDQUFELEVBQWFDLDRDQUFiLENBQVg7QUFFQSxJQUFNRSxTQUFTLEdBQUc7QUFDZEMsRUFBQUEsTUFBTSxFQUFFLG1CQURNO0FBRWRDLEVBQUFBLFNBQVMsRUFBRSxZQUZHO0FBR2RDLEVBQUFBLElBQUksRUFBRSxrQkFIUTtBQUlkQyxFQUFBQSxJQUFJLEVBQUU7QUFKUSxDQUFsQjtBQU9BO0FBQ0E7QUFDQTtBQUNBOztBQUNBLElBQU1DLGVBQWUsR0FBR0MsUUFBUSxDQUFDQyxhQUFULENBQXVCUCxTQUFTLENBQUNFLFNBQWpDLENBQXhCOztBQUVBLElBQUlHLGVBQUosRUFBcUI7QUFDakIsTUFBTUcsa0JBQWtCLEdBQUcsSUFBSVosOENBQUosQ0FBV0ksU0FBUyxDQUFDQyxNQUFyQixFQUE2QjtBQUNwRFEsSUFBQUEsYUFBYSxFQUFFLE1BRHFDO0FBRXBEQyxJQUFBQSxZQUFZLEVBQUUsRUFGc0M7QUFHcERDLElBQUFBLFVBQVUsRUFBRTtBQUNSQyxNQUFBQSxNQUFNLEVBQUVQLGVBQWUsQ0FBQ0UsYUFBaEIsQ0FBOEJQLFNBQVMsQ0FBQ0csSUFBeEMsQ0FEQTtBQUVSVSxNQUFBQSxNQUFNLEVBQUVSLGVBQWUsQ0FBQ0UsYUFBaEIsQ0FBOEJQLFNBQVMsQ0FBQ0ksSUFBeEM7QUFGQTtBQUh3QyxHQUE3QixDQUEzQjtBQVFIOzs7Ozs7Ozs7OztBQzdCRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9jb21wb25lbnRzL2Jsb2Nrcy9sYXN0X3JlYWxpc2F0aW9ucy9pbmRleC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY29tcG9uZW50cy9ibG9ja3MvbGFzdF9yZWFsaXNhdGlvbnMvc3R5bGVzLnBjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0ICcuL3N0eWxlcy5wY3NzJ1xuaW1wb3J0IFN3aXBlciwgeyBOYXZpZ2F0aW9uLCBBdXRvcGxheSB9IGZyb20gJ3N3aXBlcic7XG5pbXBvcnQgJ3N3aXBlci9jc3MnO1xuaW1wb3J0ICdzd2lwZXIvY3NzL25hdmlnYXRpb24nO1xuXG5Td2lwZXIudXNlKFtOYXZpZ2F0aW9uLCBBdXRvcGxheV0pO1xuXG5jb25zdCBzZWxlY3RvcnMgPSB7XG4gICAgc2xpZGVyOiAnW2pzLXJlYWxzLXNsaWRlcl0nLFxuICAgIGNvbnRhaW5lcjogJ1tqcy1yZWFsc10nLFxuICAgIG5leHQ6ICdbanMtc2xpZGVyLW5leHRdJyxcbiAgICBwcmV2OiAnW2pzLXNsaWRlci1wcmV2XScsXG59O1xuXG4vKipcbiAqIFJlYWxpc2F0aW9ucyBzbGlkZXJcbiAqIEB0eXBlIHtTd2lwZXJ9XG4gKi9cbmNvbnN0IHNsaWRlckNvbnRhaW5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3Ioc2VsZWN0b3JzLmNvbnRhaW5lcik7XG5cbmlmIChzbGlkZXJDb250YWluZXIpIHtcbiAgICBjb25zdCByZWFsaXNhdGlvbnNTbGlkZXIgPSBuZXcgU3dpcGVyKHNlbGVjdG9ycy5zbGlkZXIsIHtcbiAgICAgICAgc2xpZGVzUGVyVmlldzogJ2F1dG8nLFxuICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICBuYXZpZ2F0aW9uOiB7XG4gICAgICAgICAgICBuZXh0RWw6IHNsaWRlckNvbnRhaW5lci5xdWVyeVNlbGVjdG9yKHNlbGVjdG9ycy5uZXh0KSxcbiAgICAgICAgICAgIHByZXZFbDogc2xpZGVyQ29udGFpbmVyLnF1ZXJ5U2VsZWN0b3Ioc2VsZWN0b3JzLnByZXYpLFxuICAgICAgICB9LFxuICAgIH0pO1xufVxuXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiU3dpcGVyIiwiTmF2aWdhdGlvbiIsIkF1dG9wbGF5IiwidXNlIiwic2VsZWN0b3JzIiwic2xpZGVyIiwiY29udGFpbmVyIiwibmV4dCIsInByZXYiLCJzbGlkZXJDb250YWluZXIiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJyZWFsaXNhdGlvbnNTbGlkZXIiLCJzbGlkZXNQZXJWaWV3Iiwic3BhY2VCZXR3ZWVuIiwibmF2aWdhdGlvbiIsIm5leHRFbCIsInByZXZFbCJdLCJzb3VyY2VSb290IjoiIn0=