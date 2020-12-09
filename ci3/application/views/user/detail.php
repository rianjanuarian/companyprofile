<section class="mb-5" id="detail" style="margin-top: 10%;">
    <div class="container-fluid p-5">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card" id="invoice">
                    <div class="card-header">Invoice
                        <strong><?= $penerima[0]->kode_penjualan; ?></strong>
                        <button class="btn btn-sm btn-secondary float-right mr-1 d-print-none" id="print" data-abc="true">
                            <i class="fa fa-print"></i> Print</button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3">To:</h6>
                                <div>
                                    <strong><?= $penerima[0]->nama; ?></strong>
                                </div>
                                <div><?= $penerima[0]->alamat; ?></div>
                                <div><?= $penerima[0]->kabupaten; ?>,<?= $penerima[0]->kode_pos; ?></div>
                                <div>Email: <?= $penerima[0]->email; ?></div>
                                <div>Hp: <?= $penerima[0]->nomor_hp; ?></div>
                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice
                                    <strong><?= $penerima[0]->kode_penjualan; ?></strong>
                                </div>
                                <div><?= $penerima[0]->tanggal; ?></div>
                                <div>Status: <?= $penerima[0]->tanggal; ?></div>
                                <div>Payment Status : <?= $payment->transaction_status; ?></div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th class="center">Quantity</th>
                                        <th class="right">Unit Cost</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($item as $index => $items) { ?>
                                        <tr>
                                            <td class="center"><?= $index + 1; ?></td>
                                            <td class="left"><?= $items->nama_produk; ?></td>
                                            <td class="center"><?= $items->jumlah; ?></td>
                                            <td class="right"><?= $items->harga; ?></td>
                                            <td class="right"><?= $items->harga * $items->jumlah; ?></td>
                                        </tr>
                                        <?php $total += $items->harga * $items->jumlah; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"></div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right"><?= $total; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="right"><?= $penerima[0]->total - $total; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong><?= $penerima[0]->total; ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#print').click(function() {
            var restorepage = document.body.innerHTML;
            var printcontent = $('#invoice').html();
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        })
    });

    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>