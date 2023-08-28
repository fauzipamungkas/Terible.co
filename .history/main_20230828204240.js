// raja ongkir
$(document).ready(function () {
  $.ajax({
    url: "dataprovinsi.php",
    type: "post",
    success: function (dataprovinsi) {
      $("select[name=provinsi]").html(dataprovinsi);
    },
  });
});
