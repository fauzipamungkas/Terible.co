// raja ongkir
$(document).ready(function () {
  $.ajax({
    url: "dataprovinsi.php",
    type: "post",
    success: function (data_provinsi) {
      $("select[name=provinsi]").html(data_provinsi);
    },
  });
  $("select[name=provinsi]").on("change", function () {
    var id_provinsi = $("option:selected", this).attr("id_provinsi");
    $.ajax({
      url: "datakota.php",
      type: "post",
      data: "id_provinsi=" + id_provinsi,
      success: function (data_kota) {
        $("select[name=kota]").html(data_kota);
      },
    });
  });
});
