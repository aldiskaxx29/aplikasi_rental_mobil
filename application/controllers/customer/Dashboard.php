<?php  

class Dashboard extends CI_Controller{
	public function index(){
		if ($this->session->userdata('role_id' == '1')) {
			redirect('admin/Dashboard');
		}
		$data['mobil'] = $this->m_rental_mobil->tampil_data('mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/Dashboard', $data);
		$this->load->view('templates_customer/footer');
	}
	public function detail_mobil($id){
		$data['title'] = 'Ubah Mobil';
		$where = ['id_mobil' => $id];
		$data['mobil'] = $this->m_rental_mobil->tampil_data_id($where, 'mobil');

		$this->load->view('templates_customer/header');
		$this->load->view('customer/detail_mobil', $data);
		$this->load->view('templates_customer/footer');
	}
}


?>