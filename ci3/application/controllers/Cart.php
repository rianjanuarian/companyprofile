<?php
class Cart extends CI_Controller
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "6b72320a1d48d4de1e114a22e5e7432e";
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['produk'] = $this->M_admin->getdata('produk');
        $data['provinsi'] = json_decode($this->rajaongkir('province'))->rajaongkir->results;
        $this->load->view('user/header');
        $this->load->view('user/cart', $data);
        $this->load->view('user/footer');
    }
    function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $a) {
            $no += $a['subtotal'];
            $output .= '<div class="row">
        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
        </div>
        <div class="col-xs-4">
            <h4 class="product-name"><strong>' . $a['name'] . '</strong></h4>
        </div>
        <div class="col-xs-6">
            <div class="col-xs-4 text-right">
                <h6><strong>' . $a['price'] . '</strong></h6>
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control input-sm" id="qty" data-subtotal="' . $a['subtotal'] . '" data-row="' . $a['rowid'] . '" value="' . $a['qty'] . '">
            </div>
            <div class="col-xs-2 text-right subtotal">
                <h6><strong>' . $a['subtotal'] . '</strong></h6>
            </div>
            <div class="col-xs-2">
                <button type="button" id="hapus" data-row="' . $a['rowid'] . '" class="btn btn-link btn-xs">
                    <span class="glyphicon glyphicon-trash"> </span>
                </button>
            </div>
        </div>
    </div>
    <hr>';
        }
        $output .= '<div class ="row">
        <div class="col-6"><h4>Total :</h4></div><div class="float-right col-6"><h4><strong class="float-right">' . $no . '</strong></h4></div></div>';
        return $output;
    }
    function load_cart()
    {
        echo $this->show_cart();
    }
    function update_cart()
    {
        $qty = $this->input->post('qty');
        $row = $this->input->post('row');
        $update = [
            'rowid' => $row,
            'qty' => $qty
        ];
        $this->cart->update($update);
        echo $this->show_cart();
    }
    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
    private function rajaongkir($method, $id_province = null)
    {

        $endPoint = $this->url . $method;

        if ($id_province != null) {
            $endPoint = $endPoint . "?province=" . $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
    private function rajaongkircost($destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . "86" . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 6b72320a1d48d4de1e114a22e5e7432e ",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        return $response;
    }
    public function get_city()
    {
        $id_province = $this->input->get('id_province');
        $data = $this->rajaongkir('city', $id_province);
        echo $data;
    }
    public function get_cost()
    {
        $origin = $this->input->post('origin');
        $kurir = $this->input->post('kurir');
        $data = $this->rajaongkircost($origin, '1000', $kurir);
        echo $data;
    }
}
