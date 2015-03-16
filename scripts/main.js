$(document).ready( function () {

  // ----------------------------------------------- Récupérer la catégorie courante dans l'url
  var full_url = document.URL; // Get current url
  var url_array = full_url.split('?') // Split the string into an array with / as separator
  var ids = url_array[url_array.length-1];  // Get the last part of the array (-1)

  var url_array2 = ids.split('&') // Split the string into an array with / as separator
  var id1 = url_array2[url_array2.length-2];
  var id2 = url_array2[url_array2.length-1];

  id1 = '?' + id1;
  id2 = '&' + id2;

  // ----------------------------------------------- MENU
  // afficher la catégorie courante
  if ($('.bigCat').children('li').children('a[href="' + id1 + id2 + '"]') !== false){
    $('.bigCat').children('li.current').addClass('other').removeClass('current');
    $('.bigCat').children('li').children('a[href="?go=all&sub=all"]').parent('li').addClass('other').removeClass('current');
    $('.bigCat').children('li').children('a[href="' + id1 + '&sub=all"]').parent('li').prependTo('.bigCat');
    $('.bigCat').children('li').children('a[href="' + id1 + '&sub=all"]').parent('li').addClass('current').removeClass('other');
    $('.bigCat').children('li').children('a[href="' + id1 + '&sub=all"]').removeAttr('href');
  }

  // afficher la sous catégorie courante
  if ($('.smallCat').children('li').children('a[href="' + id1 + id2 + '"]') !== false){
    $('.smallCat').children('li.current').addClass('other').removeClass('current');
    $('.smallCat').children('li').children('a[href="?go=all&sub=all"]').parent('li').addClass('other').removeClass('current');
    $('.smallCat').children('li').children('a[href="' + id1 + id2 + '"]').parent('li').prependTo('.smallCat');
    $('.smallCat').children('li').children('a[href="' + id1 + id2 + '"]').parent('li').addClass('current').removeClass('other');
    $('.smallCat').children('li').children('a[href="' + id1 + id2 + '"]').removeAttr('href');
  }


  // exception pour la vue globale
  if (id1 == '?go=all'){
    $('.bigCat').children('li').children('a[href="?go=all&sub=all"]').parent('li').addClass('current').removeClass('other');
    $('.bigCat').children('li').children('a[href="?go=all&sub=all"]').removeAttr('href');
  }

  // exception pour la vue globale (sous catégories)
  if (id2 == '&sub=all'){
    $('.smallCat').children('li').children('a[href="' + id1 + '&sub=all"]').parent('li').addClass('current').removeClass('other');
    $('.smallCat').children('li').children('a[href="' + id1 + '&sub=all"]').removeAttr('href');
  }


  // Cacher le reste
  $('.menu').children('ul').children('.other').hide()

  // afficher/cacher le menu
  $('.bigCat .current').click( function(){
    if ($('.bigCat .other').is(":visible")){
      $('.bigCat .other').hide();
    } else {
      $('.bigCat .other').show();
    }
  })

  // afficher/cacher le sous menu
  $('.smallCat .current').click( function(){
    if ($('.smallCat .other').is(":visible")){
      $('.smallCat .other').hide();
    } else {
      $('.smallCat .other').show();
    }
  })

  //cacher sous menu si rien dedans
  if ($('.smallCat').children().length < 2){
    $('.smallCat').hide();
    $('.virgule').hide();
  }

} ) ;
