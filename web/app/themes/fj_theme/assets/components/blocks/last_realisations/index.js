import './styles.pcss'
import Swiper, { Navigation, Autoplay } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

Swiper.use([Navigation, Autoplay]);

const selectors = {
    slider: '[js-reals-slider]',
    container: '[js-reals]',
    next: '[js-slider-next]',
    prev: '[js-slider-prev]',
};

/**
 * Realisations slider
 * @type {Swiper}
 */
const sliderContainer = document.querySelector(selectors.container);

if (sliderContainer) {
    const realisationsSlider = new Swiper(selectors.slider, {
        slidesPerView: 'auto',
        spaceBetween: 24,
        navigation: {
            nextEl: sliderContainer.querySelector(selectors.next),
            prevEl: sliderContainer.querySelector(selectors.prev),
        },
    });
}

