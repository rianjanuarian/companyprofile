<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-XvmRg2reNohI04V1"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <form id="payment-form" method="post" action="<?= base_url('Checkout/insert') ?>">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
        <input type="hidden" name="kabupaten" value="<?= $this->input->post('nama_kabupaten') ?>" id="kabupaten">
        <input type="hidden" name="kodepos" value="<?= $this->input->post('kodepos') ?>" id="kodepos">
        <input type="hidden" name="alamat" value="<?= $this->input->post('alamat') ?>" id="alamat">
        <input type="hidden" name="pengiriman" id="pengiriman" value="<?= $this->input->post('pengiriman') ?>">
    </form>


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        $(document).ready(function() {
            var kabupaten = $("#kabupaten").val();
            var kodepos = $("#kodepos").val();
            var pengiriman = $("#pengiriman").val();
            console.log(pengiriman);
            $.ajax({
                type: "POST",
                url: '<?= site_url() ?>/snap/token',
                data: {
                    pengiriman: pengiriman
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //     //resultType.innerHTML = type;
                        //     //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>