<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container" style="margin-top: 10%;">
    <?php
    $total = 0;
    foreach ($this->cart->contents() as $a) {
        $total += $a['subtotal'];
    }
    ?>
    <div class="col-xs-2">
        <h4 class="product-name"><strong>Foto</strong></h4>
    </div>
    <div class="col-xs-4">
        <h4 class="product-name"><strong>Nama</strong></h4>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-4 text-center">
            <h4><strong>Harga</strong></h4>
        </div>
        <div class="col-xs-4 text-center">
            <h4><strong>Qty</strong></h4>
        </div>
        <div class="col-xs-2 text-right">
            <h4><strong>Subtotal</strong></h4>
        </div>
        <div class="col-xs-2">
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="panel panel-info">

                <div class="panel-body">
                    <div id="cart">

                    </div>
                </div>
            </div>
            <div class="card p-4 mb-3">
                <form action="<?= base_url('Checkout') ?>" method="post">
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" class="form-control" id="provinsi">
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $a) {
                                ?>
                                    <option value="<?= $a->province_id ?>"><?= $a->province; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="kabupaten">Kabupaten</label>
                            <select name="kabupaten" class="form-control" id="kabupaten">
                                <option value="">--Pilih Kabupaten--</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="kabupaten">Kode Pos</label>
                            <input type="text" required name="kodepos" class="form-control" id="kodepos">
                        </div>
                        <div class="form-group col-3">
                            <label for="kabupaten">Kurir</label>
                            <select name="kurir" class="form-control" id="kurir">
                                <option value="">--Pilih Kurir--</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleFormControlTextarea1">Detail Alamat</label>
                            <textarea class="form-control" name="alamat" required rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="row" id="servis">

                            </div>
                        </div>
                    </div>
            </div>

            <div class="panel-footer">
                <div class="row text-center">
                    <div class="col-xs-3">
                        <a href="#" id="lanjut" type="button" class="btn btn-success btn-block">
                            continue shopping
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <h4 class="text-right">Total : Rp. <strong id="total"></strong></h4>
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" role="button" class="btn btn-success btn-block">
                            Checkout
                        </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="p-5"></div>
<script>
    $(document).ready(function() {
        $('#cart').load("<?php echo base_url(); ?>cart/load_cart");
        $('.row').on('blur', "#qty", function() {
            var row = $(this).data('row');
            var qty = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('cart/update_cart') ?>",
                dataType: "JSON",
                data: {
                    row: row,
                    qty: qty
                },
                success: function(data) {
                    console.log(data);
                    $('#cart').empty();
                    $('#cart').append(data);
                },
            });
        });
        $('.row').on('click', '#hapus', function() {
            var row = $(this).data("row"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?= base_url(); ?>cart/hapus_cart",
                method: "POST",
                data: {
                    row: row
                },
                success: function(data) {
                    $('#cart').html(data);
                }
            });
        })
        $("#provinsi").change(function() {
            $("#kabupaten").empty();
            var id_provinsi = $(this).val();
            $.ajax({
                url: "<?= base_url('Cart/get_city'); ?>",
                type: 'GET',
                data: {
                    'id_province': id_provinsi
                },
                dataType: 'json',
                success: function(data) {
                    var results = data["rajaongkir"]["results"];
                    // console.log(results);
                    for (i = 0; i < results.length; i++) {
                        $("#kabupaten").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]["city_name"]
                        }));
                    }
                }
            })
        })
        $("#kurir").change(function() {
            var kurir = $(this).val()
            var id_origin = $("#kabupaten").val();
            var provinsi = $("#provinsi  option:selected").text();
            var kabupaten = $("#kabupaten option:selected").text();
            $('#servis').empty();
            $.ajax({
                url: "<?= base_url('Cart/get_cost'); ?>",
                type: 'POST',
                data: {
                    'origin': id_origin,
                    'kurir': kurir
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    console.log(results);
                    for (var i = 0; i < results.length; i++) {
                        $("#servis").append($("<div class='col-3'>" + "<input type='radio'" + "value='" + results[i]["cost"][0]["value"] + "'name='pengiriman' aria-label='Radio button for following text input'>" +
                            results[i]["service"] + " : " + results[i]["cost"][0]["value"] + "</div>"));
                    }
                    $("#servis").append("<input type='text' name='nama_kabupaten' hidden value='" + kabupaten + "'>" + "<input type='text' hidden name='nama_provinsi' value='" + provinsi + "'>");
                }
            })
        })
        $("#servis").click(function() {
            var radioValue = $("input[name='pengiriman']:checked").val();
            var total = <?= $total; ?>;
            var jumlah = parseInt(radioValue) + parseInt(total);
            $("#total").empty();
            $("#total").append(jumlah);
        })
    });
</script>