<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("model_sda");
        $this->load->library('form_validation');
        is_logged_in();
    }

    function index()
    {
        $this->form_validation->set_rules('kode_sungai', 'Kode_Sungai', 'required');
        $this->form_validation->set_rules('nama_sungai', 'Nama_Sungai', 'required');
        $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');
        $this->form_validation->set_rules('lebar_max', 'Lebar_Max', 'required');
        $this->form_validation->set_rules('max_m3', 'Max_M3', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');
        $this->form_validation->set_rules('ket', 'Ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['sda'] = $this->model_sda->getAll();
            $data['wilayah'] = $this->model_sda->getwilayah();
            $data['kode'] = $this->model_sda->kode();
            $this->load->view('layouts/header');
            $this->load->view('_partalis/navigation');
            $this->load->view('admin/sda/index', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->model_sda->tambahData();
            $this->session->set_flashdata('flash', 'Berhasil di tambahkan');
            redirect('admin/sda');
        }
    }

    public function delete($id)
    {
        $this->model_sda->getHapus($id);
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect('admin/sda');
    }

    public function edit()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->model_sda->getSdaByid($id);
        echo json_encode($data);
    }
    public function update()
    {

        $this->model_sda->updateSda();
        $this->session->set_flashdata('flash', 'gagal');
        redirect('admin/sda');
    }
}
