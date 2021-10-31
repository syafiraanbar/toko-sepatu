<?php

class Sepatu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Sepatu');
    }

    public function viewTemplate($url, $data = null)
    {
        /// Metode untuk memangil template si view Sepatu
        $this->load->view('sepatu/template/head', $data);
        $this->load->view($url, $data);
        $this->load->view('sepatu/template/foot');
    }

    public function index() { $this->viewTemplate('sepatu/index', array('title' => 'Form', 'produk' => $this->Model_Sepatu->getProduk())); }
    public function hasil() 
    {
        $data =   array(
            'title' => 'Hasil',
            'nama'  => $this->input->post('nama'),
            'nomortelp'  => $this->input->post('nomortelp'),
            'produk'  => $this->input->post('produk'),
            'ukuran'  => $this->input->post('ukuran'),
            'harga'  => $this->input->post('harga'),
            'pcs'  => $this->input->post('pcs'),
            'total'  => $this->input->post('total')
        );
        $this->viewTemplate('sepatu/hasil', $data); 
    }

    public function harga()
    {
        $produk = $this->input->post('namaproduk');
        $data = $this->Model_Sepatu->getHarga($produk);
        echo json_encode($data);
    }
}