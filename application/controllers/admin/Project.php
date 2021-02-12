<?php
defined('BASEPATH') or exit('No direct script access allowed'); 

class Project extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model("model_project");
        $this->load->library('form_validation');
		$this->load->model("model_categori");
        is_logged_in();
    }

    function index()
    {
		$data['project'] = $this->model_project->getAll();
		// echo response_json($data);
        $this->load->view('layouts/header');
        $this->load->view('_partalis/navigation');
        $this->load->view('admin/project/index', $data);
        $this->load->view('layouts/footer');
    }

    public function addproject()
    {
        $data['no_spk'] = $this->model_project->no_spk();
        $data['no_supl'] = $this->model_project->no_supl();
        $data['no_bahpl'] = $this->model_project->no_bahpl();
		$data['categori'] = $this->model_categori->getAll();
        $this->load->view('layouts/header');
        $this->load->view('_partalis/navigation');
        $this->load->view('admin/project/add_project', $data);
        $this->load->view('layouts/footer');
    }
    // project
    function proses_simpan()
    {
        $this->form_validation->set_rules('satuan_kerja', 'Satuan_Kerja', 'requered');
        $this->form_validation->set_rules('no_spk', 'No_Spk', 'requered');
        $this->form_validation->set_rules('tgl_spk', 'Tgl_Spk', 'requered');
        $this->form_validation->set_rules('paket_pekerjaan', 'Paket_Pekerjaan', 'requered');
        $this->form_validation->set_rules('no_supl', 'No_Supl', 'requered');
        $this->form_validation->set_rules('tgl_supl', 'Tgl_Supl', 'requered');
        $this->form_validation->set_rules('no_bahpl', 'No_Bahpl', 'requered');
        $this->form_validation->set_rules('tgl_bahpl', 'Tgl_Bahpl', 'requered');
        $this->form_validation->set_rules('sumber_dana', 'Sumber_Dana', 'requered');
        $this->form_validation->set_rules('jumlah_hk', 'Jumlah_Hk', 'requered');
        $this->form_validation->set_rules('tgl_mulai', 'Tgl_Mulai', 'requered');
        $this->form_validation->set_rules('tgl_selesai', 'Tgl_Selesai', 'requered');

        $this->model_project->addProject();
        $this->session->set_flashdata('flash', 'Berhasil di tambahkan');
        redirect('admin/project');
    }

    public function show($id)
    {
        $data['value'] = $this->model_project->show($id);
        $data['data'] = $this->model_project->data_project($id);
        $data['id'] = $id;

		// echo response_json($data);

        $this->load->view('layouts/header');
        $this->load->view('_partalis/navigation');
        $this->load->view('admin/project/data_project/index', $data);
        $this->load->view('layouts/footer');
    }

    public function hpsProject($id)
    {
        $this->model_project->hpsProject($id);
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect('admin/project');
    }

    public function editProject($id)
    {
        $data['value'] = $this->model_project->show($id);
        $this->load->view('layouts/header');
        $this->load->view('_partalis/navigation');
        $this->load->view('admin/project/edit_project', $data);
        $this->load->view('layouts/footer');
    }

    public function updateProject()
    {

        $arr = array(
            'satuan_kerja' => $this->input->post('satuan_kerja', true),
            'no_spk' => $this->input->post('no_spk', true),
            'tgl_spk' => $this->input->post('tgl_spk', true),
            'paket_pekerjaan' => $this->input->post('paket_pekerjaan', true),
            'no_supl' => $this->input->post('no_supl', true),
            'tgl_supl' => $this->input->post('tgl_supl', true),
            'no_bahpl' => $this->input->post('no_bahpl', true),
            'tgl_bahpl' => $this->input->post('tgl_bahpl', true),
            'sumber_dana' => $this->input->post('sumber_dana', true),
            'jumlah_hk' => $this->input->post('jumlah_hk', true),
            'tgl_mulai' => $this->input->post('tgl_mulai', true),
            'tgl_selesai' => $this->input->post('tgl_selesai', true),
        );
        $where = array('id' => $this->input->post('id', true));
        $this->model_project->update('tb_project', $arr, $where);

        redirect('admin/project');
    }

    //data project
    public function addDtProject($id)
    {
        $project_id = $this->input->post('project_id', true);
        $count = count($project_id);
        for ($i = 0; $i < $count; $i++) {
            $arr = array(
                'project_id'        => $this->input->post('project_id', true)[$i],
                'uraian_pekerjaan'  => $this->input->post('uraian_pekerjaan', true)[$i],
                'volume'            => $this->input->post('volume', true)[$i],
                'sat'               => $this->input->post('sat', true)[$i],
                'no_analisa'        => $this->input->post('no_analisa', true)[$i],
                'harga_satuan'      => $this->input->post('harga_satuan', true)[$i],
                'status'            => $this->input->post('status', true)[$i],
            );

            $this->model_project->insert('tb_data_project', $arr);
        }
        redirect('admin/project/show/' . $id);
    }

    public function updateDtProject($id)
    {

        $arr = array(
            'project_id'        => $this->input->post('project_id', true),
            'uraian_pekerjaan'  => $this->input->post('uraian_pekerjaan', true),
            'volume'            => $this->input->post('volume', true),
            'sat'               => $this->input->post('sat', true),
            'no_analisa'        => $this->input->post('no_analisa', true),
            'harga_satuan'      => $this->input->post('harga_satuan', true),
            'status'            => $this->input->post('status', true),
        );
        $where = array('id' => $this->input->post('id', true));
        $this->model_project->update('tb_data_project', $arr, $where);

        redirect('admin/project/show/' . $id);
    }

    public function hpsDtProject($id, $project_id)
    {
        $this->model_project->hpsDtProject($id);
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect('admin/project/show/' . $project_id);
    }

    public function editDtProject()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->model_project->getDtProjectByid($id);
        echo json_encode($data);
    }

    public function laporan_pdf($id)
    {
        $data['value'] = $this->model_project->show($id);
        $data['data'] = $this->model_project->data_project($id);

		$this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('admin/project/pdf', $data)->setOption(['enable-javascript' => true, 'isRemoteEnabled' => true]);
		$this->pdf->load_view('admin/project/pdf', $data);
		// $this->pdf->;
		$this->load->view('admin/project/edit_project', $data);
		// $this->options->setIsRemoteEnabled(true);
    }
}
