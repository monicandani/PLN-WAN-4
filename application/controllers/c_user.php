<?php 

class C_user extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_user');
        $this->load->helper('url');
	}

	function user(){
		$data=array(
			'title'=>'Pengguna - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'user' => $this->m_data_user->tampil_user()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('formuser',$data);
 		$this->load->view('element/footer');
	}

	function tambah_user(){
		$data=array(
			'title'=>'Pengguna - PLN',
			'status_user' => $this->session->userdata('status_user'),
			'user' => $this->m_data_user->tampil_user()
		);
		$this->load->view('element/header', $data);
  		$this->load->view('registerpage',$data);
 		$this->load->view('element/footer');
	}

	function tambah_aksi_user(){
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('no_karyawan','No Karyawan','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('status_user','Status','required');

		if ($this->form_validation->run()) {
			$nama = $this->input->post('nama');
			$password = $this->input->post('password');
			$status_user = $this->input->post('status_user');
			$no_karyawan = $this->input->post('no_karyawan');

			if ($this->m_data_user->cek_id_karyawan($no_karyawan) == 0) {
				$data=array(
				'nama' => $nama,
				'no_karyawan' => $no_karyawan,
				'password' => $password,
				'status_user' => $status_user

				);
				$this->m_data_user->input_user($data, 'tb_user');
				redirect('c_user/user');
				echo " <script>
	                     alert('Registrasi sukses. Akun berhasil didaftarkan');
	                     window.location='user'
	                    </script>";
			} else{
				echo " <script>
                     alert('Registrasi gagal. ID karyawan sudah terdaftar');
                     window.location='tambah_user'
                    </script>";
				}
 	
		} else {
			$data=array (
			'title'=>'Pengguna - PLN',
        	'status_user' => $this->session->userdata('status_user'),
            'error_validation' => validation_errors(),
            'user' => $this->m_data_user->tampil_user()
        	);
        $this->load->view('element/header',$data);	
		$this->load->view('registerpage',$data);
		$this->load->view('element/footer');
		}

		
	}

	function hapus_user($id){
		$data = array(
		'isDelete' => 'yes'
		);
		$where = array(
		'id_karyawan' => $id);
		$this->m_data_user->update_data($where,$data,'tb_user');
		redirect('c_user/user');
	}

	// function hapus_user($id){
	// 	$where = array('id_karyawan' => $id);
	// 	$this->m_data_user->hapus_user($where,'tb_user');
	// 	redirect('c_user/user');
	// }

	function edit_user($id){
		$where = array('id_karyawan' => $id);
		$data=array (
			'title'=>'Pengguna - PLN',
			'status_user' => $this->session->userdata('status_user'),
        	'user' => $this->m_data_user->edit_data($where,'tb_user')->result()
        	);
		$this->load->view('element/header', $data);
		$this->load->view('form_edit_user',$data);
		$this->load->view('element/footer');
	}

	function update_user(){
		$id_karyawan = $this->input->post('id_karyawan');
		$no_karyawan = $this->input->post('no_karyawan');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$status_user = $this->input->post('status_user');
		
		$data = array(
			'nama' => $nama,
			'password' => $password,
			'status_user' => $status_user,
			'no_karyawan' =>$no_karyawan
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->m_data_user->update_data($where,$data,'tb_user');
		redirect('c_user/user');
	}

}
