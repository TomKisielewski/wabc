
jQuery(document).ready(function(){
  var byRow = jQuery('body').hasClass('home');
  console.log('start height');
  jQuery('#TKMiddlecontent, #TKcontent, #TKfootercontent, #page-wrapper .container').each(function() {
      jQuery(this).children('.columns').matchHeight({
         byRow: byRow
      });
          console.log('WITHIN EQUAL HEIGHT');
  });

});
