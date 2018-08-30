<?php 
 
class M_data_keluhan extends CI_Model{

	function tampil_jeniskeluhan(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isShow', 'yes');
		$query = $this->db->get('tb_jeniskeluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	function input_keluhan($data,$table) {
		$this->db->insert($table, $data);
	}


	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
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

    function get_jeniskeluhan() {
    	$this->db->distinct();
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isShow', 'yes');
		$this->db->order_by('jenis_keluhan', 'ASC');
		$query = $this->db->get('tb_jeniskeluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else {
			return $query->result();
		}
    }

   	function tampil_keluhan(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->order_by('id_keluhan', 'DESC');
		/*$this->db->order_by('open_date', 'DESC');*/
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	public function tampil_layanan($id)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$id);
		$this->db->where('isDelete', 'no');
		$query = $this->db->get('tb_layanan');
		return $query->row();
	}

	public function tampil_jenislayanan($id)
	{
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('id_jenislayanan',$id);
		$query = $this->db->get('tb_jenislayanan');
		return $query->row();
	}

	public function tampil_jeniskeluhan_byid($id)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$id);
		$query = $this->db->get('tb_jeniskeluhan');
		return $query->row();
	}

	public function tampil_area()
	{
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$query = $this->db->get('tb_layanan');
		return $query->row();
	}

	/* public function tambah_lokasi($id)
	{
		$this->db->select('*');
		$this->db->where('sid',$id);
		$query = $this->db->get('tb_layanan');
		return $query->row();
	}*/

/*==pencarian==*/
  public function cari_sid($input)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	public function cari_jg($input)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_bulan($input)
	{
		$this->db->select('*');
		$this->db->where('bulan',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_tahun($input)
	{
		$this->db->select('*');
		$this->db->where('tahun',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	public function cari_durasi($input)
	{
		$this->db->select('*');
		if ($input=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	public function cari_sid_jg($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
/*========START CODING BAGAI QUDA BY SAULIA===========*/
	public function cari_sid_b($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_t($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('tahun',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_d($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		if ($input2=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input2=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input2=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_jg_b($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
		public function cari_jg_t($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('tahun',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_jg_d($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
	if ($input2=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input2=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input2=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	
	public function cari_b_t($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('bulan',$input1);
		$this->db->where('tahun',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_b_d($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('bulan',$input1);
	if ($input2=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input2=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input2=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_t_d($input1,$input2)
	{
		$this->db->select('*');
		$this->db->where('tahun',$input1);
	if ($input2=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input2=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input2=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_jg_b($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('bulan',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_jg_t($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('tahun',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_jg_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
	if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_jg_b_t($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('tahun',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_jg_b_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('bulan',$input2);
	if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	public function cari_jg_t_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('tahun',$input2);
		if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_b_t_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('bulan',$input1);
		$this->db->where('tahun',$input2);
		if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_b_t($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('tahun',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_b_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('bulan',$input2);
		if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_t_d($input1,$input2,$input3)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('tahun',$input2);
		if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_jg_b_t($input1,$input2,$input3,$input4)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('bulan',$input3);
		$this->db->where('tahun',$input4);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_jg_b_d($input1,$input2,$input3,$input4)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('bulan',$input3);
		if ($input4=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input4=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input4=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_jg_b_t_d($input1,$input2,$input3,$input4)
	{
		$this->db->select('*');
		$this->db->where('id_jeniskeluhan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('tahun',$input3);
		if ($input4=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input4=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input4=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	public function cari_sid_b_t_d($input1,$input2,$input3,$input4)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('tahun',$input3);
		if ($input4=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input4=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input4=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}	
	public function cari_sid_jg_b_t_d($input1,$input2,$input3,$input4,$input5)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input1);
		$this->db->where('id_jeniskeluhan',$input2);
		$this->db->where('bulan',$input3);
		$this->db->where('tahun',$input4);
		if ($input5=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input5=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input5=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_keluhan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}
	/*sampai sini fungsi cari*/

	function get_keluhan_byid($id)
	{
		return $this->db->get_where('tb_keluhan', array('id_keluhan' => $id))->row();
	}

	public function get_jenis_keluhan($id)
	{
		$this->db->join('tb_jeniskeluhan', 'tb_jeniskeluhan.id_jeniskeluhan = tb_keluhan.id_jeniskeluhan');
		return $this->db->get_where('tb_gangguan',array('id_keluhan'=>$id))->row_array();
	}

	public function get_lokasi($sid)
	{
		$this->db->join('tb_jenislayanan', 'tb_jenislayanan.id_jenislayanan = tb_layanan.id_jenislayanan');
		return $this->db->get_where('tb_layanan',array('id_layanan'=>$sid))->row_array();
	}

	

}