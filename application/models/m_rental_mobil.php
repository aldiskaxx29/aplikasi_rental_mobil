<?php  

class M_rental_mobil extends CI_Model{
	public function tampil_data($table){
		return $this->db->get($table)->result();
	}
	public function tampil_data_id($where,$table){
		return $this->db->get_where($table,$where)->row_array();
	}
	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function delete_data($where,$table){
		$this->db->delete($table,$where);
	}
	//user
	public function tampil_user(){
		return $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function update_password($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	//Transaksi
	public function insert_transaksi($data,$table){
		$this->db->insert($table,$data);
	}

	//Data Transaksi
	public function tampiL_transaksi_join(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('mobil','mobil.id_mobil = transaksi.id_mobil');
		$this->db->join('customer','customer.id_customer=transaksi.id_customer');
		$query = $this->db->get();
		return $query->result();
	}

	public function upload_bukti($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//Download Pembayaran
	public function downloadPembayaran($where){
		return $this->db->get_where('transaksi',$where)->row_array();
	}

	public function get_where($where,$table){
		return $this->db->get_where($table,$where);
	}
}

?>