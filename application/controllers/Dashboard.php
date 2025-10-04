<?php
class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('session');

        // Cek login
        if(!$this->session->userdata('user_id')){
            redirect('auth/login');
        }
    }

    public function index(){
        $user_id = $this->session->userdata('user_id');

        $data['chart'] = $this->Dashboard_model->get_transaksi_per_bulan();
        $data['kategori_sampah'] = $this->Dashboard_model->get_kategori_sampah($user_id);


        $layout['title'] = "Dashboard";
        $layout['content'] = "auth/dashboard"; // view lama dashboard
        $layout = array_merge($layout, $data);
        $this->load->view('layout/sidebar', $layout);
    }

    public function profile(){
        $user_id = $this->session->userdata('user_id');
        $data['biodata'] = $this->Dashboard_model->get_profile($user_id);

        $layout['title'] = "Profile";
        $layout['content'] = "auth/profile"; // view lama profile
        $layout = array_merge($layout, $data);
        $this->load->view('layout/sidebar', $layout);
    }

    public function edit_profile(){
        $user_id = $this->session->userdata('user_id');

        if($this->input->post()){
            $data = $this->input->post();
            $this->Dashboard_model->update_biodata($user_id, $data);
            $this->session->set_flashdata('success','Biodata berhasil diupdate');
            redirect('dashboard/profile');
        }

        $data['biodata'] = $this->Dashboard_model->get_profile($user_id);
        $layout['title'] = "Edit Profile";
        $layout['content'] = "auth/edit_profile"; // view lama edit_profile
        $layout = array_merge($layout, $data);
        $this->load->view('layout/sidebar', $layout);
    }
}
