<?php  

class Dashboard extends CI_Controller{

	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['title'] = 'Dashboard';
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');
	}
}


?>