<?php
class User_model extends CI_Model {

    // Register user
    public function register($data){
        // simpan ke tabel users
        $this->db->insert('users', [
            'nama_lengkap' => $data['nama_lengkap'],
            'email'        => $data['email'],
            'jenis_nasabah'=> 'perorangan',
            'nik'          => $data['nik'],
            'password'     => password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
        $user_id = $this->db->insert_id();

        // tambahkan juga ke tabel biodata (default kosong kecuali field utama)
        $this->db->insert('biodata', [
            'id_users'     => $user_id,
            'nama_nasabah' => $data['nama_lengkap'],
            'no_ktp'       => $data['nik'],
            'nomer_hp'     => null,
            'nama_bank'    => null,
            'no_rekening'  => null,
            'alamat'       => null,
            'rt'           => null,
            'rw'           => null,
            'kelurahan'    => null,
            'kecamatan'    => null,
            'kota'         => null,
            'provinsi'     => null
        ]);

        return $user_id;
    }

    // Login
    public function login($email, $password){
        $user = $this->db->get_where('users', ['email' => $email])->row();
        if($user && password_verify($password, $user->password)){
            return $user;
        }
        return false;
    }

    // Ambil user + biodata
    public function get_user_biodata($id_users){
        $this->db->select('u.nama_lengkap, u.email, u.nik, b.*');
        $this->db->from('users u');
        $this->db->join('biodata b', 'u.id = b.id_users');
        $this->db->where('u.id', $id_users);
        return $this->db->get()->row();
    }
}
