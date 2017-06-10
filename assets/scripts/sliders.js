$(function() {
    if ($('.Wallop').length > 0) {
        var selector = document.querySelector('.Wallop');
        var slider = new Wallop(selector, {
            buttonPreviousClass: 'Wallop-buttonPrevious',
            buttonNextClass: 'Wallop-buttonNext',
            carousel: true
        });
    }
});
