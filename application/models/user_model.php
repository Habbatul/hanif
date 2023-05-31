<?php
class User_model extends CI_Model {
    public function login($username, $password) {
        // Mengambil data pengguna berdasarkan username
        $query = $this->db->get_where('admin', array('username' => $username));

        // Memeriksa apakah pengguna ditemukan
        if ($query->num_rows() > 0) {
            $user = $query->row();

            // Memeriksa kecocokan password bcrypt
            if (password_verify($password, $user->password)) {
                return $user; // Login berhasil, mengembalikan data pengguna
            }
        }else{
            $this->session->unset_userdata('admin');
            return null;
        }

        return null; // Login gagal
    }
}
?>
