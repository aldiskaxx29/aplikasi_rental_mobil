<?php  

class Rental extends CI_Controller{
	public function tambah_rental($id){
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('trans','<div class="alert alert-danger alert-dismissible fade show" role="alert">LOGIN DULU LAG BRO!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/data_mobil');
		}
		$where = ['id_mobil' => $id];
		$data['mobil'] = $this->m_rental_mobil->tampil_data_id($where, 'mobil');
		$data['user'] = $this->m_rental_mobil->tampil_user();

		$this->form_validation->set_rules('tgl_rental','Tanggal Rental','required|trim');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates_customer/header', $data);
		$this->load->view('customer/tambah_rental', $data);
		$this->load->view('templates_customer/footer');		
		}
		else{
			$id_customer = $this->session->userdata('id_customer');
			$id_mobil = $this->input->post('id_mobil');
			$tgl_rental = $this->input->post('tgl_rental');
			$tgl_kembali = $this->input->post('tgl_kembali');
			$denda = $this->input->post('denda');
			$harga = $this->input->post('harga');

			$data = array(
				'id_customer' 			=> $id_customer,
				'id_mobil' 				=> $id_mobil,
				'tanggal_rental' 		=> $tgl_rental,
				'tanggal_kembali' 		=> $tgl_kembali,
				'denda' 				=> $denda,
				'harga' 				=> $harga,
				'tanggal_pengembalian' 	=> '-',
				'status_pengembalian' 	=> '0',
				'status_rental'			=> '0'
			);

			$this->m_rental_mobil->input_data($data,'transaksi');		
			$data = array(
				'status' => '0'
			);

			$where = array(
				'id_mobil' => $id_mobil
			);
			$this->m_rental_mobil->update_data($where,$data,'mobil');
			$this->session->set_flashdata('trans','<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi Berhasil, Silahkan Checkout<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('customer/data_mobil');
		}

	}
}

?>