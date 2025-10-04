<?php
class BankSampah_model extends CI_Model {

    public function get_user_banks($user_id){
        $this->db->select('b.nama_bank_sampah, ubs.tanggal_daftar');
        $this->db->from('user_bank_sampah ubs');
        $this->db->join('bank_sampah b','b.id_bank_sampah = ubs.id_bank_sampah');
        $this->db->where('ubs.id_users', $user_id);
        return $this->db->get()->result();
    }

    public function get_kemantren(){
        return $this->db->distinct()->select('kemantren')->from('bank_sampah')->get()->result();
    }

    public function get_kelurahan($kemantren){
        return $this->db->distinct()->select('kelurahan')->from('bank_sampah')->where('kemantren',$kemantren)->get()->result();
    }

    public function get_banks($kemantren, $kelurahan){
        return $this->db->get_where('bank_sampah',['kemantren'=>$kemantren,'kelurahan'=>$kelurahan])->result();
    }

    public function add_user_bank($user_id, $id_bank_sampah){
        $this->db->insert('user_bank_sampah',[
            'id_users' => $user_id,
            'id_bank_sampah' => $id_bank_sampah,
            'tanggal_daftar' => date('Y-m-d')
        ]);
        // update jumlah_nasabah
        $this->db->set('jumlah_nasabah','jumlah_nasabah+1',FALSE)
                 ->where('id_bank_sampah',$id_bank_sampah)
                 ->update('bank_sampah');
    }
}
