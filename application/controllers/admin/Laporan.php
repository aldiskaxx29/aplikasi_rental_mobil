<?php  

class Laporan extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$data['user'] = $this->m_rental_mobil->tampil_user();
		$data['title'] = 'Filter Laporan';
		$this->form_validation->set_rules('dari','Dari Tanggal','required|trim');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('admin/filter_laporan', $data);
			$this->load->view('templates_admin/footer');			
		}
		else{
			$data['user'] = $this->m_rental_mobil->tampil_user();

			$dari = $this->input->post('dari',true);
			$sampai = $this->input->post('sampai',true);
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, customer cs, mobil mb WHERE tr.id_customer=cs.id_customer AND tr.id_mobil=mb.id_mobil AND date(tanggal_rental) >= '$dari' AND date(tanggal_kembali) <= '$sampai'")->result();
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('admin/tampil_laporan', $data);
			$this->load->view('templates_admin/footer');				
		}
	}

	public function print_laporan(){
			$data['title'] = 'Print Laporan Transaksi';
			$dari = $this->input->get('dari');
			$sampai = $this->input->get('sampai');
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, customer cs, mobil mb WHERE tr.id_customer=cs.id_customer AND tr.id_mobil=mb.id_mobil AND date(tanggal_rental) >= '$dari' AND date(tanggal_kembali) <= '$sampai'")->result();

			$this->load->view('templates_admin/header', $data);
			$this->load->view('admin/print_laporan', $data);
	}
}

?>