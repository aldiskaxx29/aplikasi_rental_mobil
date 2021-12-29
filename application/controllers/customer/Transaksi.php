<?php  

class Transaksi extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			echo "<script>
				alert('Anda belum login');
				</script>";
		}
		$data['title'] = 'Data Transaksi';
		$customer = $this->session->userdata('id_customer');
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, customer cs, mobil mb WHERE cs.id_customer = tr.id_customer AND mb.id_mobil=tr.id_mobil AND cs.id_customer='$customer' ORDER BY id_rental DESC")->result();
		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/data_transaksi', $data);
		$this->load->view('templates_customer/footer');
	}

	public function pembayaran($id){
		// $where = ['id_rental' => $id];
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, customer cs, mobil mb WHERE cs.id_customer=tr.id_customer AND mb.id_mobil=tr.id_mobil AND tr.id_rental='$id' ORDER BY id_rental DESC")->result();
		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/pembayaran', $data);
		$this->load->view('templates_customer/footer');
	}

	public function bukti_pembayaran(){
		$id = $this->input->post('id');
		$image = $_FILES['bukti']['name'];

		if ($image) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/assets_customer/foto_bukti/';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti')) {
				$gambar = $this->upload->data('file_name');
				
			}
		}

		$data = array('bukti_pembayaran' => $gambar);
		$where = ['id_rental' => $id];
		$this->m_rental_mobil->upload_bukti($where,$data,'transaksi');
		$this->session->set_flashdata('trans','<div class="alert alert-success">Bukti Pembayaran Berhsail Di Upload</div>');
		redirect('customer/transaksi');
	}

	public function cetak_invoice($id){
		// $where = ['id_rental' => $id];
		$data['invoice'] = $this->db->query("SELECT * FROM transaksi tr, customer cs, mobil mb WHERE tr.id_customer=cs.id_customer AND tr.id_mobil=mb.id_mobil AND tr.id_rental= '$id' ORDER BY id_rental DESC")->result();
		// $this->load->view('templates_customer/header');
		$this->load->view('customer/print_invoice', $data);
		// $this->load->view('templates_customer/footer');
	}

	public function batal_transaksi($id){
		$where = ['id_rental' => $id];
		$data = $this->m_rental_mobil->get_where($where, 'transaksi')->row();

		$where1 = ['id_mobil' => $data->id_mobil];
		$data1 = ['status' => '1'];

		$this->m_rental_mobil->update_data($where1,$data1,'mobil');
		$this->m_rental_mobil->delete_data($where,'transaksi');
		$this->session->set_flashdata('trans','<div class="alert alert-danger">Berhasil Di Batalkan</div>');
		redirect('customer/transaksi');
	}
}

?>