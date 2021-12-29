<?php  

class Data_type extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['title'] = 'Halaman Data Type';
		$data['type'] = $this->m_rental_mobil->tampil_data('type');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_type', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_type(){
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['title'] = 'Tambah Data Type';
		$this->form_validation->set_rules('kode','Kode type','required|trim');
		$this->form_validation->set_rules('nama','Nama type','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_type', $data);
		$this->load->view('templates_admin/footer');			
		}
		else{
			$kode = $this->input->post('kode',true);
			$nama = $this->input->post('nama',true);

			$data = array(
				'kode_type' => $kode,
				'nama_type' => $nama
			);

			$this->m_rental_mobil->input_data($data,'type');
			$this->session->set_flashdata('type','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Type Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_type');
		}
	}
	public function ubah_type($id){
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['title'] = 'Ubah Data Type';
		$where = ['id_type' => $id];
		$data['type'] = $this->m_rental_mobil->tampil_data_id($where, 'type');

		$this->form_validation->set_rules('kode','Kode type','required|trim');
		$this->form_validation->set_rules('nama','Nama type','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ubah_type', $data);
		$this->load->view('templates_admin/footer');			
		}
		else{
			$id = $this->input->post('id');
			$kode = $this->input->post('kode',true);
			$nama = $this->input->post('nama',true);

			$data = array(
				'kode_type' => $kode,
				'nama_type' => $nama
			);

			$where = ['id_type' => $id];

			$this->m_rental_mobil->update_data($where,$data,'type');
			$this->session->set_flashdata('type','<div class="alert alert-info alert-dismissible fade show" role="alert">Data Type Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_type');	
		}
	}

	public function hapus_type($id){
		$where = ['id_type' => $id];
		$this->m_rental_mobil->delete_data($where);
			$this->session->set_flashdata('type','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data type Berhasil Di Hapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_type');
	}
}

?>