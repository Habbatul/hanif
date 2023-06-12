<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller {

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
	}

	public function index()
	{
		$response['code'] = 200;
		$response['status'] = 'success';
		
		// Mengambil data portofolio dari database
		$portfolios = $this->db->get('portolist')->result();
	
		// Melakukan escaping pada teks yang akan ditampilkan dalam respons
		foreach ($portfolios as $portfolio) {
			$portfolio->id = htmlspecialchars($portfolio->id);
			$portfolio->description = htmlspecialchars($portfolio->description);
			$portfolio->title = htmlspecialchars($portfolio->title);
			$portfolio->link = htmlspecialchars($portfolio->link);
			$portfolio->gambar = htmlspecialchars($portfolio->gambar);
			// Melarikan atribut lain jika diperlukan
		}
	
		$response['data'] = $portfolios;
	
		// Mengirim respons dalam format JSON
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
