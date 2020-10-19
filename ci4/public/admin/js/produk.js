$(document).ready(function () {
  tampil_produk();
    function notif(isi) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Berhasil '+isi + ' Data',
      })
    }
  $('#export').click(function (){
notif('halo');
  })
    //Simpan Barang
    $("#tombol-tambah").on("click", function () {
      var nama_produk = $("#nama_produk").val();
      var kategori =  $("#kategori").val();
      var merk =  $("#merk").val();
      var stok = $("#stok").val();
      var harga = $("#harga").val();
      $.ajax({
        type: "POST",
        url: "/admin/Produk/add",
        dataType: "JSON",
        data: {
          nama_produk: nama_produk,
          kategori :kategori,
          merk : merk,
          stok: stok,
          harga: harga,
        },
        success: function (data) {
          $("#nama_produk").val("");
        $("#kategori").val("");
      $("#merk").val("");
       $("#stok").val("");
     $("#harga").val("");
     $("#tambah").modal("hide");
          notif('Tambah');
          tampil_produk();
        },
      });
      return false;
    });
    // get update
    $("#mydata").on("click", ".item_edit", function () {
      var id = $(this).attr("data");
      $.ajax({
        type: "GET",
        url: "/admin/produk/getproduk",
        dataType: "JSON",
        data: { id: id },
        success: function (data) {
          console.log(data);
          for (i = 0; i < 1; i++) {
            $("#modaledit").modal("show");
            $("#nama_produk1").val(data[i].nama_produk);
            $("#kategori1").val(data[i].kode_kategori);
            $("#merk1").val(data[i].kode_merk);
            // $("#kategori1").append("<option selected value='" + data[i].kode_kategori + "'>" + data[i].nama_kategori + "</option>");
            $("#stok1").val(data[i].stok);
            $("#harga1").val(data[i].harga);
            $('#tombol-update').attr('data',data[i].kode_produk)
          }
        },
      });
      return false;
    });
  
    //Update produk
    $("#tombol-update").on("click", function () {
      var kode_produk = $("#tombol-update").attr('data');
      var nama_produk = $("#nama_produk1").val();
      var kategori =  $("#kategori1").val();
      var merk =  $("#merk1").val();
      var stok = $("#stok1").val();
      var harga = $("#harga1").val();
      $.ajax({
        type: "POST",
        url: "/admin/produk/updateproduk",
        dataType: "JSON",
        data: {
          kode_produk :kode_produk,
          nama_produk: nama_produk,
          kategori :kategori,
          merk : merk,
          stok: stok,
          harga: harga,
        },
        success: function (data) {
          $("#modaledit").modal("hide");
          notif("update");
          tampil_produk();
        },
      });
      return false;
    });

    //Hapus produk
    $("#mydata").on("click", ".item_hapus", function () {
      var id = $(this).attr("data");
      $("#modalhapus").modal("show");
      $("#tombol-hapus").attr("data", id);
    });
  
    $("#tombol-hapus").on("click", function () {
      var kode = $(this).attr("data");
      $.ajax({
        type: "POST",
        url: "/admin/Produk/hapus",
        dataType: "JSON",
        data: { kode: kode },
        success: function (data) {
          $("#modalhapus").modal("hide");
          notif('Hapus')
          tampil_produk();
        },
      });
      return false;
    });
    function tampil_produk() {
      $('#mydata').DataTable({

          serverSide: true,
          bDestroy: true,
          responsive: true,
          ajax: {
              url: "/admin/Produk/tampil_produk",
              type: "POST",
              data: {},
          },
          columnDefs: [{
                  targets: [0, -1],
                  orderable: false,
              },
              {
                  width: "1%",
                  targets: [0, -1],
              },
              {
                  className: "dt-nowrap",
                  targets: [-1],
              }
          ],
  
      });
  }
  });
  