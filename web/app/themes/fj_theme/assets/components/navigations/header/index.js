import Menu from 'adeliom-menu-js';
import "./styles.pcss"

/**
 * Menu initialization
 */
const settings = {
    stickyScrollTop: true,
    closeMenuOnScroll: true,
    responsiveBreakpoint: 1024
}

const menu = new Menu(settings);
menu.init();
