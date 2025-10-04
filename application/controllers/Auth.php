<?php
class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login(){
        if($this->input->post()){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->login($email, $password);
            if($user){
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error','Email atau password salah');
                redirect('auth/login');
            }
        }
        $this->load->view('auth/login'); // view lama tetap dipakai
    }

    public function register(){
        if($this->input->post()){
            $data = $this->input->post();
            if($data['password'] !== $data['confirm_password']){
                $this->session->set_flashdata('error','Password tidak sama');
                redirect('auth/register');
            }
            $this->User_model->register($data);
            $this->session->set_flashdata('success','Registrasi berhasil, silakan login');
            redirect('auth/login');
        }
        $this->load->view('auth/register'); // view lama tetap dipakai
    }
	public function bank_sampah(){
    $this->load->model('Dashboard_model');

    $user_id = $this->session->userdata('user_id');

    // Bank sampah yang dimiliki user
    $data['my_banks'] = $this->Dashboard_model->get_user_banks($user_id);

    // Semua bank sampah dari tabel bank_sampah
    $data['bank_sampah'] = $this->Dashboard_model->get_all_bank_sampah();

    $layout['title'] = "Bank Sampah Saya";
    $layout['content'] = "auth/bank_sampah";
    $layout = array_merge($layout, $data);

    $this->load->view('layout/sidebar', $layout);
}


public function add_bank_sampah(){
    $this->load->model('Dashboard_model');
    $user_id = $this->session->userdata('user_id');
    $id_bank_sampah = $this->input->post('id_bank_sampah');

    if($this->Dashboard_model->add_user_bank($user_id, $id_bank_sampah)){
        // Update jumlah nasabah
        $this->db->set('jumlah_nasabah', 'jumlah_nasabah+1', FALSE);
        $this->db->where('id_bank_sampah', $id_bank_sampah);
        $this->db->update('bank_sampah');
    }

    redirect('auth/bank_sampah');
}



    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
