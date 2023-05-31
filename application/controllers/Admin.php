<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
    parent::__construct();
    $this->load->database();
    $this->load->model('Item_model');
    $this->load->model('user_model');
    $this->load->library('upload');
    $this->load->library('session');
	}

	public function index()
	{
        if (!$this->session->userdata('admin')) {
            redirect('/');
        }else{
            $data['items'] = $this->Item_model->get_items();
            $this->load->view('admin/halaman_utama', $data);
        }
	}

    public function process_login() {
        // Menerima input username dan password dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Memanggil model User_model untuk melakukan login
        $user = $this->user_model->login($username, $password);

        if ($user) {
            // Login berhasil, simpan data pengguna ke session
            $this->session->set_userdata('admin', $user);

            // Redirect ke halaman beranda atau halaman yang diinginkan setelah login berhasil
            redirect('admin');
        } else {
            // Login gagal, tampilkan pesan error atau redirect ke halaman login
            redirect('/?error= username atau password kamu salah, cek inputan');
        }
    }

    public function logout() {
        // Menghapus data pengguna dari session saat logout
        $this->session->unset_userdata('admin');
        redirect('/');
    }

    public function update_item($id)
    {
        $gambar = $_FILES['gambar'];
        $croppedImageData = $this->input->post('croppedImageData');

        if ($gambar['error'] === UPLOAD_ERR_OK) {
            $fileName = $gambar['name'];
            $croppedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));
            $croppedImagePath = 'upload/' . $fileName;
            file_put_contents($croppedImagePath, $croppedData);
            $gambar = $fileName;
        } else {
            $gambar = null;
        }


        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $link = $this->input->post('link');


        $this->Item_model->update_item($id, $title, $description, $link, $gambar);
        redirect('admin'); // Redirect ke halaman utama setelah berhasil melakukan update
    }
    
    public function delete_item(){
        $id = $this->input->post('deleteItem');
        $this->Item_model->delete_item($id);
        redirect('admin'); // Redirect ke halaman utama setelah berhasil melakukan update
    }

    public function save_item(){
        $gambar = $_FILES['gambar'];
        $croppedImageData = $this->input->post('croppedImageData');

        if ($gambar['error'] === UPLOAD_ERR_OK) {
            $fileName = $gambar['name'];
            $croppedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));
            $croppedImagePath = 'upload/' . $fileName;
            file_put_contents($croppedImagePath, $croppedData);
            $gambar = $fileName;
        } else {
            redirect('admin');
        }

        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $link = $this->input->post('link');

        $this->Item_model->save_item($gambar, $title, $description, $link);
        redirect('admin'); // Redirect ke halaman utama setelah berhasil melakukan update
    }



}