/* Theme Name: Vinaquips*/

(function($){

  //endUpload
  $("#btnAdd").bind("click", function () {
    var div = $("<div class='subPlace' />");
    div.html(GetDynamicTextBox(""));
    $("#TextBoxContainer").append(div);
  });
  //
  $("body").on("click", ".remove", function () {
    $(this).closest("div").remove();
  });
  function GetDynamicTextBox(value) {
    return '<input name="morePlace" id="addPriceStep" class="select" required="required"> &nbsp;' +
    '<i class="fa fa-remove remove"></i>'
  }
  //end
  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function() {
        if($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });


  //end
  $('#addPriceStep').on('change', function () {
    var prices = [];
    prices[1] = 500.00;
    prices[2] = 600.00;
    prices[3] = 700.00;
    prices[4] = 800.00;
    prices[5] = 900.00;
    prices[6] = 1000.00
    var key = $('#addPriceStep option:selected').val();
    var oldPrice = 800.00;
    $('#offerPrice0Price').val(prices[parseInt(key,10)] + oldPrice);
  });
  //end
  var owl = $("#slidePartner");
 
  owl.owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    autoplay: true,
    autoPlay : 5000,
    items : 6, //10 items above 1000px browser width
    rewindNav: false,
    navigationText: false,
    pagination: false
  });
  var owlNew = $("#slideProductNew");
  owlNew.owlCarousel({
    autoplay: true,
    autoPlay : 5000,
    items: 1,
    pagination: false,
    navigationText: true,
  });
  jQuery(document).ready(function() {
    //var;
  });
})(jQuery);


//addFiled