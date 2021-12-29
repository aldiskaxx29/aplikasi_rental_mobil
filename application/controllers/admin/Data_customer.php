<?php  

class Data_customer extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['title'] = 'Data Customer';
		$data['customer'] = $this->m_rental_mobil->tampil_data('customer');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_customer', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_customer(){
		$data['title'] = 'Tambah Data Customer';
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[customer.email]');
		$this->form_validation->set_rules('gender','Gender','required|trim');
		$this->form_validation->set_rules('tlp','No Telepon','required|trim');
		$this->form_validation->set_rules('ktp','No KTP','required|trim');
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_customer');
		$this->load->view('templates_admin/footer');	
		}
		else{
			$nama 		= $this->input->post('nama',true);
			$email 		= $this->input->post('email',true);
			$gender 	= $this->input->post('gender',true);
			$tlp 		= $this->input->post('tlp',true);
			$ktp 		= $this->input->post('ktp',true);
			$password1 	= $this->input->post('password1',true);
			$alamat 	= $this->input->post('alamat',true);

			$data = array(
				'nama' => $nama,
				'email' => $email,
				'gender' => $gender,
				'no_tlp' => $tlp,
				'no_ktp' => $ktp,
				'password' => password_hash($password1, PASSWORD_DEFAULT),
				'alamat'=> $alamat
			);

			$this->m_rental_mobil->input_data($data,'customer');
			$this->session->set_flashdata('customer','<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil DI Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_customer');
		}
	}

	public function ubah_customer($id){
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$where = ['id_customer' => $id];
		$data['title'] = 'Ubah Data Customer';
		$data['custom'] = $this->m_rental_mobil->tampil_data_id($where,'customer');
		$data['jk'] = ['L','P'];
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('tlp','No Telepon','required|trim');
		$this->form_validation->set_rules('ktp','No KTP','required|trim');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ubah_customer', $data);
		$this->load->view('templates_admin/footer');	
		}
		else{
			$id 		= $this->input->post('id');
			$nama 		= $this->input->post('nama',true);
			$email 		= $this->input->post('email',true);
			$gender 	= $this->input->post('gender',true);
			$tlp 		= $this->input->post('tlp',true);
			$ktp 		= $this->input->post('ktp',true);
			$alamat 	= $this->input->post('alamat',true);

			$data = array(
				'nama' => $nama,
				'email' => $email,
				'gender' => $gender,
				'no_tlp' => $tlp,
				'no_ktp' => $ktp,
				'alamat'=> $alamat
			);

			$where = ['id_customer' => $id];

			$this->m_rental_mobil->update_data($where,$data,'customer');
			$this->session->set_flashdata('customer','<div class="alert alert-info alert-dismissible fade show" role="alert">Berhasil DI Ubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_customer');		
		}
	}

	public function hapus_customer($id){
		$where = ['id_customer' => $id];
		$this->m_rental_mobil->delete_data($where,'customer');
		$this->session->set_flashdata('customer','<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil DI Hapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_customer');

	}
}

?>