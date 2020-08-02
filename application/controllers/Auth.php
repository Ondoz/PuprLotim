<?php
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header');
			$this->load->view('login');
			$this->load->view('layouts/footer');
		} else {
			$this->auth();
		}
	}

	function auth()
	{
		$dt = new DateTime('now');
		$email    = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$validate = $this->login_model->validate($email, $password);
		if ($validate->num_rows() > 0) {

			// access login for admin 
			$data   = $validate->row_array();
			$email  = $data['user_email'];
			$role   = $data['role_id'];
			$grup_module = $data['id_grup_module'];
			$id 	   = $data['user_id'];
			$user 	= $this->db->get_where('tbl_users', ['user_email' => $email])->row_array();
			if ($user['is_active'] == 1) {
				$sesdata = array(
					'email'     		=> $email,
					'id_grup_module' 	=> $grup_module,
					'role_id'   		=> $role,
					'user_id'   		=> $id,
					'logged_in' 		=> TRUE,
				);
				$this->session->set_userdata($sesdata);
				if ($role == 1) {
					redirect('admin/Dashboard');

					// access login for staff
				} elseif ($role == 2) {
					redirect('user/dashboard');

					// access login for author
				} else {
					redirect('page/author');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger " role="alert">
				User Tidak aktif
			</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger " role="alert">
			Cek Kembali Email dan Password
		</div>');
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
