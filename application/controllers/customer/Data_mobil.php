<?php  

class Data_mobil extends CI_Controller{
	public function index(){
		$data['mobil'] = $this->m_rental_mobil->tampil_data('mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/data_mobil', $data);
		$this->load->view('templates_customer/footer');
	}
	public function detail_mobil($id){
		$data['title'] = 'Ubah Mobil';
		$where = ['id_mobil' => $id];
		$data['mobil'] = $this->m_rental_mobil->tampil_data_id($where, 'mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();

		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/detail_mobil', $data);
		$this->load->view('templates_customer/footer');
	}
}


?>