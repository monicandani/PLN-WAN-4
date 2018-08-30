<?php 

class C_gangguan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_gangguan');
        $this->load->helper('url');
  
	}

	public function form_data_gangguan() {
		$data=array (
		'title'=>'Data Gangguan - PLN',
		'status_user' => $this->session->userdata('status_user'),
	   	'gangguan' => $this->m_data_gangguan->tampil_gangguan(),
	   	'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan(),
	   	//'gangguan' => $this->m_data_gangguan->get_all()
	   	);
	  $this->load->view('element/header',$data);
	  $this->load->view('form_data_gangguan',$data);
	  $this->load->view('element/footer');
	 } 

	 public function history_gangguan() {
		$data=array (
		'title'=>'Histori Gangguan - PLN',
		'status_user' => $this->session->userdata('status_user'),
	   	'gangguan' => $this->m_data_gangguan->tampil_history_gangguan()
	   	);
	  $this->load->view('element/header',$data);
	  $this->load->view('history_gangguan',$data);
	  $this->load->view('element/footer');
	 } 

	 public function tampil_lokasi($id) {
	  $where = array('sid' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_layanan' => $this->m_data_gangguan->edit_data($where, 'tb_layanan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('area_gangguan',$data);
	  $this->load->view('element/footer');
	 } 

	 public function tampil_waktu($id) {
	  $where = array('id_gangguan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_waktu' => $this->m_data_gangguan->edit_data($where, 'tb_gangguan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('waktu_gangguan',$data);
	  $this->load->view('element/footer');
	 } 
	 public function tampil_waktu_pencarian($id) {
	  $where = array('id_gangguan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_waktu' => $this->m_data_gangguan->edit_data($where, 'tb_gangguan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('waktu_pencarian_gangguan',$data);
	  $this->load->view('element/footer');
	 } 
	 public function tampil_waktu_histori($id) {
	  $where = array('id_gangguan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_waktu' => $this->m_data_gangguan->edit_data($where, 'tb_gangguan')->result()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('waktu_histori_gangguan',$data);
	  $this->load->view('element/footer');
	 } 
// 
	public function form_tambah_gangguan() {
		$data = array(
		'title'=>'Tambah Gangguan - PLN',
		'status_user' => $this->session->userdata('status_user'),
	  	'get_layanan' => $this->m_data_gangguan->get_layanan(),
	  	'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan()
	  );
	  $this->load->view('element/header',$data);
	  $this->load->view('form_tambah_data_gangguan', $data);
	  $this->load->view('element/footer');
	 }

	public function form_jenis_gangguan($id) {
	 $where = array('id_gangguan' => $id);
	  $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'tampil_ket' => $this->m_data_gangguan->edit_data($where, 'tb_gangguan')->result()
	  );
	$this->load->view('element/header',$data);
	$this->load->view('form_jenis_gangguan',$data);
	$this->load->view('element/footer');
	} 

	public function gangguan_data($id_gangguan)
	{
		$data = $this->m_data_gangguan->get_jenis_gangguan($id_gangguan);
		echo(json_encode($data));
	}

	public function lokasi_data($sid)
	{
		$data = $this->m_data_gangguan->get_lokasi($sid);
		echo(json_encode($data));
	}

	function tambah_aksi_gangguan_email(){
		$this->form_validation->set_rules('id_layanan','Lokasi','required');
		$this->form_validation->set_rules('open_date','Open Date','required');
		$this->form_validation->set_rules('open_time','Open Time','required');
		
		if ($this->form_validation->run()) {
			$id_layanan = $this->input->post('id_layanan');
			$id_jenisgangguan= $this->input->post('id_jenisgangguan');
			$deskripsi_jenisgangguan = $this->input->post('deskripsi_jenisgangguan');
			$solusi_gangguan = $this->input->post('solusi_gangguan');
			$penyebab_gangguan = $this->input->post('penyebab_gangguan');
			$open_time = $this->input->post('open_time');
			$close_time = $this->input->post('close_time');
			$open_date = $this->input->post('open_date');
			$close_date = $this->input->post('close_date');
			$lokasi_gangguan = $this->input->post('lokasi_gangguan');

			$bulan = date("m", strtotime($open_date)); 
			$tahun = date("Y", strtotime($open_date)); 
			if ($close_date != "" && $close_time !="") {
				$start_date = new DateTime($open_date.' '.$open_time);
				$end_date = new DateTime($close_date.' '.$close_time);
				$durasi = date_diff($end_date, $start_date);
				$durasi_jam = $durasi->d*24;
				$cari_durasi = $durasi->h+$durasi_jam;
				$input_durasi = ($durasi->h+$durasi_jam).':'.$durasi->i.':'.$durasi->s;
				
			} else {
				$input_durasi = '0:00:00';
			}	

			$data=array(
				'id_layanan' => $id_layanan,
				'id_jenisgangguan' => $id_jenisgangguan,
				'deskripsi_jenisgangguan' => $deskripsi_jenisgangguan,
				'solusi_gangguan' => $solusi_gangguan,
				'penyebab_gangguan' => $penyebab_gangguan,
				'open_time' => $open_time,
				'close_time' => $close_time,
				'open_date' => $open_date,
				'close_date' => $close_date,
				'lokasi_gangguan' => $lokasi_gangguan,
				'durasi' => $input_durasi,
				'cari_durasi' => $cari_durasi,
				'bulan' => $bulan,
				'tahun' => $tahun			
			);

		$this->m_data_gangguan->input_gangguan($data, 'tb_gangguan');

				// Konfigurasi email.
        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => '10.1.2.25',
               'smtp_user' => 'helpdesk.tikd',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'pln@123ti',             // Password gmail Anda.
               'smtp_port' => 25,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];

        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('sekretariatdki.sm@pln.co.id', 'Informasi AMS');    // Email dan nama pegirim.
        $this->email->to('moncandani@gmail.com');                       // Penerima email.
 
        
        // Subject email.
        $this->email->subject('Notifikasi Penambahan Data Gangguan');
 
        // Isi email. Bisa dengan format html.
        $this->email->message('Data gangguan baru telah ditambahkan');
 
        if ($this->email->send())
        {
            echo 'Sukses! email berhasil dikirim.';
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }   


		redirect('c_gangguan/form_data_gangguan');
		echo " <script>
	                alert('Registrasi sukses. Keluhan berhasil ditambahkan');
	                window.location='form_data_keluhan'
	                </script>";
		
		} else {
			$data=array (
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
            'get_layanan' => $this->m_data_gangguan->get_layanan(),
		  	'get_jeniskeluhan' => $this->m_data_gangguan->get_jenisgangguan()
        	);
		  $this->load->view('element/header',$data);
		  $this->load->view('form_tambah_data_gangguan', $data);
		  $this->load->view('element/footer');
		}
		
	}


	function hapus_gangguan($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_gangguan' => $id
		);
		$this->m_data_gangguan->update_data($where,$data,'tb_gangguan');
		redirect('c_gangguan/form_data_gangguan');
	}

	function edit_gangguan($id){
		$where = array('id_gangguan' => $id);
		$data=array (
			'title'=>'Edit Gangguan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'gangguan' => $this->m_data_gangguan->edit_data($where,'tb_gangguan')->result(),
        	'get_layanan' => $this->m_data_gangguan->get_layanan(),
	  		'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('edit_data_gangguan',$data);
		$this->load->view('element/footer');
	}

	function update_gangguan(){
		$id_layanan = $this->input->post('id_layanan');
		$id_jenisgangguan = $this->input->post('id_jenisgangguan');
		$deskripsi_jenisgangguan = $this->input->post('deskripsi_jenisgangguan');
		$solusi_gangguan = $this->input->post('solusi_gangguan');
		$penyebab_gangguan = $this->input->post('penyebab_gangguan');
		$open_time = $this->input->post('open_time');
		$close_time = $this->input->post('close_time');
		$open_date = $this->input->post('open_date');
		$close_date = $this->input->post('close_date');
		$id_gangguan = $this->input->post('id_gangguan');
		$isDelete = $this->input->post('isDelete');
		$lokasi_gangguan = $this->input->post('lokasi_gangguan');

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
			'id_jenisgangguan' => $id_jenisgangguan,
			'deskripsi_jenisgangguan' => $deskripsi_jenisgangguan,
			'solusi_gangguan' => $solusi_gangguan,
			'penyebab_gangguan' => $penyebab_gangguan,
			'open_time' => $open_time,
			'close_time' => $close_time,
			'open_date' => $open_date,
			'close_date' => $close_date,
			'lokasi_gangguan' => $lokasi_gangguan,
			'isDelete' => $isDelete,
			'lokasi_gangguan' => $lokasi_gangguan,
			'durasi' => $input_durasi,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'cari_durasi' =>$cari_durasi
			
		);

		$where = array(
			'id_gangguan' => $id_gangguan
		);

		$this->m_data_gangguan->update_data($where,$data,'tb_gangguan');
		redirect('c_gangguan/form_data_gangguan');
	}



	function jenisgangguan(){
		$data=array(
			'title'=>'Kategori Gangguan - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'jenisgangguan' => $this->m_data_gangguan->tampil_jenisgangguan()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('jenisgangguan',$data);
 		$this->load->view('element/footer');
	}

	function tambah_jenisgangguan(){
		$data=array(
			'title'=>'Kategori Gangguan - PLN',
			'status_user' => $this->session->userdata('status_user'),
		);
		$this->load->view('element/header', $data);
  		$this->load->view('tambahgangguan');
 		$this->load->view('element/footer');
	}

	function tambah_aksi_jenisgangguan(){
		$this->form_validation->set_rules('jenis_gangguan','Jenis Gangguan','required');


		if ($this->form_validation->run()){
			$jenis_gangguan = $this->input->post('jenis_gangguan');
			$ket_gangguan = $this->input->post('ket_gangguan');

			$data=array(
					'jenis_gangguan' => $jenis_gangguan,
					'ket_gangguan' => $ket_gangguan
				);
			$this->m_data_gangguan->input_gangguan($data, 'tb_jenisgangguan');
			redirect('c_gangguan/jenisgangguan');
			echo " <script>
	                     alert('Registrasi sukses. Jenis gangguan berhasil ditambahkan');
	                     window.location='jenisgangguan'
	                    </script>";
		} else {
			$data=array (
			'title'=>'Tambah Gangguan - PLN',
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
        	);
	        $this->load->view('element/header',$data);	
			$this->load->view('tambahgangguan',$data);
			$this->load->view('element/footer');
		}
		
	}

	function hapus_jenisgangguan($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_jenisgangguan' => $id
		);
		$this->m_data_gangguan->update_data($where,$data,'tb_jenisgangguan');
		redirect('c_gangguan/jenisgangguan');
	}


	function edit_jenisgangguan($id){
		$where = array('id_jenisgangguan' => $id);
		$data=array (
			'title'=>'Kategori Gangguan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'jenisgangguan' => $this->m_data_gangguan->edit_data($where,'tb_jenisgangguan')->result()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('editgangguan',$data);
		$this->load->view('element/footer');
	}

	function update_jenisgangguan(){
		$id_jenisgangguan = $this->input->post('id_jenisgangguan');
		$jenis_gangguan = $this->input->post('jenis_gangguan');
		$ket_gangguan = $this->input->post('ket_gangguan');
		
		$data = array(
			'jenis_gangguan' => $jenis_gangguan,
			'ket_gangguan' => $ket_gangguan
		);

		$where = array(
			'id_jenisgangguan' => $id_jenisgangguan
		);

		$this->m_data_gangguan->update_data($where,$data,'tb_jenisgangguan');
		redirect('c_gangguan/jenisgangguan');
	}

	//tampil progress by id
	public function progress($id) {
		$data=array(
			'title'=>'Data Progress - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'progress' => $this->m_data_gangguan->tampil_progress($id),
			'id' => $id,
			'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan()
		);
		$this->load->view('element/header', $data);
		$this->load->view('progress',$data);
		$this->load->view('element/footer');
	}

	function tambah_progress($id){
		$where = array('id_gangguan' => $id);
		$data=array (
			'title'=>'Form Progress - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'gangguan' => $this->m_data_gangguan->edit_data($where,'tb_gangguan')->result(),
        	'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('form_tambah_progress',$data);
		$this->load->view('element/footer');
	}
	//untuk tambah progress
	public function ambil_data_gangguan($id)
	{
		$data = $this->m_data_gangguan->get_gangguan_byid($id);
		echo json_encode($data);
	}

	public function ambil_data_progress($id)
	{
		$data = $this->m_data_gangguan->get_progress_byid($id);
		echo json_encode($data);
	}

	function tambah_aksi_progress(){
		$id_gangguan = $this->input->post('id_gangguan');
		$open_date = $this->input->post('open_date');
		$open_time = $this->input->post('open_time');
		$ket_progress = $this->input->post('ket_progress');
		$status_progress = $this->input->post('status_progress');
		$waktu =  $this->input->post('waktu');
		$penyebab_gangguan =  $this->input->post('penyebab_gangguan');
		$lokasi_gangguan =  $this->input->post('lokasi_gangguan');
		$solusi_gangguan =  $this->input->post('solusi_gangguan');
		$id_jenisgangguan =  $this->input->post('id_jenisgangguan');


		if ($status_progress == "2") {
			$isSolved = 'yes';
			$close_date = date("Y-m-d");
			date_default_timezone_set("Asia/Jakarta");
			$close_time = date("h:i:s a");

			$start_date = new DateTime($open_date.' '.$open_time);
			$end_date = new DateTime($close_date.' '.$close_time);
			$durasi = date_diff($end_date, $start_date);
			$durasi_jam = $durasi->d*24;
			$input_durasi = ($durasi->h+$durasi_jam).':'.$durasi->i.':'.$durasi->s;
			$cari_durasi = $durasi->h+$durasi_jam.$durasi->i;

			$data=array(
			'close_date' => $close_date,
			'close_time' =>$close_time,
			'durasi' => $input_durasi,
			'isSolved' => $isSolved,
			'solusi_gangguan' => $solusi_gangguan,
			'penyebab_gangguan' => $penyebab_gangguan,
			'lokasi_gangguan' => $lokasi_gangguan,
			'id_jenisgangguan' => $id_jenisgangguan,
			'cari_durasi' => $cari_durasi
			);
			$where = array(
				'id_gangguan' => $id_gangguan
			);

			$this->m_data_gangguan->update_data($where,$data,'tb_gangguan');
		}		

		$data=array(
			'id_gangguan' => $id_gangguan,
			'ket_progress' => $ket_progress,
			'waktu' => $waktu,
			'status_progress' => $status_progress
		);
		$this->m_data_gangguan->input_gangguan($data, 'tb_progress');
		redirect('c_gangguan/progress/'.$id_gangguan);
	}

	function hapus_progress($id){
		$where = array('id_progress' => $id);
		$id_gangguan = $this->db->get_where('tb_progress', $where)->row_array()['id_gangguan'];
		$this->m_data_gangguan->hapus_data($where,'tb_progress');
		redirect('c_gangguan/progress/'.$id_gangguan);
	}

	function edit_progress($id){
		$where = array('id_progress' => $id);
		$data=array (
			'status_user' => $this->session->userdata('status_user'),
        	'progress' => $this->m_data_gangguan->edit_data($where,'tb_progress')->result(),
        	);
		$this->load->view('element/header', $data);
		$this->load->view('form_edit_progress',$data);
		$this->load->view('element/footer');
	}

	function update_progress(){
		$id_gangguan = $this->input->post('id_gangguan');
		$waktu = $this->input->post('waktu');
		$ket_progress = $this->input->post('ket_progress');
		$status_progress = $this->input->post('status_progress');
		$id_progress = $this->input->post('id_progress');
		$open_date = $this->input->post('open_date');
		$open_time = $this->input->post('open_time');
		$penyebab_gangguan =  $this->input->post('penyebab_gangguan');
		$lokasi_gangguan =  $this->input->post('lokasi_gangguan');
		$solusi_gangguan =  $this->input->post('solusi_gangguan');

		if ($status_progress == "2") {
			$isSolved = 'yes';
			$close_date = date("Y-m-d");
			date_default_timezone_set("Asia/Jakarta");
			$close_time = date("h:i:s a");

			$start_date = new DateTime($open_date.' '.$open_time);
			$end_date = new DateTime($close_date.' '.$close_time);
			$durasi = date_diff($end_date, $start_date);
			$durasi_jam = $durasi->d*24;
			$input_durasi = ($durasi->h+$durasi_jam).':'.$durasi->i.':'.$durasi->s;
			$cari_durasi = $durasi->h+$durasi_jam.$durasi->i;

			$data=array(
				'close_date' => $close_date,
				'close_time' =>$close_time,
				'durasi' => $input_durasi,
				'isSolved' =>$isSolved,
				'solusi_gangguan' => $solusi_gangguan,
				'penyebab_gangguan' => $penyebab_gangguan,
				'lokasi_gangguan' => $lokasi_gangguan,
				'cari_durasi' => $cari_durasi
			);
			$where = array(
				'id_gangguan' => $id_gangguan
			);

			$this->m_data_gangguan->update_data($where,$data,'tb_gangguan');
		} elseif($status_progress == '1') {
			$isSolved = 'no';

			$data=array(
				'isSolved' => $isSolved
			);
			$where = array(
				'id_gangguan' => $id_gangguan
			);

			$this->m_data_gangguan->update_data($where,$data,'tb_gangguan');
		}
		
		$data = array(
			'id_gangguan' => $id_gangguan,
			'ket_progress' => $ket_progress,
			'waktu' => $waktu,
			'status_progress' => $status_progress
		);

		$where = array(
			'id_progress' => $id_progress
		);

		$this->m_data_gangguan->update_data($where,$data,'tb_progress');
		redirect('c_gangguan/progress/'.$id_gangguan);
	}


	public function tampil_ket($id)
	{
		$data =  $this->m_data_gangguan->tampil_gangguan_byid($id);

		echo json_encode($data);
	}

	

	public function tampil_searchgangguan() {
	  $data = array(
	  	'title'=>'Cari Data Gangguan - PLN',
	  	'status_user' => $this->session->userdata('status_user'),
	  	'get_layanan' => $this->m_data_gangguan->get_layanan(),
	  	'get_jenisgangguan' => $this->m_data_gangguan->get_jenisgangguan()
	  	
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('searchgangguan',$data);
	  $this->load->view('element/footer');

	  if (isset($_SESSION['hasil_pencarian'])) {
	  	unset($_SESSION['hasil_pencarian']);
	  }
	}

	 public function coba_searchgangguan() {
	  $this->load->view('element/header');
	  $this->load->view('coba_searchgangguan');
	  $this->load->view('element/footer');
	 } 

	 public function filter(){
	  $sid = $this->input->post('sid');
	  $id_jenisgangguan = $this->input->post('id_jenisgangguan');
	 $bulan = $this->input->post('bulan');
	  $tahun = $this->input->post('tahun');
	  //$durasi = $this->input->post('durasi');
	
	  if($sid != ""){
	   $kondisi['sid'] = $sid;
	  }

	  if($id_jenisgangguan != ""){
	   $kondisi['id_jenisgangguan'] = $id_jenisgangguan;
	  }

	  if($bulan != ""){
	   $kondisi['bulan'] = $bulan;
	  }

	  if($tahun != ""){
	   $kondisi['tahun'] = $tahun;
	  }

	  /*$filter = $this->model->get_data($kondisi);
	 $this->load->view('layout/wrapper',$filter);*/

	 $data = array(
	  	'status_user' => $this->session->userdata('status_user'),
	  	'gangguan' => $this->m_data_gangguan->get_data($kondisi)
	  );
		//$gangguan = $this->m_data_gangguan->get_data($kondisi);

	  $this->load->view('element/header', $data);
	  $this->load->view('form_data_gangguan',$data);
	  $this->load->view('element/footer');

	}


	public function filter_manual() 
	{

		$sid= $this->input->post('id_layanan');
		$id_jenisgangguan = $this->input->post('id_jenisgangguan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$durasi = $this->input->post('durasi');
		
		if(isset($sid,$id_jenisgangguan,$bulan,$tahun,$durasi))
		{
			if ($id_jenisgangguan=='' && $bulan=='' && $tahun=='' && $durasi=='') {
				$hasil = $this->m_data_gangguan->cari_sid($sid);
			} elseif ($bulan=='' && $tahun=='' && $durasi=='' && $sid=='') {
				$hasil = $this->m_data_gangguan->cari_jg($id_jenisgangguan);
			}
			elseif($id_jenisgangguan=='' && $sid=='' && $tahun=='' && $durasi=='') {
				$hasil= $this->m_data_gangguan->cari_bulan($bulan);
			} elseif ($id_jenisgangguan=='' && $sid=='' && $bulan=='' && $durasi=='') {
				$hasil= $this->m_data_gangguan->cari_tahun($tahun);
			} elseif ($id_jenisgangguan=='' && $sid=='' && $bulan=='' && $tahun=='') {
				$hasil= $this->m_data_gangguan->cari_durasi($durasi);
			} elseif ($bulan =='' && $tahun =='' && $durasi =='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg($sid,$id_jenisgangguan);
			}
			/*=====START CODING BAGAI QUDA BY SAULIA===*/
			elseif ($id_jenisgangguan=='' && $tahun == '' && $durasi=='') {
				$hasil= $this->m_data_gangguan->cari_sid_b($sid,$bulan);
			}elseif ($id_jenisgangguan=='' && $bulan == '' && $durasi=='') {
				$hasil= $this->m_data_gangguan->cari_sid_t($sid,$tahun);
			}elseif ($id_jenisgangguan=='' && $bulan == '' && $tahun=='') {
				$hasil= $this->m_data_gangguan->cari_sid_d($sid,$durasi);
			}elseif ($sid=='' && $durasi == '' && $tahun=='') {
				$hasil= $this->m_data_gangguan->cari_jg_b($id_jenisgangguan,$bulan);
			}elseif ($bulan =='' && $durasi =='' && $sid =='') {
				$hasil= $this->m_data_gangguan->cari_jg_t($id_jenisgangguan,$tahun);
			}elseif ($bulan =='' && $tahun =='' && $sid =='') {
				$hasil= $this->m_data_gangguan->cari_jg_d($id_jenisgangguan,$durasi);
			}elseif ($sid =='' && $id_jenisgangguan =='' && $durasi =='') {
				$hasil= $this->m_data_gangguan->cari_b_t($bulan,$tahun);
			} elseif ($sid =='' && $id_jenisgangguan =='' && $tahun =='') {
				$hasil= $this->m_data_gangguan->cari_b_d($bulan,$durasi);
			} elseif ($sid =='' && $id_jenisgangguan =='' && $bulan =='') {
				$hasil= $this->m_data_gangguan->cari_t_d($tahun,$durasi);
			} elseif ($tahun =='' && $durasi =='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg_b($sid,$id_jenisgangguan,$bulan);
			} elseif ($bulan =='' && $durasi =='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg_t($sid,$id_jenisgangguan,$tahun);
			} elseif ($bulan =='' && $tahun =='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg_d($sid,$id_jenisgangguan,$durasi);
			} elseif ($sid =='' && $durasi =='') {
				$hasil= $this->m_data_gangguan->cari_jg_b_t($id_jenisgangguan,$bulan,$tahun);
			} elseif ($sid =='' && $tahun =='') {
				$hasil= $this->m_data_gangguan->cari_jg_b_d($id_jenisgangguan,$bulan,$durasi);
			} elseif ($sid=='' && $bulan == '') {
				$hasil= $this->m_data_gangguan->cari_jg_t_d($id_jenisgangguan,$tahun,$durasi);
			}elseif ($sid=='' && $id_jenisgangguan== '') {
				$hasil= $this->m_data_gangguan->cari_b_t_d($bulan,$tahun,$durasi);
			}elseif ($durasi=='' && $id_jenisgangguan== '') {
				$hasil= $this->m_data_gangguan->cari_sid_b_t($sid,$bulan,$tahun);
			}elseif ($tahun=='' && $id_jenisgangguan== '') {
				$hasil= $this->m_data_gangguan->cari_sid_b_d($sid,$bulan,$durasi);
			}elseif ($bulan=='' && $id_jenisgangguan== '') {
				$hasil= $this->m_data_gangguan->cari_sid_t_d($sid,$tahun,$durasi);
			}elseif ($durasi=='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg_b_t($sid,$id_jenisgangguan,$bulan,$tahun);
			}elseif ($tahun=='') {
				$hasil= $this->m_data_gangguan->cari_sid_jg_b_d($sid,$id_jenisgangguan,$bulan,$durasi);
			}elseif ($id_jenisgangguan =='') {
				$hasil= $this->m_data_gangguan->cari_sid_b_t_d($sid,$bulan,$tahun,$durasi);
			} elseif ($sid =='') {
				$hasil= $this->m_data_gangguan->cari_jg_b_t_d($id_jenisgangguan,$bulan,$tahun,$durasi);
			} 
			else{
				$hasil= $this->m_data_gangguan->cari_sid_jg_b_t_d($sid,$id_jenisgangguan,$bulan,$tahun,$durasi);
			}

			$data=array(
            'title'=>'Pencarian Data - PLN',
            'status_user' => $this->session->userdata('status_user'),
        	'gangguan' => $hasil
        	);
        	$this->load->view('element/header', $data);
			$this->load->view('form_data_gangguan', $data);
			$this->load->view('element/footer');
		}

		//$this->hasil_pencarian_gangguan($hasil);
	}

	/*public function hasil_pencarian_gangguan($hasil=null)
	{
		$data=array(
        	'status_user' => $this->session->userdata('status_user'),
    	);
    	
    	if (isset($_SESSION) && !isset($hasil)) {
    		$data['gangguan'] = $_SESSION['hasil_pencarian'];
    	}else{
    		$data['gangguan'] = $hasil;
			$_SESSION['hasil_pencarian'] = $hasil;
    	}

    	$this->load->view('element/header', $data);
		//$this->load->view('pencarian_gangguan', $data);
		$this->load->view('form_data_gangguan', $data);
		$this->load->view('element/footer');
	}*/

	public function detail_waktu($id)
	{
		$data = $this->m_data_gangguan->get_gangguan_byid($id);
		echo json_encode($data);
	}

	/*function tambah_aksi_gangguan(){

		$id_layanan = $this->input->post('id_layanan');
		$id_jenisgangguan= $this->input->post('id_jenisgangguan');
		$deskripsi_jenisgangguan = $this->input->post('deskripsi_jenisgangguan');
		$solusi_gangguan = $this->input->post('solusi_gangguan');
		$penyebab_gangguan = $this->input->post('penyebab_gangguan');
		$open_time = $this->input->post('open_time');
		$close_time = $this->input->post('close_time');
		$open_date = $this->input->post('open_date');
		$close_date = $this->input->post('close_date');
		$lokasi_gangguan = $this->input->post('lokasi_gangguan');

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
			'id_jenisgangguan' => $id_jenisgangguan,
			'deskripsi_jenisgangguan' => $deskripsi_jenisgangguan,
			'solusi_gangguan' => $solusi_gangguan,
			'penyebab_gangguan' => $penyebab_gangguan,
			'open_time' => $open_time,
			'close_time' => $close_time,
			'open_date' => $open_date,
			'close_date' => $close_date,
			'lokasi_gangguan' => $lokasi_gangguan,
			'durasi' => $input_durasi,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'cari_durasi' => $cari_durasi
			
		);
		$this->m_data_gangguan->input_gangguan($data, 'tb_gangguan');

		// Konfigurasi email.
        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => '10.1.2.25',
               'smtp_user' => 'helpdesk.tikd',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'pln@123ti',             // Password gmail Anda.
               'smtp_port' => 25,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];

        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('sekretariatdki.sm@pln.co.id', 'Informasi AMS');    // Email dan nama pegirim.
        $this->email->to('moncandani@gmail.com');                       // Penerima email.
 
        
        // Subject email.
        $this->email->subject('Notifikasi Penambahan Data Gangguan');
 
        // Isi email. Bisa dengan format html.
        $this->email->message('Data gangguan baru telah ditambahkan');
 
        if ($this->email->send())
        {
            echo 'Sukses! email berhasil dikirim.';
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }   
		redirect('c_gangguan/form_data_gangguan');
		
	}

*/
	public function kirim_email()
    {
        // Konfigurasi email.
        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'moncandani@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'b1819djj',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('moncandani@gmail.com', 'Monica Ratna A');    // Email dan nama pegirim.
        $this->email->to('sauliakarina@gmail.com');                       // Penerima email.
 
        
        // Subject email.
        $this->email->subject('Kirim Email pada CodeIgniter');
 
        // Isi email. Bisa dengan format html.
        $this->email->message('data gangguan ditambahkan');
 
        if ($this->email->send())
        {
            echo 'Sukses! email berhasil dikirim.';
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }



}