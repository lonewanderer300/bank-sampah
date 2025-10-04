<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankSampah extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('BankSampah_model');
        $this->load->library('session');
        if(!$this->session->userdata('user_id')){
            redirect('auth/login');
        }
    }

    public function index(){
        $user_id = $this->session->userdata('user_id');
        $data['my_banks'] = $this->BankSampah_model->get_user_banks($user_id);
        $data['kemantren'] = $this->BankSampah_model->get_kemantren();

        $layout['title'] = "Bank Sampah Saya";
        $layout['content'] = "auth/bank_sampah";
        $layout = array_merge($layout, $data);
        $this->load->view('layout/sidebar', $layout);
    }

    public function tambah(){
        $user_id = $this->session->userdata('user_id');
        if($this->input->post()){
            $id_bank_sampah = $this->input->post('id_bank_sampah');
            $this->BankSampah_model->add_user_bank($user_id, $id_bank_sampah);
            redirect('banksampah');
        }
    }

    // Ajax untuk filter kelurahan
    public function get_kelurahan(){
        $kemantren = $this->input->post('kemantren');
        $data = $this->BankSampah_model->get_kelurahan($kemantren);
        echo json_encode($data);
    }

    // Ajax untuk filter bank sampah
    public function get_banks(){
        $kemantren = $this->input->post('kemantren');
        $kelurahan = $this->input->post('kelurahan');
        $data = $this->BankSampah_model->get_banks($kemantren,$kelurahan);
        echo json_encode($data);
    }
}
