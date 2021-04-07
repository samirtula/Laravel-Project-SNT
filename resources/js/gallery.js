$('.gallery__images .item').on('click', function (e) {
    e.preventDefault();
    let imgPath =  $(this).css('background-image');
    let pathStart = imgPath.indexOf('uploads');
    let imgPathCSS = imgPath.substring(pathStart,imgPath.length-2);
    $('.popup__image').attr("src",imgPathCSS);
    let popup = $('.popup');
    popup.toggle('slow');

});
$('.popup__close-button').on('click', function (e) {
    e.preventDefault();
    let popup = $('.popup');
    popup.toggle('fast');
});
