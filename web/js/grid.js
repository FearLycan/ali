//-------------------------------------//
// init Masonry

var $grid = $('.grid').masonry({
    itemSelector: 'none', // select none at first
    columnWidth: '.grid__col-sizer',
    gutter: '.grid__gutter-sizer',
    percentPosition: true,
    stagger: 30,
    // nicer reveal transition
    visibleStyle: {transform: 'translateY(0)', opacity: 1},
    hiddenStyle: {transform: 'translateY(100px)', opacity: 0},
});

// get Masonry instance
var msnry = $grid.data('masonry');

// initial items reveal
$grid.imagesLoaded(function () {
    $grid.removeClass('are-images-unloaded');
    $grid.masonry('option', {itemSelector: '.grid__item'});
    var $items = $grid.find('.grid__item');
    $grid.masonry('appended', $items);
});

//-------------------------------------//
// init Infinte Scroll

if ($('ul.pagination').length) {
    $grid.infiniteScroll({
        path: 'ul.pagination li.next a',
        append: '.grid__item',
        outlayer: msnry,
        status: '.page-load-status',
    });
}

$grid.on( 'append.infiniteScroll', function( event, body, path, items, response ) {
    $('i.fa-heart.like').tooltip({placement: 'bottom',trigger: 'manual'}).tooltip('show');
});
