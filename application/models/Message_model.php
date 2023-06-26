<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function getMessage()
    {
        // Mengambil semua item dari tabel
        $query = $this->db->get('message');
        return $query->result();
    }

    public function saveMessage($nama, $email, $password)
    {
        // Menyimpan item ke dalam tabel
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pesan' => $description,
        );
        $this->db->insert('message', $data);
    }

    public function deleteMessage($id)
    {
        // Menghapus item berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('message');
    }
}