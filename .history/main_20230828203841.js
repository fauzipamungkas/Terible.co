// raja ongkir
$(document).ready(function () {
  $.ajax({
    url: "data_provinsi.php",
    type: "post",
    success: function (data_provinsi) {
      $("select[name=provinsi]").html(data_provinsi);
    },
  });
});
