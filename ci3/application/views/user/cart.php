<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container" style="margin-top: 10%;">
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

                        <div class="row">
                            <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                            </div>
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong>nama</strong></h4>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-4 text-right">
                                    <h6><strong>' . $a['price'] . '</strong></h6>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control input-sm" id="qty" data-subtotal="" data-row="" value="2">
                                </div>
                                <div class="col-xs-2 text-right">
                                    <h6><strong>50000</strong></h6>
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" id="hapus" data-row="" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row text-center">
                    <div class="col-xs-3">
                        <a href="<?= base_url('pelanggan/pemesanan/proses_beli') ?>" type="button" class="btn btn-success btn-block">
                            continue shopping
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <h4 class="text-right">Total : Rp. <strong id="total">760</strong></h4>
                    </div>
                    <div class="col-xs-3">
                        <a href="<?= base_url('pelanggan/pemesanan/proses_beli') ?>" type="button" class="btn btn-success btn-block">
                            Checkout
                        </a>
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

                },
            });
            $('#cart').load("<?php echo base_url(); ?>cart/load_cart");
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
        var total = 0;
        var subtotal = $('#qty').data('row');
        console.log(subtotal);
        $('#total').append();
    });
</script>