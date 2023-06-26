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
            return null;
        }

        return null; // Login gagal
    }

    public function GetUsername(){
        // Mengambil semua item dari tabel
        $query = $this->db->select('username, id')->get('admin');
        return $query->result();
    }

    //perubahan disini
    public function update_admin($id, $username, $password=null)
    {
        // Mengupdate item berdasarkan ID
        $data['username'] = $username;

        if ($password!=null) {
            $data['password'] = $password;
        }
    
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }


}

?>
