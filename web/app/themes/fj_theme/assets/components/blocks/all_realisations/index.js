
import Masonry from 'masonry-layout';


    const masonry = document.querySelector('[js-masonry]');
//const masonryLoading = document.querySelector('[js-masonry-loading]');

new Masonry(masonry, {
        itemSelector: '[js-masonry-item]',
        columnWidth: '[js-sizer]',
        gutter: 0,
        percentPosition: true,
    });
