<?php
class Cart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['produk'] = $this->M_admin->getdata('produk');
        $this->load->view('user/header');
        $this->load->view('user/cart', $data);
        $this->load->view('user/footer');
    }
    function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $a) {
            $no++;
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
            <div class="col-xs-2 text-right">
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
}
