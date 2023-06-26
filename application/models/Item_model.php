<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

    public function get_items()
    {
        // Mengambil semua item dari tabel
        $query = $this->db->get('portolist');
        return $query->result();
    }

    public function save_item($gambar, $title, $description, $link)
    {
        // Menyimpan item ke dalam tabel
        $data = array(
            'gambar' => $gambar,
            'title' => $title,
            'description' => $description,
            'link' => $link
        );
        $this->db->insert('portolist', $data);
    }

    public function get_item_by_id($id)
    {
        // Mengambil item berdasarkan ID
        $query = $this->db->get_where('portolist', array('id' => $id));
        return $query->row();
    }

    public function update_item($id, $title, $description, $link, $gambar = null)
    {
        // Mengupdate item berdasarkan ID
        $data = array(
            'title' => $title,
            'description' => $description,
            'link' => $link
        );
    
        if ($gambar !== null) {
            $data['gambar'] = $gambar;
        }
    
        $this->db->where('id', $id);
        $this->db->update('portolist', $data);
        var_dump($password);
    }

    public function delete_item($id)
    {
        // Menghapus item berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('portolist');
    }
}