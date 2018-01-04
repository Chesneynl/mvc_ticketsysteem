$( document ).ready(function() {
  var filter = getUrlParameter('filter');

  if ($('.filters').length) {
    if (filter == "support") {
      $('.filter.support').addClass('active');
    }
    else if (filter == "front-end") {
      $('.filter.front-end').addClass('active');
    }
    else if (filter == "back-end") {
      $('.filter.back-end').addClass('active');
    }
  }


  $("#datepicker").datepicker();

});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : sParameterName[1];
      }
  }
};
