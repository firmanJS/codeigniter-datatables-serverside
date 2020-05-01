jQuery(document).ready(function () {
  "use strict";
  const dataTable = $('#datatable').DataTable({
    "processing": true,
    "serverSide": true,
    "iDisplayLength": 10,
    "aLengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    "ajax": {
      url: "ajax/requestDataTables",
      type: "post",
      error: function () { // error handling
        $(".datatable-error").html("");
        $("#datatable_processing").css("display", "none");
      }
    }
  });

  // coment this line if used searching global
  $(".dataTables_filter").hide();

  // searching by column
  $(".search-input-text ").keypress(function (e) {
    if (e.which == 13) {
      var i = $(this).attr('data-column'); // getting column index
      var v = $(this).val(); // getting search input value
      dataTable.columns(i).search(v).draw();
    }
  });
  $(".dataTables_info").css('text-align', 'center');
  $("#datatable_paginate").css('text-align', 'center');
})