<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller{

    function __construct(){
        parent::__construct();      
        $this->load->model('m_login');
        $this->load->library(array('form_validation'));
        if (isset($_SESSION['id_karyawan'])){
            redirect ('c_main/home');
        }
    }

    function index(){
        $data=array(
            'title'=>'Masuk',
            'status_user' => $this->session->userdata('status_user'),
            

        );
        $this->load->view('element/header',$data);
        $this->load->view('loginpage');
        $this->load->view('element/footer');
    }

    public function aksi_login(){
        $no_karyawan = $this->input->post('no_karyawan');
        $password = $this->input->post('password');
        $where = array(
            'no_karyawan' => $no_karyawan,
            'password' => $password

            );
        $cek2 = $this->m_login->cek_login("tb_user",$where);
        $cek = $this->m_login->cek_login("tb_user",$where)->num_rows();
         
        
        
            if($cek > 0){
                foreach ($cek2->result() as $sess ) {
                    $sess_data['logged_in'] = 'Sudah Masuk';
                    $sess_data['no_karyawan'] = $sess->no_karyawan;
                    $sess_data['status_user'] = $sess->status_user;
                    //$sess_data['id_layanan'] = $sess->id_layanan;
                }
                $this->session->set_userdata($sess_data); 
                 /*redirect(base_url("c_main/home"));*/
               
               if($this->session->userdata('status_user')=='Admin' || $this->session->userdata('status_user')=='Input') 
               {
                    redirect(base_url("c_main/home"), 'refresh');
                }elseif($this->session->userdata('status_user')=='User' || $this->session->userdata('status_user')=='Viewer') {
                   redirect(base_url("c_main/home_user"), 'refresh');
                }
                
                
            }else{
                echo " <script>
                         alert('Gagal Masuk: Cek id dan password anda!');
                         history.go(-1);
                        </script>";
            }
        }
    
}