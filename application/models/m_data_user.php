<?php 
 
class M_data_user extends CI_Model{

	function tampil_user(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$query = $this->db->get('tb_user');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	function get_layanan() {
    	$this->db->distinct();
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->order_by('lokasi', 'ASC');
		$query = $this->db->get('tb_layanan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else {
			return $query->result();
		}
    }

	function input_user($data,$table) {
		$this->db->insert($table, $data);
	}

	function hapus_user($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function cek_id_karyawan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('no_karyawan',$id);
		return $query = $this->db->get()->num_rows();
	}

}