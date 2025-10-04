<?php
class Dashboard_model extends CI_Model {

    // total uang terkumpul tiap bulan
    public function get_transaksi_per_bulan(){
        $this->db->select("MONTH(tanggal_transaksi) as bulan, SUM(nilai_transaksi) as total");
        $this->db->from("transaksi");
        $this->db->group_by("MONTH(tanggal_transaksi)");
        return $this->db->get()->result();
    }

    // Ambil kategori sampah + jumlah total milik user (id_pemilik)
    public function get_sampah_by_user($user_id){
        $this->db->select("s.kategori_sampah, SUM(s.jumlah_sampah) as total, b.nama_bank_sampah");
        $this->db->from("sampah s");
        $this->db->join("bank_sampah b", "s.id_bank_sampah = b.id_bank_sampah", "left");
        $this->db->where("s.id_pemilik", $user_id);
        $this->db->group_by(["s.kategori_sampah", "b.nama_bank_sampah"]);
        return $this->db->get()->result();
    }
	public function get_kategori_sampah($user_id) {
    $this->db->select('s.kategori_sampah, SUM(s.jumlah_sampah) as total, b.nama_bank_sampah');
    $this->db->from('sampah s');
    $this->db->join('bank_sampah b', 's.id_bank_sampah = b.id_bank_sampah', 'left');
    $this->db->where('s.id_pemilik', $user_id);
    $this->db->group_by(['s.kategori_sampah', 'b.nama_bank_sampah']);
    return $this->db->get()->result();
}


    // Profile user
    public function get_profile($user_id){
        return $this->db->get_where('biodata', ['id_users' => $user_id])->row();
    }

    public function update_biodata($user_id, $data){
        $this->db->where('id_users', $user_id);
        return $this->db->update('biodata', $data);
    }
	 public function get_user_banks($user_id){
        return $this->db->select('b.nama_bank_sampah, ub.tanggal_daftar')
                        ->from('bank_sampah b')
                        ->join('user_bank_sampah ub', 'b.id_bank_sampah = ub.id_bank_sampah')
                        ->where('ub.id_users', $user_id)
                        ->get()
                        ->result();
    }

    public function get_bank_sampah(){
        return $this->db->get('bank_sampah')->result();
    }

    public function add_user_bank($user_id, $id_bank_sampah){
        $data = [
            'id_users' => $user_id,
            'id_bank_sampah' => $id_bank_sampah,
            'tanggal_daftar' => date('Y-m-d')
        ];
        return $this->db->insert('user_bank_sampah', $data);
    }
	public function get_all_bank_sampah(){
    return $this->db->get('bank_sampah')->result();
}




}
