<?php  

class Register extends CI_Controller{
	public function index(){
		$data['title'] = 'Halaman Register';

		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('gender','gender','required|trim');
		$this->form_validation->set_rules('tlp','No Tlp','required|trim');
		$this->form_validation->set_rules('ktp','No ktp','required|trim');
		$this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2','Konfirmasi password','required|trim|min_length[3]|matches[password1]');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('register_form');
		$this->load->view('templates_admin/footer');			
		}
		else{
			$nama = $this->input->post('nama',true);
			$email = $this->input->post('email',true);
			$alamat = $this->input->post('alamat',true);
			$gender = $this->input->post('gender',true);
			$tlp = $this->input->post('tlp',true);
			$ktp = $this->input->post('ktp',true);
			$password1 = $this->input->post('password1',true);

			$data = array(
				'nama' => $nama,
				'email' => $email,
				'alamat' => $alamat,
				'gender' => $gender,
				'no_tlp' => $tlp,
				'no_ktp' => $ktp,
				'password' => password_hash($password1, PASSWORD_DEFAULT),
				'role_id' => '2'
			);

			$this->m_rental_mobil->input_data($data,'customer');
			$this->session->set_flashdata('customer','<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil DI Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}

	}
}

?>