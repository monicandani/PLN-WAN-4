<?php 
 
class M_data_gangguan extends CI_Model{

	function tampil_jenisgangguan(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isShow', 'yes');
		$query = $this->db->get('tb_jenisgangguan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	function tampil_gangguan(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isSolved', 'no');
		$this->db->order_by('id_gangguan', 'DESC');
		//$this->db->order_by('open_date', 'DESC');
		//$this->db->order_by('name', 'ASC');
		//tambah sort by open date and open time
		$query = $this->db->get('tb_gangguan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	public function get_all(){
		$query = $this->db->query('SELECT l.*, g.*, jl.*, jg.* 
			FROM tb_gangguan g, tb_layanan l, tb_jenislayanan jl, tb_jenisgangguan jg 
			WHERE g.id_layanan = l.id_layanan
			AND (g.isSolved = "no" )
			AND (g.isDelete = "no" )
			AND (l.id_jenislayanan = jl.id_jenislayanan)
			AND (g.id_jenisgangguan = jg.id_jenisgangguan)');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}

	/*public function tampil_history_gangguan(){
		$query = $this->db->query('SELECT l.*, g.*, jl.*, jg.* 
			FROM tb_gangguan g, tb_layanan l, tb_jenislayanan jl, tb_jenisgangguan jg 
			WHERE g.id_layanan = l.id_layanan
			AND (g.isSolved = "yes" )
			AND (g.isDelete = "no" )
			AND (l.id_jenislayanan = jl.id_jenislayanan)
			AND (g.id_jenisgangguan = jg.id_jenisgangguan)');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}*/

	function tampil_history_gangguan(){
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isSolved', 'yes');
		//$this->db->order_by('id_gangguan', 'DESC');
		$this->db->order_by('open_date', 'DESC');
		//$this->db->order_by('name', 'ASC');
		//tambah sort by open date and open time
		$query = $this->db->get('tb_gangguan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}

	}

	function tampil_progress($id=null){
		if (isset($id)) {
			$this->db->select('*');
			//tambah sort by open date and open time
			$query = $this->db->get_where('tb_progress',array('id_gangguan'=>$id));
			if($query->num_rows()>0)
			{
				return $query->result();
			} else{
				return $query->result();
			}
		} else {
			$this->db->select('*');
			//tambah sort by open date and open time
			$query = $this->db->get('tb_progress');
			if($query->num_rows()>0)
			{
				return $query->result();
			} else{
				return $query->result();
			}
		}	

	}

	public function get_last_progress($id)
	{
		$this->db->order_by('id_progress','DESC');
		$this->db->limit(1); 
		return $this->db->get_where('tb_progress',array('id_gangguan'=>$id))->row_array();
	}


	function input_gangguan($data,$table) {
		$this->db->insert($table, $data);
	}

	function input_progress($data,$table) {
		$this->db->insert($table, $data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function get_jenis_gangguan($id_gangguan)
	{
		$this->db->join('tb_jenisgangguan', 'tb_jenisgangguan.id_jenisgangguan = tb_gangguan.id_jenisgangguan');
		return $this->db->get_where('tb_gangguan',array('id_gangguan'=>$id_gangguan))->row_array();
	}

	public function get_lokasi($sid)
	{
		$this->db->join('tb_jenislayanan', 'tb_jenislayanan.id_jenislayanan = tb_layanan.id_jenislayanan');
		return $this->db->get_where('tb_layanan',array('id_layanan'=>$sid))->row_array();
	}

	/*public function get_all()
	{
		$this->db->select('*');
		$this->db->join('tb_jenisgangguan', 'tb_jenisgangguan.id_jenisgangguan = tb_gangguan.id_jenisgangguan');
		//$this->db->join('tb_jenislayanan', 'tb_jenislayanan.id_jenislayanan = tb_layanan.id_jenislayanan');
		$this->db->join('tb_layanan', 'tb_layanan.sid = tb_gangguan.sid');
		/*$this->db->where('isDelete', 'no');
		$this->db->where('isSolved', 'no');*/
		/*$this->db->order_by('id_gangguan', 'DESC');
		$query = $this->db->get('tb_gangguan');
		if($query->num_rows()>0)
			{
				return $query->result();
			} else{
				return $query->result();
			}
	}*/



	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
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

    function get_jenisgangguan() {
    	$this->db->distinct();
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('isShow', 'yes');
		$this->db->order_by('jenis_gangguan', 'ASC');
		$query = $this->db->get('tb_jenisgangguan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else {
			return $query->result();
		}
    }

     public function get_id($id)
	{
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		$this->db->where('id_gangguan',$id);
		$query = $this->db->get('tb_gangguan');
		return $query->row();
	}

	public function tampil_jenislayanan($id)
	{
		$this->db->select('*');
		$this->db->where('id_jenislayanan',$id);
		$query = $this->db->get('tb_jenislayanan');
		return $query->row();
	}

	public function tampil_layanan($id)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$id);
		$query = $this->db->get('tb_layanan');
		return $query->row();
	}

	public function jenislayanan_byid($id)
	{
		$this->db->select('*');
		$this->db->where('id_jenislayanan',$id);
		$query = $this->db->get('tb_jenislayanan');
		return $query->row();
	}

	public function tampil_jenisgangguan_byid($id)
	{
		$this->db->select('*');
		$this->db->where('isDelete', 'no');
		/*$this->db->where('isShow', 'yes');*/
		$this->db->where('id_jenisgangguan',$id);
		$query = $this->db->get('tb_jenisgangguan');
		return $query->row();
	}

	/*public function get_gangguan_byid($id)
	{
		$this->db->select('*');
		$this->db->where('id_gangguan',$id);
		$query = $this->db->get('tb_gangguan');
		return $query->row();
	}*/

	function get_gangguan_byid($id)
	{
		return $this->db->get_where('tb_gangguan', array('id_gangguan' => $id))->row();
	}

	function get_progress_byid($id)
	{
		return $this->db->get_where('tb_progress', array('id_progress' => $id))->row();
	}


	/*public function tampil_gangguan_byid($id)
	{
		$this->db->select('*');
		$this->db->where('id_gangguan',$id);
		$query = $this->db->get('tb_gangguan');
		return $query->row();
	}*/

	function tampil_gangguan_byid($id)
	{
		return $this->db->get_where('tb_gangguan', array('id_gangguan' => $id))->row();
	}

	
 function get_data($kondisi){
 	if (isset($kondisi['sid'])) {
 		$this->db->or_where('sid', $kondisi['sid']);
 	} 
 	if ($kondisi['id_jenisgangguan']) {
 		$this->db->or_where('id_jenisgangguan', $kondisi['id_jenisgangguan']);
 	}
 	if (isset($kondisi['bulan'])) {
 		$this->db->or_where('bulan', $kondisi['bulan']);
 	} 
 	if (isset($kondisi['tahun'])) {
 		$this->db->or_where('tahun', $kondisi['tahun']);
 	} 
    return $this->db->get('tb_gangguan')->result();
  }

//==start cari==
  public function cari_sid($input)
	{
		$this->db->select('*');
		$this->db->where('id_layanan',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
		$this->db->where('tahun',$input2);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
		if ($input2=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input2=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input2=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
		$this->db->where('bulan',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
		$this->db->where('tahun',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
		if ($input3=='1') {
			$this->db->where('cari_durasi <','400');
		} elseif ($input3=='2') {
			$this->db->where('cari_durasi >','400');
			$this->db->where('cari_durasi <','700');
		} elseif ($input3=='3') {
			$this->db->where('cari_durasi >','700');
		}
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
		$this->db->where('bulan',$input2);
		$this->db->where('tahun',$input3);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
		$this->db->where('bulan',$input3);
		$this->db->where('tahun',$input4);
		$this->db->where('isDelete','no');
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input1);
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
		$query = $this->db->get('tb_gangguan');
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
		$query = $this->db->get('tb_gangguan');
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
		$this->db->where('id_jenisgangguan',$input2);
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
		$query = $this->db->get('tb_gangguan');
		if($query->num_rows()>0)
		{
			return $query->result();
		} else{
			return $query->result();
		}
	}


}