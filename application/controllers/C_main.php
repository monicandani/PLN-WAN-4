<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {

 public function __construct(){
  parent::__construct();
  $this->load->helper('url');
 }

 public function index() {
  $this->load->view('loginpage');
 }


public function home() {
  $data=array (
    'title'=>'Beranda - PLN',
    'status_user' => $this->session->userdata('status_user')
      );
  $this->load->view('element/header',$data);
  $this->load->view('home');
  $this->load->view('element/footer');
 }

 public function home_user() {
  $data=array (
    'title'=>'Beranda - PLN',
    'status_user' => $this->session->userdata('status_user')
      );
  $this->load->view('element/header',$data);
  $this->load->view('home_user');
  $this->load->view('element/footer');
 }


/*public function waktu() {
  $this->load->view('element/header');
  $this->load->view('waktu');
  $this->load->view('element/footer');
 } */

/*public function area() {
  $this->load->view('element/header');
  $this->load->view('area');
  $this->load->view('element/footer');
 } 
*/

 public function search() {
  $this->load->view('element/header');
  $this->load->view('search');
  $this->load->view('element/footer');
 } 

 public function searchuser() {
  $this->load->view('searchuser');
 }

 public function searchkeluhan() {
  $this->load->view('element/header');
  $this->load->view('searchkeluhan');
  $this->load->view('element/footer');
 }
 
public function contoh() {
  $this->load->view('contoh/contoh1');
  $this->load->view('contoh/ui');
  $this->load->view('contoh/table');
  $this->load->view('contoh/forms');
  $this->load->view('contoh/login');
  $this->load->view('contoh/blank');
  $this->load->view('contoh/login');
 }

 public function logout(){
  unset($_SESSION["id_karyawan"]);
  $this->session->sess_destroy();
  redirect('c_main/index');
}

}