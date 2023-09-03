<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	}

	public function index()
	{
		$data['error'] = $this->input->get('error');
		$this->load->view('user/halaman_utama', $data);
	}

	public function submitForm()
	{
		if (($this->input->post('kirim') !== null)) {
			$this->load->database();

			$this->load->model('Message_model');

			$name = $this->input->post('nama');
			$email = $this->input->post('email');
			$message = $this->input->post('message');
			$ipAddress = $this->input->ip_address();

			// Validasi input jika diperlukan

			// Cek apakah permintaan diperbolehkan berdasarkan alamat IP
			if ($this->Message_model->cekPesan($ipAddress)) {
				// Simpan data permintaan ke database
				$this->Message_model->saveMessage($name, $email, $message, $ipAddress);
				redirect('/?error= Pesan Kamu berhasil');
			} else {
				redirect('/?error= Kamu hanya dapat mengirim pesan sekali dalam sehari');
			}
		} else {
			redirect('/?error= CSRF token kamu tidak valid');
		}
	}
}
