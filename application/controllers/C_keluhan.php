<?php 

class C_keluhan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_keluhan');
        $this->load->helper('url');
	}

	public function tampil_lokasi($id) {
	  $where = array('sid' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_layanan' => $this->m_data_keluhan->edit_data($where, 'tb_layanan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('area_keluhan',$data);
	  $this->load->view('element/footer');
	 } 

	 public function tampil_waktu($id) {
	  $where = array('id_keluhan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_waktu' => $this->m_data_keluhan->edit_data($where, 'tb_keluhan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('waktu_keluhan',$data);
	  $this->load->view('element/footer');
	 } 

	public function form_data_keluhan() {
	$data=array (
	'title'=>'Data Keluhan - PLN',
   	'keluhan' => $this->m_data_keluhan->tampil_keluhan(),
   	'status_user' => $this->session->userdata('status_user')
   	);

	  $this->load->view('element/header_coba',$data);
	  $this->load->view('form_data_keluhan', $data);
	  $this->load->view('element/footer');
	 } 

	public function form_jenis_keluhan($id) {
	 $where = array('id_keluhan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_ket' => $this->m_data_keluhan->edit_data($where, 'tb_keluhan')->result()
	  );
	$this->load->view('element/header',$data);
	$this->load->view('form_jenis_keluhan',$data);
	$this->load->view('element/footer');
	} 


	public function form_tambah_keluhan() {
		$data = array(
		'title'=>'Tambah Keluhan - PLN',
		'status_user' => $this->session->userdata('status_user'),
	  	'get_layanan' => $this->m_data_keluhan->get_layanan(),
	  	'get_jeniskeluhan' => $this->m_data_keluhan->get_jeniskeluhan()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('form_tambah_keluhan', $data);
	  $this->load->view('element/footer');
	 } 

	 function tambah_aksi_keluhan(){
	 	$this->form_validation->set_rules('id_layanan','Lokasi','required');
		$this->form_validation->set_rules('open_date','Open Date','required');
		$this->form_validation->set_rules('open_time','Open Time','required');
		
		if ($this->form_validation->run()) {
			$id_layanan = $this->input->post('id_layanan');
			$id_jeniskeluhan = $this->input->post('id_jeniskeluhan');
			$deskripsi_jeniskeluhan = $this->input->post('deskripsi_jeniskeluhan');
			$solusi = $this->input->post('solusi');
			$penyebab = $this->input->post('penyebab');
			$open_time = $this->input->post('open_time');
			$close_time = $this->input->post('close_time');
			$open_date = $this->input->post('open_date');
			$close_date = $this->input->post('close_date');
			$bulan = date("m", strtotime($open_date)); 
			$tahun = date("Y", strtotime($open_date)); 	
			if ($close_date != "" && $close_time !="") {
				$start_date = new DateTime($open_date.' '.$open_time);
				$end_date = new DateTime($close_date.' '.$close_time);
				$durasi = date_diff($end_date, $start_date);
				$durasi_jam = $durasi->d*24;
				$input_durasi = ($durasi->h+$durasi_jam).':'.$durasi->i.':'.$durasi->s;
				$cari_durasi = $durasi->h+$durasi_jam.$durasi->i;
			} else {
				$input_durasi = '0:00';
			}

			$data=array(
				'id_layanan' => $id_layanan,
				'id_jeniskeluhan' => $id_jeniskeluhan,
				'deskripsi_jeniskeluhan' => $deskripsi_jeniskeluhan,
				'solusi_keluhan' => $solusi,
				'penyebab_keluhan' => $penyebab,
				'open_time' => $open_time,
				'close_time' => $close_time,
				'open_date' => $open_date,
				'close_date' => $close_date,
				'bulan' => $bulan,
				'tahun' => $tahun,
				'durasi' => $input_durasi,
				'cari_durasi' => $cari_durasi
				);

			$this->m_data_keluhan->input_keluhan($data, 'tb_keluhan');
			redirect('c_keluhan/form_data_keluhan');
			echo " <script>
	                alert('Registrasi sukses. Keluhan berhasil ditambahkan');
	                window.location='form_data_keluhan'
	                </script>";
		} else {
			$data=array (
			'title'=>'Form Tambah Keluhan - PLN',
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
            'get_layanan' => $this->m_data_keluhan->get_layanan(),
		  	'get_jeniskeluhan' => $this->m_data_keluhan->get_jeniskeluhan()
        	);
	        $this->load->view('element/header',$data);	
			$this->load->view('form_tambah_keluhan',$data);
			$this->load->view('element/footer');
		}
		
	}

	function jeniskeluhan(){
		$data=array(
			'title'=>'Kategori Keluhan - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'jeniskeluhan' => $this->m_data_keluhan->tampil_jeniskeluhan()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('jeniskeluhan',$data);
 		$this->load->view('element/footer');
	}

	function tambah_aksi_jeniskeluhan(){
		$this->form_validation->set_rules('jenis_keluhan','Jenis Keluhan','required');
		
		if ($this->form_validation->run()){
			$jenis_keluhan = $this->input->post('jenis_keluhan');
			$ket_keluhan = $this->input->post('ket_keluhan');
			
			$data=array(
				'jenis_keluhan' => $jenis_keluhan,
				'ket_keluhan' => $ket_keluhan
			);
			$this->m_data_keluhan->input_keluhan($data, 'tb_jeniskeluhan');
				redirect('c_keluhan/jeniskeluhan');
				echo " <script>
	                     alert('Registrasi sukses. Jenis keluhan berhasil ditambahkan');
	                     window.location='jeniskeluhan'
	                    </script>";
		} else {
			$data=array (
			'title'=>'Tambah Keluhan - PLN',
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
        	);
	        $this->load->view('element/header',$data);	
			$this->load->view('tambahkeluhan',$data);
			$this->load->view('element/footer');
		}
	 
	}


	function edit_jeniskeluhan($id){
		$where = array('id_jeniskeluhan' => $id);
		$data=array (
			'title'=>'Kategori Keluhan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'jeniskeluhan' => $this->m_data_keluhan->edit_data($where,'tb_jeniskeluhan')->result()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('editkeluhan',$data);
		$this->load->view('element/footer');
	}

	function update_jeniskeluhan(){
		$id_jeniskeluhan = $this->input->post('id_jeniskeluhan');
		$jenis_keluhan = $this->input->post('jenis_keluhan');
		$ket_keluhan = $this->input->post('ket_keluhan');
		
		$data = array(
			'jenis_keluhan' => $jenis_keluhan,
			'ket_keluhan' => $ket_keluhan
		);

		$where = array(
			'id_jeniskeluhan' => $id_jeniskeluhan
		);

		$this->m_data_keluhan->update_data($where,$data,'tb_jeniskeluhan');
		redirect('c_keluhan/jeniskeluhan');
	}

	function hapus_jeniskeluhan($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_jeniskeluhan' => $id
		);
		$this->m_data_keluhan->update_data($where,$data,'tb_jeniskeluhan');
		redirect('c_keluhan/jeniskeluhan');
	}

	function hapus_keluhan($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_keluhan' => $id
		);
		$this->m_data_keluhan->update_data($where,$data,'tb_keluhan');
		redirect('c_keluhan/form_data_keluhan');
	}

	function edit_keluhan($id){
		$where = array('id_keluhan' => $id);
		$data=array (
			'title'=>'Edit Keluhan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'keluhan' => $this->m_data_keluhan->edit_data($where,'tb_keluhan')->result(),
        	'get_layanan' => $this->m_data_keluhan->get_layanan(),
	  		'get_jeniskeluhan' => $this->m_data_keluhan->get_jeniskeluhan()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('edit_data_keluhan',$data);
		$this->load->view('element/footer');
	}

	function update_keluhan(){
		$id_layanan = $this->input->post('id_layanan');
		$id_jeniskeluhan = $this->input->post('id_jeniskeluhan');
		$deskripsi_jeniskeluhan = $this->input->post('deskripsi_jeniskeluhan');
		$solusi_keluhan = $this->input->post('solusi_keluhan');
		$penyebab_keluhan = $this->input->post('penyebab_keluhan');
		$open_time = $this->input->post('open_time');
		$close_time = $this->input->post('close_time');
		$open_date = $this->input->post('open_date');
		$close_date = $this->input->post('close_date');
		$id_keluhan = $this->input->post('id_keluhan');
		$isDelete = $this->input->post('isDelete');


		$bulan = date("m", strtotime($open_date)); 
		$tahun = date("Y", strtotime($open_date)); 

		if ($close_date != "" && $close_time !="") {
			$start_date = new DateTime($open_date.' '.$open_time);
			$end_date = new DateTime($close_date.' '.$close_time);
			$durasi = date_diff($end_date, $start_date);
			$durasi_jam = $durasi->d*24;
			$input_durasi = ($durasi->h+$durasi_jam).':'.$durasi->i.':'.$durasi->s;
			$cari_durasi = $durasi->h+$durasi_jam.$durasi->i;
		} else {
			$input_durasi = '0:00:00';
		}

		
		$data=array(
			'id_layanan' => $id_layanan,
			'id_jeniskeluhan' => $id_jeniskeluhan,
			'deskripsi_jeniskeluhan' => $deskripsi_jeniskeluhan,
			'solusi_keluhan' => $solusi_keluhan,
			'penyebab_keluhan' => $penyebab_keluhan,
			'open_time' => $open_time,
			'close_time' => $close_time,
			'open_date' => $open_date,
			'close_date' => $close_date,
			'isDelete' => $isDelete,
			'durasi' => $input_durasi,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'cari_durasi' => $cari_durasi
			
		);

		$where = array(
			'id_keluhan' => $id_keluhan
		);

		$this->m_data_keluhan->update_data($where,$data,'tb_keluhan');
		redirect('c_keluhan/form_data_keluhan');
	}

	public function tampil_searchkeluhan() {
	  $data = array(
	  	'title'=>'Cari Data Keluhan - PLN',
	  	'status_user' => $this->session->userdata('status_user'),
	  	'get_layanan' => $this->m_data_keluhan->get_layanan(),
	  	'get_jeniskeluhan' => $this->m_data_keluhan->get_jeniskeluhan()
	  	
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('searchkeluhan',$data);
	  $this->load->view('element/footer');
	 } 

	public function filter_manual() 
	{
      	
		$sid = $this->input->post('id_layanan');
		$id_jeniskeluhan = $this->input->post('id_jeniskeluhan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$durasi = $this->input->post('durasi');
		
		if(isset($sid,$id_jeniskeluhan,$bulan,$tahun,$durasi))
		{
			if ($id_jeniskeluhan=='' && $bulan=='' && $tahun=='' && $durasi=='') {
				$hasil = $this->m_data_keluhan->cari_sid($sid);
			} elseif ($bulan=='' && $tahun=='' && $durasi=='' && $sid=='') {
				$hasil = $this->m_data_keluhan->cari_jg($id_jeniskeluhan);
			}
			elseif($id_jeniskeluhan=='' && $sid=='' && $tahun=='' && $durasi=='') {
				$hasil= $this->m_data_keluhan->cari_bulan($bulan);
			} elseif ($id_jeniskeluhan=='' && $sid=='' && $bulan=='' && $durasi=='') {
				$hasil= $this->m_data_keluhan->cari_tahun($tahun);
			} elseif ($id_jeniskeluhan=='' && $sid=='' && $bulan=='' && $tahun=='') {
				$hasil= $this->m_data_keluhan->cari_durasi($durasi);
			} elseif ($bulan =='' && $tahun =='' && $durasi =='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg($sid,$id_jeniskeluhan);
			}
			/*=====START CODING BAGAI QUDA BY SAULIA===*/
			elseif ($id_jeniskeluhan=='' && $tahun == '' && $durasi=='') {
				$hasil= $this->m_data_keluhan->cari_sid_b($sid,$bulan);
			}elseif ($id_jeniskeluhan=='' && $bulan == '' && $durasi=='') {
				$hasil= $this->m_data_keluhan->cari_sid_t($sid,$tahun);
			}elseif ($id_jeniskeluhan=='' && $bulan == '' && $tahun=='') {
				$hasil= $this->m_data_keluhan->cari_sid_d($sid,$durasi);
			}elseif ($sid=='' && $durasi == '' && $tahun=='') {
				$hasil= $this->m_data_keluhan->cari_jg_b($id_jeniskeluhan,$bulan);
			}elseif ($bulan =='' && $durasi =='' && $sid =='') {
				$hasil= $this->m_data_keluhan->cari_jg_t($id_jeniskeluhan,$tahun);
			}elseif ($bulan =='' && $tahun =='' && $sid =='') {
				$hasil= $this->m_data_keluhan->cari_jg_d($id_jeniskeluhan,$durasi);
			}elseif ($sid =='' && $id_jeniskeluhan =='' && $durasi =='') {
				$hasil= $this->m_data_keluhan->cari_b_t($bulan,$tahun);
			} elseif ($sid =='' && $id_jeniskeluhan =='' && $tahun =='') {
				$hasil= $this->m_data_keluhan->cari_b_d($bulan,$durasi);
			} elseif ($sid =='' && $id_jeniskeluhan =='' && $bulan =='') {
				$hasil= $this->m_data_keluhan->cari_t_d($tahun,$durasi);
			} elseif ($tahun =='' && $durasi =='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg_b($sid,$id_jeniskeluhan,$bulan);
			} elseif ($bulan =='' && $durasi =='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg_t($sid,$id_jeniskeluhan,$tahun);
			} elseif ($bulan =='' && $tahun =='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg_d($sid,$id_jeniskeluhan,$durasi);
			} elseif ($sid =='' && $durasi =='') {
				$hasil= $this->m_data_keluhan->cari_jg_b_t($id_jeniskeluhan,$bulan,$tahun);
			} elseif ($sid =='' && $tahun =='') {
				$hasil= $this->m_data_keluhan->cari_jg_b_d($id_jeniskeluhan,$bulan,$durasi);
			} elseif ($sid=='' && $bulan == '') {
				$hasil= $this->m_data_keluhan->cari_jg_t_d($id_jeniskeluhan,$tahun,$durasi);
			}elseif ($sid=='' && $id_jeniskeluhan== '') {
				$hasil= $this->m_data_keluhan->cari_b_t_d($bulan,$tahun,$durasi);
			}elseif ($durasi=='' && $id_jeniskeluhan== '') {
				$hasil= $this->m_data_keluhan->cari_sid_b_t($sid,$bulan,$tahun);
			}elseif ($tahun=='' && $id_jeniskeluhan== '') {
				$hasil= $this->m_data_keluhan->cari_sid_b_d($sid,$bulan,$durasi);
			}elseif ($bulan=='' && $id_jeniskeluhan== '') {
				$hasil= $this->m_data_keluhan->cari_sid_t_d($sid,$tahun,$durasi);
			}elseif ($durasi=='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg_b_t($sid,$id_jeniskeluhan,$bulan,$tahun);
			}elseif ($tahun=='') {
				$hasil= $this->m_data_keluhan->cari_sid_jg_b_d($sid,$id_jeniskeluhan,$bulan,$durasi);
			}elseif ($id_jeniskeluhan =='') {
				$hasil= $this->m_data_keluhan->cari_sid_b_t_d($sid,$bulan,$tahun,$durasi);
			} elseif ($sid =='') {
				$hasil= $this->m_data_keluhan->cari_jg_b_t_d($id_jeniskeluhan,$bulan,$tahun,$durasi);
			} 
			else{
				$hasil= $this->m_data_keluhan->cari_sid_jg_b_t_d($sid,$id_jeniskeluhan,$bulan,$tahun,$durasi);
			}
		}	

			$data=array(
            'status_user' => $this->session->userdata('status_user'),
        	'keluhan' => $hasil
        	);
        	$this->load->view('element/header', $data);
			//$this->load->view('pencarian_keluhan', $data);
			$this->load->view('form_data_keluhan', $data);
			$this->load->view('element/footer');
			
	}

	public function detail_waktu($id)
	{
		$data = $this->m_data_keluhan->get_keluhan_byid($id);
		echo json_encode($data);
	}

	public function keluhan_data($id_keluhan)
	{
		$data = $this->m_data_keluhan->get_jenis_keluhan($id_keluhan);
		echo(json_encode($data));
	}

	public function lokasi_data($sid)
	{
		$data = $this->m_data_keluhan->get_lokasi($sid);
		echo(json_encode($data));
	}


}
?>