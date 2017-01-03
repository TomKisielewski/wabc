/**
 * NAME: Bootstrap 3 Triple Nested Sub-Menus
 * This script will active Triple level multi drop-down menus in Bootstrap 3.*
 *get ridd off all the crap
 */

jQuery('a.dropdown-toggle').on('click', function(event) {
  jQuery(this).parent().removeClass("open");
  event.stopPropagation();
  var $parent = jQuery(this).parent();
});
