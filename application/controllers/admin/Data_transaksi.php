<?php  

class Data_transaksi extends CI_Controller{

	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['title'] = 'Data Transaksi';
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['transaksi'] = $this->m_rental_mobil->tampil_transaksi_join();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_transaksi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function pembayaran($id){
		$data['title'] = 'Konfirmasi Pembayaran';
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$where = ['id_rental' => $id];
		$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental=$id")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/konfirmasi_pembayaran', $data);
		$this->load->view('templates_admin/footer');
	}

	public function cek_pembayaran(){
		$id = $this->input->post('id_rental');
		$sp = $this->input->post('status_pembayaran');

		$data = ['status_pembayaran' => $sp];

		$where = ['id_rental' => $id];
		
		// $this->db->update($where,'transaksi',$data);
		$this->m_rental_mobil->update_data($where,$data,'transaksi');
		redirect('admin/data_transaksi');
	}

	public function download_pembayaran($id){
		$where = ['id_rental' => $id];
		$this->load->helper('download');
		$filepembayaran = $this->m_rental_mobil->downloadPembayaran($where);
		$file = 'assets/assets_customer/foto_bukti/'.$filepembayaran['bukti_pembayaran'];
		force_download($file, NULL);
	}

	public function transaksi_selesai($id){
		$data['title'] = 'Transaksi Selesai';
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$where = ['id_rental' => $id];
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->row_array();
		// $data['transaksi'] = $this->m_rental_mobil->tampil_data($where);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/transaksi_selesai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function transaksi_selesai_aksi(){
		$id 					= $this->input->post('id');
		$denda 					= $this->input->post('denda');
		$tgl_kembali 			= $this->input->post('tgl_kembali');
		$tanggal_pengembalian 	= $this->input->post('tgl_pengembalian');
		$status_pengembalian 	= $this->input->post('status_pengembalian');
		$status_rental 			= $this->input->post('status_rental');

								$x = strtotime($tanggal_pengembalian);
								$y = strtotime($tgl_kembali);
								$jml = abs(($x-$y)/(60*60*24));	
								$denda_mobil = $jml*$denda;
								var_dump($jml);die;

		$data = array(
			'tanggal_pengembalian' => $tanggal_pengembalian,
			'status_pengembalian' => $status_pengembalian,
			'status_rental' => $status_rental,
			'total_denda' => $denda_mobil
		);

		$where = array('id_rental' => $id);

		$this->m_rental_mobil->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('trans','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhsail Di Update
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_transaksi');
	}
}


?> 