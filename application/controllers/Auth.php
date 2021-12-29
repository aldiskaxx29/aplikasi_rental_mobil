<?php  

class Auth extends CI_Controller{

	public function index(){
		if ($this->session->userdata('email')) {
			redirect('customer/Dashboard');
		}
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth');
		// }
		$data['title'] = 'Halaman Login';
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('form_login');
		$this->load->view('templates_admin/footer');	
		}
		else{
			$this->_login();
		}	
	}

	private function _login(){
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$user = $this->db->get_where('customer', ['email' => $email])->row_array();
			if ($user) {
				if (password_verify($pass, $user['password'])) {
					$data = array(
						'id_customer' => $user['id_customer'],
						'email' => $user['email'],
						'nama' => $user['nama'],
						'role_id' => $user['role_id']
					);

					if ($user['role_id'] == '1') {
						$this->session->set_userdata($data);
						redirect('admin/Dashboard');				
					}
					else{
						$this->session->set_userdata($data);
						redirect('customer/Dashboard');
					}
				}
				else{
				$this->session->set_flashdata('login','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
				}
			}
			else{
			$this->session->set_flashdata('login','<div class="alert alert-danger alert-dismissible fade show" role="alert">Email Belum Terdaftar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
			}		
	}

	public function ganti_password(){
		$data['title'] = 'Ganti Password';
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2','Konfirmasi Password','required|trim|min_length[3]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('ganti_password');
			$this->load->view('templates_admin/footer');			
		}
		else{
			$pass = $this->input->post('password1',true);

			$data = array(
				'password' => password_hash($pass, PASSWORD_DEFAULT),
			);
			$where = array(
				'id_customer' => $this->session->userdata('id_customer'),
			);
			$this->m_rental_mobil->update_password($where,$data,'customer');
			$this->session->set_flashdata('login','<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');			
			redirect('auth');
		}

	}

	public function logout(){
		$this->session->unset_userdata('id_customer');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role_id');
		$this->session->sess_destroy();

		$this->session->set_flashdata('login','<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Logout
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('customer/Dashboard');		
	}
}

?>