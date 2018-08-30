<?php 

class C_layanan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_layanan');
        $this->load->helper('url');
	}

	 public function form_layanan(){
		$data=array(
			'title'=>'Layanan - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'layanan' => $this->m_data_layanan->tampil_layanan()

		);
	  $this->load->view('element/header', $data);
	  $this->load->view('form_layanan', $data);
	  $this->load->view('element/footer');
	 }


	public function form_tambah_layanan(){
	  $data = array(
	  	'title'=>'Tambah Layanan - PLN',
	  	'status_user' => $this->session->userdata('status_user'),
	  	'get_jenislayanan' => $this->m_data_layanan->get_jenislayanan()
	  );
	  $this->load->view('element/header', $data);
	  $this->load->view('form_tambah_layanan', $data);
	  $this->load->view('element/footer');
	 }

	function hapus_layanan($id){
		$data = array(
		'isDelete' => 'yes',
		'sid' => '0000000000000'
		);
		$where = array(
		'id_layanan' => $id
		);
		$this->m_data_layanan->update_data($where,$data,'tb_layanan');
		redirect('c_layanan/form_layanan');
	}


	 function edit_layanan($id){
		$where = array('id_layanan' => $id);
		$data=array (
			'title'=>'Layanan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'layanan' => $this->m_data_layanan->edit_data($where,'tb_layanan')->result(),
        	'get_jenislayanan' => $this->m_data_layanan->get_jenislayanan()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('form_edit_layanan',$data);
		$this->load->view('element/footer');
	}

	function update_layanan(){
		$id_layanan = $this->input->post('id_layanan');
		$sid = $this->input->post('sid');
		$lokasi = $this->input->post('lokasi'); 
		$kapasitas = $this->input->post('kapasitas'); 
		$nama_pic = $this->input->post('nama_pic');
		$no_hp_pic = $this->input->post('no_hp_pic');
		$email = $this->input->post('email');
		$id_jenislayanan = $this->input->post('id_jenislayanan');
		$isDelete = $this->input->post('isDelete');


		$data=array(
			'lokasi' => $lokasi,
			'kapasitas' => $kapasitas,
			'nama_pic' => $nama_pic,
			'no_hp_pic' => $no_hp_pic,
			'email' => $email,
			'id_jenislayanan' => $id_jenislayanan,
			'isDelete' => $isDelete,
			'sid' => $sid

		);

		$where = array(
			'id_layanan' => $id_layanan
		);

		$this->m_data_layanan->update_data($where,$data,'tb_layanan');
		redirect('c_layanan/form_layanan');
	}


	function jenislayanan(){
		$data=array(
			'title'=>'Kategori Layanan - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'jenislayanan' => $this->m_data_layanan->tampil_jenislayanan()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('jenislayanan',$data);
 		$this->load->view('element/footer');
	}

	function tambah_jenislayanan(){
		$data=array(
			'title'=>'Kategori Layanan - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'jenislayanan' => $this->m_data_layanan->tampil_jenislayanan()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('tambahlayanan',$data);
 		$this->load->view('element/footer');
	}

	function tambah_aksi_jenislayanan(){
		$jenis_layanan = $this->input->post('nama_layanan');

		$data=array(
			'nama_layanan' => $jenis_layanan,
		);
		$this->m_data_layanan->input_layanan($data, 'tb_jenislayanan');
		redirect('c_layanan/jenislayanan');
	}

	function edit_jenislayanan($id){
		$where = array('id_jenislayanan' => $id);
		$data=array (
			'title'=>'Kategori Layanan - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'jenislayanan' => $this->m_data_layanan->edit_data($where,'tb_jenislayanan')->result()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('form_edit_jenis_layanan',$data);
		$this->load->view('element/footer');
	}

	function update_jenislayanan(){
		$id_jenislayanan = $this->input->post('id_jenislayanan');
		$nama_layanan = $this->input->post('nama_layanan');
		
		$data = array(
			'nama_layanan' => $nama_layanan
		);

		$where = array(
			'id_jenislayanan' => $id_jenislayanan
		);

		$this->m_data_layanan->update_data($where,$data,'tb_jenislayanan');
		redirect('c_layanan/jenislayanan');
	}
	
	function hapus_jenislayanan($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_jenislayanan' => $id
		);
		$this->m_data_layanan->update_data($where,$data,'tb_jenislayanan');
		redirect('c_layanan/jenislayanan');
	}

	function tambah_layanan(){
		$data=array (
			'status_user' => $this->session->userdata('status_user'),
        	);
		$this->load->view('element/header',$data);
  		$this->load->view('form_tambah_layanan', $data);
 		$this->load->view('element/footer');
	}

	function tambah_aksi_layanan(){
		$this->form_validation->set_rules('sid','SID','required');
		$this->form_validation->set_rules('lokasi','Lokasi','required');
		$this->form_validation->set_rules('id_jenislayanan','Jenis Layanan','required');

		if ($this->form_validation->run()) {
			$sid = $this->input->post('sid');
			$lokasi = $this->input->post('lokasi');
			$kapasitas = $this->input->post('kapasitas');
			$nama_pic = $this->input->post('nama_pic');
			$no_hp_pic = $this->input->post('no_hp_pic');
			$email = $this->input->post('email');
			$id_jenislayanan = $this->input->post('id_jenislayanan');

			if ($this->m_data_layanan->cek_sid($sid) == 0) {
				$data=array(
				'sid' => $sid,
				'lokasi' => $lokasi,
				'kapasitas' => $kapasitas,
				'nama_pic' => $nama_pic,
				'no_hp_pic' => $no_hp_pic,
				'email' => $email,
				'id_jenislayanan' => $id_jenislayanan,

				);
				$this->m_data_layanan->input_layanan($data, 'tb_layanan');
				redirect('c_layanan/form_layanan');
				echo " <script>
                     alert('Registrasi sukses. Layanan berhasil ditambahkan');
                     window.location='form_layanan'
                    </script>";
			} else{
				echo " <script>
                     alert('Registrasi gagal. SID sudah didaftarkan');
                     window.location='form_tambah_layanan'
                    </script>";
			}

		} else {
			$data=array (
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
            'get_jenislayanan' => $this->m_data_layanan->get_jenislayanan()
        	);
        $this->load->view('element/header',$data);	
		$this->load->view('form_tambah_layanan',$data);
		$this->load->view('element/footer');
		}	
		
	}

}