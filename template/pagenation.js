$(document).ready{
   $('#page-selection').bootpag({
        total: <?php echo json_encode($pn); ?>,
        page: 1,
        maxVisible: 10,
        leaps: true,
        firstLastUse: true,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(event, num){
      for (i = 1; i <=<?php echo json_encode($pn); ?>; i++) {
          //text = "page"+num;
          $(".page" + i).hide();
      }
      var page ="page"+num;
      //$("." + page).css("display", "inline");
      $("." + page).show();
  }); 
}

