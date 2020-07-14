<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	function __Construct(){
		parent::__Construct ();
		 $this->load->database(); // load database
		 $this->load->model('PostModel'); // load model 
	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Home');
	}

	public function getDataUser() {
		$article = $this->PostModel->getDataUser();
		echo json_encode($article);
	}

	public function form_data() {
		$this->load->view('Form_Data');
	}

	public function getEditDataUser() {
		$paramName = $this->input->post("paramName");
		echo json_encode($this->PostModel->getDetailUser($paramName));
	}

	public function submitDataEditUser() {
		$paramName =  $this->input->post("paramName");
		$textName = $this->input->post("textName");
		$textAlamat = $this->input->post("textAlamat");
		$textKota = $this->input->post("textKota");
		$textEmail = $this->input->post("textEmail");
		$textPhone =  $this->input->post("textPhone");

		echo json_encode($this->PostModel->updateUser($paramName, $textName, $textAlamat, $textKota, $textEmail, $textPhone));
	}

	public function dashboardHome() {
		$this->load->view('dashboard_home');
	}

	public function insertData()
	{
		$textName = $this->input->post("textName");
		$textAlamat = $this->input->post("textAlamat");
		$textKota = $this->input->post("textKota");
		$textEmail = $this->input->post("textEmail");
		$textPhone =  $this->input->post("textPhone");
		$this->PostModel->inputData($textName,$textAlamat,$textKota,$textEmail, $textPhone);
		echo json_encode(array(
			"statusCode"=>200
		));
	}

	public function updateData() {
		$textNamaBuku = $this->input->post("textNamaBuku");
		$textnamaPengarang = $this->input->post("textnamaPengarang");
		$textjenisBook = $this->input->post("textjenisBook");
		$textrakBook = $this->input->post("textrakBook");
		$dataBuku = array(
			'namaPengarang' => $textnamaPengarang,
			'jenisBuku' => $textjenisBook,
			'rakBuku' => $textrakBook
		);
		$this->PostModel->editData($textNamaBuku, $dataBuku);
		echo json_encode('success update data....');
	}

	public function deleteDataUser(){
		$paramName = $this->input->post("paramName");
		echo json_encode($this->PostModel->row_delete_user($paramName));
	}
	public function getDataProduct() {
		echo json_encode($this->PostModel->getDataProduk());
	}

	public function data_member() {
		$this->load->view('list_member');
	}
}
