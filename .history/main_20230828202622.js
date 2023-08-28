// raja ongkir
$(document).ready(function () {
  $.ajax({
    url: "data_provinsi.php",
    type: "post",
    success: function (data_provinsi) {
      $("select[name=]").html(data_provinsi);
    },
  });
});
