<?php

class C_form extends CI_Controller {

 /*public function form_tambah_data_gangguan() {
  $this->load->view('element/header');
  $this->load->view('form_tambah_data_gangguan');
  $this->load->view('element/footer');
 } */

 /*public function edit_data_gangguan() {
  $this->load->view('element/header');
  $this->load->view('edit_data_gangguan');
  $this->load->view('element/footer');
 } */

 /*public function form_data_gangguan() {
  $this->load->view('element/header');
  $this->load->view('form_data_gangguan');
  $this->load->view('element/footer');
 } */

 /*public function form_data_keluhan() {
  $this->load->view('element/header');
  $this->load->view('form_data_keluhan');
  $this->load->view('element/footer');
 } */

 
/*
 public function edit_data_keluhan() {
  $this->load->view('element/header');
  $this->load->view('edit_data_keluhan');
  $this->load->view('element/footer');
 } 
*/


 /*public function form_tambah_layanan(){
  $this->load->view('element/header');
  $this->load->view('form_tambah_layanan');
  $this->load->view('element/footer');
 }*/

/*public function form_edit_layanan(){
  $this->load->view('element/header');
  $this->load->view('form_edit_layanan');
  $this->load->view('element/footer');
 }*/

 /*public function form_edit_user(){
  $this->load->view('element/header');
  $this->load->view('form_edit_user');
  $this->load->view('element/footer');
 }*/

 /*public function jenislayanan() {
  $this->load->view('element/header');
  $this->load->view('jenislayanan');
  $this->load->view('element/footer');
 } */

 // public function form_tambah_jenis_layanan(){
 //  $this->load->view('element/header');
 //  $this->load->view('form_tambah_jenis_layanan');
 //  $this->load->view('element/footer');
 // }

/* public function form_edit_jenis_layanan(){
  $this->load->view('element/header');
  $this->load->view('form_edit_jenis_layanan');
  $this->load->view('element/footer');
 }*/


 // public function formuser() {
 //  $this->load->view('element/header');
 //  $this->load->view('formuser');
 //  $this->load->view('element/footer');
 // } 


 public function jeniskeluhan() {
  $this->load->view('element/header');
  $this->load->view('jeniskeluhan');
  $this->load->view('element/footer');
 } 

 /*public function editkeluhan() {
  $this->load->view('element/header');
  $this->load->view('editkeluhan');
  $this->load->view('element/footer');
 } */


  public function tambahkeluhan() {
    $data=array(
      'title'=>'Kategori Keluhan - PLN',
      'status_user' => $this->session->userdata('status_user'),
    );
  $this->load->view('element/header', $data);
  $this->load->view('tambahkeluhan');
  $this->load->view('element/footer');
 }

/* public function editgangguan() {
  $this->load->view('element/header');
  $this->load->view('editgangguan');
  $this->load->view('element/footer');
 }  */

 // public function register() {
 //  $this->load->view('element/header');
 //  $this->load->view('registerpage');
 //  $this->load->view('element/footer');
 // }

/* public function tambahprogress() {
  $this->load->view('element/header');
  $this->load->view('form_tambah_progress');
  $this->load->view('element/footer');
 }*/

public function editprogress() {
  $this->load->view('element/header');
  $this->load->view('form_edit_progress');
  $this->load->view('element/footer');
 }

 public function tampil_progress() {
  $this->load->view('element/header');
  $this->load->view('progress');
  $this->load->view('element/footer');
 }


}

?>