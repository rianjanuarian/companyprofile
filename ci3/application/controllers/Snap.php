<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-P8cM531xM5TsCq1D_ZfIK8lH', 'production' => false);
        $this->load->library('Midtrans');
        $this->load->library('cart');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['cart'] = $this->cart->contents();
        $data['keranjang'] = [];
        foreach ($data['cart'] as $a) {
            $data['keranjang'][] = ['id' => $a['id'], 'harga' => $a['price']];
        }
        $this->load->view('user/snap', $data);
    }
    public function token()
    {
        $data['cart'] = $this->cart->contents();
        $total = 0;
        foreach ($data['cart'] as $b) {
            $total += $b['subtotal'];
        }
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total + $this->input->post('pengiriman'), // no decimal allowed for creditcard
        );
        $data['keranjang'] = [];
        foreach ($data['cart'] as $a) {
            $data['keranjang'][] = [
                'id' => $a['id'],
                'price' => $a['price'],
                'quantity' => $a['qty'],
                'name' => $a['name']

            ];
        }
        $item2_details = array(
            'id' => 'a2',
            'price' => 20000,
            'quantity' => 2,
            'name' => "Orange"
        );
        // Optional
        $item_details = array($data['keranjang'], $item2_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        // $shipping_address = array(
        //     'first_name'    => $this->session->userdata('nama'),
        //     'address'       => $this->input->post('alamat'),
        //     'city'          => $this->input->post('kabupaten'),
        //     'postal_code'   => $this->input->post('kodepos'),
        //     'phone'         => $this->session->userdata('nomor_hp'),
        //     'country_code'  => 'IDN'
        // );

        // Optional
        $customer_details = array(
            'first_name'    => $this->session->userdata('nama'),
            'email'         => $this->session->userdata('email'),
            'phone'         => $this->session->userdata('nomor_hp'),
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 2
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        print_r($result);
        echo '</pre>';
    }
    public function status($id)
    {
        echo 'test get status </br>';
        print_r($this->midtrans->status($id));
    }
}
