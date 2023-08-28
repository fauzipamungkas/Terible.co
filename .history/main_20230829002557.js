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

  $.ajax({
    url: "dataekspedisi.php",
    type: "post",
    success: function (data_ekspedisi) {
      $("select[name=kurir]").html(data_ekspedisi);
    },
  });

  $("select[name=kurir").on("change", function () {
    var nama_ekpedisi = $("select[name=kurir").val();
    var datakota = $("option:selected", "select[name=kota").attr("id_kota");
    var total_berat = $("input[name=totalberat]").val();
    $.ajax({
      url: "datapaket.php",
      type: "post",
      data: "ekspedisi=" + nama_ekpedisi + "&kota=" + datakota + "&berat=" + total_berat,
      success: function (data_paket) {
        $("select[name=paket]").html(data_paket);
      },
    });
  });

  $("select[name=kota]").on("change", function () {
    var prov = $("option:selected", this).attr("provinsi");
    var dist = $("option:selected", this).attr("kota");
    var type = $("option:selected", this).attr("type_kota");
    var pos = $("option:selected", this).attr("kode_pos");
    $("input[name=provinsi]").val(prov);
    $("input[name=kota]").val(dist);
    $("input[name=type_kota]").val(type);
    $("input[name=kode_pos]").val(pos);
  });

  $("select[name=paket]").on("change", function () {
    var papet = $("option:selected", this).attr("paket");
    var ongkir = $("option:selected", this).attr("ongkir");
    var etd = $("option:selected", this).attr("etd");
    $("input[name=paket]").val(papet);
    $("input[name=onkir]").val(ongkir);
    $("input[name=estimasi]").val(etd);

});
