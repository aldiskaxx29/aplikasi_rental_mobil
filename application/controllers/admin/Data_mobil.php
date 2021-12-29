<?php  

class Data_mobil extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['title'] = 'Halaman Data Mobil';
		$data['mobil'] = $this->m_rental_mobil->tampil_data('mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_mobil(){
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['title'] = 'Halaman Tambah Mobil';
		$data['type'] = $this->m_rental_mobil->tampil_type();

		$this->form_validation->set_rules('kode','Kode Type','required|trim');
		$this->form_validation->set_rules('merk','Merk ','required|trim');
		$this->form_validation->set_rules('plat','plat ','required|trim');
		$this->form_validation->set_rules('warna','warna','required|trim');
		$this->form_validation->set_rules('tahun','tahun','required|trim');
		$this->form_validation->set_rules('status','status','required|trim');
		$this->form_validation->set_rules('harga','harga','required|trim');
		$this->form_validation->set_rules('denda','denda','required|trim');
		$this->form_validation->set_rules('ac','ac','required|trim');
		$this->form_validation->set_rules('supir','supir','required|trim');
		$this->form_validation->set_rules('mp3','mp3 player','required|trim');
		$this->form_validation->set_rules('central','central lock','required|trim');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_mobil', $data);
		$this->load->view('templates_admin/footer');
		}
		else{
			$kode = $this->input->post('kode', true);
			$merk = $this->input->post('merk', true);
			$plat = $this->input->post('plat', true);
			$warna = $this->input->post('warna', true);
			$tahun = $this->input->post('tahun', true);
			$status = $this->input->post('status', true);
			$harga = $this->input->post('harga', true);
			$denda = $this->input->post('denda', true);
			$ac = $this->input->post('ac', true);
			$supir = $this->input->post('supir', true);
			$mp3 = $this->input->post('mp3', true);
			$central = $this->input->post('central', true);

			$image = $_FILES['image']['name'];
			if ($image) {
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/assets_admin/foto/';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$foto = $this->upload->data('file_name');
				}
				else{
					echo "Upload gambar gagal";die;
				}
			}

			$data = array(
				'kode_type' => $kode,
				'merk' => $merk,
				'no_plat' => $plat,
				'warna' => $warna,
				'tahun' => $tahun,
				'status' => $status,
				'harga' => $harga,
				'denda' => $denda,
				'ac' => $ac,
				'supir' => $supir,
				'mp3_player' => $mp3,
				'central_lock' => $central,
				'gambar' => $foto
			);

			$this->m_rental_mobil->input_data($data, 'mobil');
			$this->session->set_flashdata('mobil','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhsail Di Tambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_mobil');
		}
	}

	public function ubah_mobil($id){
		$data['title'] = 'Ubah Mobil';
		$where = ['id_mobil' => $id];
		$data['mobil'] = $this->m_rental_mobil->tampil_data_id($where, 'mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['Ta'] = ['1','0'];

		$this->form_validation->set_rules('kode','Kode Type','required|trim');
		$this->form_validation->set_rules('merk','Merk ','required|trim');
		$this->form_validation->set_rules('plat','plat ','required|trim');
		$this->form_validation->set_rules('warna','warna','required|trim');
		$this->form_validation->set_rules('tahun','tahun','required|trim');
		$this->form_validation->set_rules('status','status','required|trim');	
		$this->form_validation->set_rules('harga','harga','required|trim');
		$this->form_validation->set_rules('denda','denda','required|trim');
		$this->form_validation->set_rules('ac','ac','required|trim');
		$this->form_validation->set_rules('supir','supir','required|trim');
		$this->form_validation->set_rules('mp3','mp3 player','required|trim');
		$this->form_validation->set_rules('central','central lock','required|trim');	
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ubah_mobil', $data);
		$this->load->view('templates_admin/footer');
		}
		else{
			$id = $this->input->post('id');
			$kode = $this->input->post('kode',true);
			$merk = $this->input->post('merk',true);
			$plat = $this->input->post('plat',true);
			$warna = $this->input->post('warna',true);
			$tahun = $this->input->post('tahun',true);
			$status = $this->input->post('status',true);
			$harga = $this->input->post('harga', true);
			$denda = $this->input->post('denda', true);
			$ac = $this->input->post('ac', true);
			$supir = $this->input->post('supir', true);
			$mp3 = $this->input->post('mp3', true);
			$central = $this->input->post('central', true);

			$image = $_FILES['image']['name'];
			if ($image) {
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/assets_admin/foto/';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$image_old = $data['mobil']['gambar'];
					if ($image_old != 'default.jpg'){
						unlink(FCPATH . 'assets/assets_admin/foto/' .$image_old);
					}

					$image_new = $this->upload->data('file_name');
					$this->db->set('gambar', $image_new);
				}
			}

			$data = array(
				'kode_type' => $kode,
				'merk' => $merk,
				'no_plat' => $plat,
				'warna' => $warna,
				'tahun' => $tahun,
				'status' => $status,
				'harga' => $harga,
				'denda' => $denda,
				'ac' => $ac,
				'supir' => $supir,
				'mp3_player' => $mp3,
				'central_lock' => $central
			);

			$where = ['id_mobil' => $id];
			$this->m_rental_mobil->update_data($where,$data,'mobil');
			$this->session->set_flashdata('mobil','<div class="alert alert-info alert-dismissible fade show" role="alert">Data Berhsail Di Ubah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_mobil');
		}
	}

	public function hapus_mobil($id){
		$where = ['id_mobil' => $id];
		$data['mobil'] = $this->m_rental_mobil->tampil_mobil_id($where, 'mobil');
		$gambar = $data['mobil']['gambar'];
		if ($gambar) {
			unlink(FCPATH . 'assets/assets_admin/foto/' .$gambar);
		}
		$this->m_rental_mobil->delete_data($where, 'mobil');
		$this->session->set_flashdata('mobil','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhsail Di Hapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_mobil');
	}
}

?>