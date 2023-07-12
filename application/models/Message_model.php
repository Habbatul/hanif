<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function getMessage()
    {
        // Mengambil semua item dari tabel
        $query = $this->db->get('message');
        return $query->result();
    }

    public function deleteMessage($id)
    {
        // Menghapus item berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('message');
    }

    public function saveMessage($nama, $email, $pesan, $ipAddress) {
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan,
            'ip_address' => $ipAddress,
            'last_request_date' => date('Y-m-d')
        );
        $this->db->insert('message', $data);
    }

    public function cekPesan($ipAddress) {
        $this->db->where('ip_address', $ipAddress);
        $this->db->where('last_request_date', date('Y-m-d'));
        $query = $this->db->get('message');

        return ($query->num_rows() < 1);
    }
}