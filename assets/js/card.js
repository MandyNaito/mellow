$(function () {
    initLoading();
});

//Init Loading
function initLoading() {
    $('[data-toggle="cardloading"]').on('click', function () {
        var $loading = $(this).parents('.card').waitMe({
            effect: $(this).data('loadingEffect'),
            text: s_100019,
            bg: 'rgba(255,255,255,0.90)',
            color: '#555'
        });
    });
}