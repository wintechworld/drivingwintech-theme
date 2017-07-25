(function ($) {
  $(function () {

    var slideWidth = $('.schedule-slider ul li').width();
    var slideHeight = $('.schedule-slider ul li').height();
    // var slideCount = $('.schedule-slider ul li').length;
    // var nextArrows = $('.control_prev').width();
    
    // $('.schedule-slider ul').css({ padding: nextArrows });
    $('.schedule-slider ul').css({ height: slideHeight });
    $('.schedule-slider ul li:last-child').prependTo('.schedule-slider ul');

    function moveLeft() {
      $('.schedule-slider ul').animate({
        left: + slideWidth
      }, 400, function () {
          $('.schedule-slider ul li:last-child').prependTo('.schedule-slider ul');
          $('.schedule-slider ul').css('left', '');
        });
      }

    function moveRight() {
      $('.schedule-slider ul').animate({
          left: - slideWidth
      }, 400, function () {
          $('.schedule-slider ul li:first-child').appendTo('.schedule-slider ul');
          $('.schedule-slider ul').css('left', '');
        });
    }

    $('.control_prev').click(function () {
      moveLeft();
    });

    $('.control_next').click(function () {
      moveRight();
    });

  });
})(jQuery);