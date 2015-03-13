$(document).ready( function () {

  $('.other').hide()
  $('.current').css('display', 'list-item');

  $('.bigCat .other').click( function(){
    $(this).prependTo('.bigCat');
    $(this).removeClass('other');
    $(this).addClass('current');
    $('.bigCat').children().not(this).addClass('other');
    $('.bigCat').children().not(this).removeClass('current');
    $('.bigCat .current').removeClass('other');

  })

  $('.bigCat .current').click( function(){
    if ($('.bigCat .other').is(":visible")){
      $('.bigCat .other').hide();
    } else {
      $('.bigCat .other').show();
    }
  })

  $('.smallCat .other').click( function(){
    $(this).prependTo('.smallCat');
    $(this).removeClass('other');
    $(this).addClass('current');
    $('.smallCat').children().not(this).addClass('other');
    $('.smallCat').children().not(this).removeClass('current');
    $('.smallCat .current').removeClass('other');

  })

  $('.smallCat .current').click( function(){
    if ($('.smallCat .other').is(":visible")){
      $('.smallCat .other').hide();
    } else {
      $('.smallCat .other').show();
    }
  })

} ) ;
