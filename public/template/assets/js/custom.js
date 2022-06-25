/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

'use strict';

// active menu
var path = location.pathname.split('/');
var url = location.origin + '/' + path[1];

$('ul.sidebar-menu li a').each(function () {
  if ($(this).attr('href').indexOf(url) !== -1) {
    $(this).parent().addClass('active').parent().parent('li').addClass('active');
  }
});

//data tables
$(document).ready(function () {
  $('#table1').DataTable();
});

//modal confirmation
function submitDel(id) {
  $('#del-' + id).submit();
}
//modal confirmation group/trash
function submitDelAll(id) {
  $('#delAll-' + id).submit();
}

//modal confirmation logout
function returnLogout() {
  var link = $('#logout').attr('href');
  $(location).attr('href', link);
}
