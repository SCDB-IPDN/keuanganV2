<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class D_Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
		$this->load->model('frontend_model');
	}

	public function index()
	{
		if($this->session->userdata('nip') != NULL){

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('frontend');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	// THEMES
	public function themes()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$data = $this->frontend_model->get_themes()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('themes', $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	public function add_themes()
	{	
		$user = $this->session->userdata('nama');

		$data = array(
			'title' => $this->input->post('title'),
			'kode' => $this->input->post('kode'),
			'created_by' => $user,
			'created_date' => date('Y-m-d h-m-i'),
			'status' => 'Created',
			'berkas' => '0'
		);

		$result = $this->frontend_model->add_themes('tbl_fwebsite', $data);

		if (!$result) { 							
			$this->session->set_flashdata('themes', 'DATA THEMES BERHASIL DITAMBAH.');		
			redirect('frontend/d_frontend/themes'); 			
		} else { 								
			$this->session->set_flashdata('themes', 'DATA THEMES GAGAL DITAMBAH.');			
			redirect('frontend/d_frontend/themes'); 			
		}
	}

	public function edit_themes()
	{
		$data['id'] = $this->input->post('id');
		$data['title'] = $this->input->post('title', true);
		$data['kode'] = $this->input->post('kode', true);
		$data['created_by'] = $this->session->userdata('nama');
		$data['created_date'] = date('Y-m-d h-m-i');
		$data['status'] = 'Update';

		$result = $this->frontend_model->edit_themes($data);

		if (!$result) { 							
			$this->session->set_flashdata('themes', 'DATA THEMES GAGAL DIUPDATE.'); 				
			redirect('frontend/d_frontend/themes'); 			
		} else { 								
			$this->session->set_flashdata('themes', 'DATA THEMES BERHASIL DIUPDATE.');			
			redirect('frontend/d_frontend/themes'); 			
		}
	}

	public function del_themes(){
		$id = $this->input->post('id');
		$result = $this->frontend_model->del_themes($id);

		if (!$result) { 							
			$this->session->set_flashdata('themes', 'DATA THEMES GAGAL DIHAPUS.'); 				
			redirect('frontend/d_frontend/themes'); 			
		} else { 								
			$this->session->set_flashdata('themes', 'DATA THEMES BERHASIL DIHAPUS.');			
			redirect('frontend/d_frontend/themes'); 			
		}
	}

	public function show_t($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '1'
		);

		$result= $this->frontend_model->update_berkas('tbl_fwebsite',$data, $id);
		$this->session->set_flashdata('themes', 'THEMES BERHASIL HIDDEN.');			
		redirect('frontend/d_frontend/themes');
	}

	public function hide_t($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '0'
		);

		$result= $this->frontend_model->update_berkas('tbl_fwebsite',$data, $id);
		$this->session->set_flashdata('themes', 'THEMES BERHASIL DITAMPILKAN.');			
		redirect('frontend/d_frontend/themes');
	}

	// WEBSITE
	public function website()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$data = $this->frontend_model->get_website()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('website', $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	public function add_website()
	{	
		$user = $this->session->userdata('nama');

		$data = array(
			'title' => $this->input->post('title'),
			'kode' => $this->input->post('kode'),
			'created_by' => $user,
			'created_date' => date('Y-m-d h-m-i'),
			'status' => 'Created',
			'berkas' => '0'
		);

		$result = $this->frontend_model->add_website('tbl_fwebsite', $data);

		if (!$result) { 							
			$this->session->set_flashdata('website', 'DATA WEBSITE BERHASIL DITAMBAH.');		
			redirect('frontend/d_frontend/website'); 			
		} else { 								
			$this->session->set_flashdata('website', 'DATA WEBSITE GAGAL DITAMBAH.');			
			redirect('frontend/d_frontend/website'); 			
		}
	}

	public function edit_website()
	{
		$data['id'] = $this->input->post('id');
		$data['title'] = $this->input->post('title', true);
		$data['kode'] = $this->input->post('kode', true);
		$data['created_by'] = $this->session->userdata('nama');
		$data['created_date'] = date('Y-m-d h-m-i');
		$data['status'] = 'Update';

		$result = $this->frontend_model->edit_website($data);

		if (!$result) { 							
			$this->session->set_flashdata('website', 'DATA WEBSITE GAGAL DIUPDATE.'); 				
			redirect('frontend/d_frontend/website'); 			
		} else { 								
			$this->session->set_flashdata('website', 'DATA WEBSITE BERHASIL DIUPDATE.');			
			redirect('frontend/d_frontend/website'); 			
		}
	}

	public function del_website(){
		$id = $this->input->post('id');
		$result = $this->frontend_model->del_website($id);

		if (!$result) { 							
			$this->session->set_flashdata('website', 'DATA WEBSITE GAGAL DIHAPUS.'); 				
			redirect('frontend/d_frontend/website'); 			
		} else { 								
			$this->session->set_flashdata('website', 'DATA WEBSITE BERHASIL DIHAPUS.');			
			redirect('frontend/d_frontend/website'); 			
		}
	}

	public function show_w($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '1'
		);

		$result= $this->frontend_model->update_berkas('tbl_fwebsite',$data, $id);
		$this->session->set_flashdata('website', 'website BERHASIL HIDDEN.');			
		redirect('frontend/d_frontend/website');
	}

	public function hide_w($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '0'
		);

		$result= $this->frontend_model->update_berkas('tbl_fwebsite',$data, $id);
		$this->session->set_flashdata('website', 'website BERHASIL DITAMPILKAN.');			
		redirect('frontend/d_frontend/website');
	}

	// LAMAN LINK
	public function laman_link()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$data = $this->frontend_model->get_link()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('laman_link', $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	public function add_link()
	{	
		$user = $this->session->userdata('nama');

		$data = array(
			'link' => $this->input->post('link'),
			'pending' => $this->input->post('pending'),
			'status' => 'Created',
			'created_by' => $user,
			'created_date' => date('Y-m-d h-m-i'),
			'berkas' => '0'
		);

		$result = $this->frontend_model->add_link('tbl_flink', $data);

		if (!$result) { 							
			$this->session->set_flashdata('link', 'DATA LINK BERHASIL DITAMBAH.');		
			redirect('frontend/d_frontend/laman_link'); 			
		} else { 								
			$this->session->set_flashdata('link', 'DATA LINK GAGAL DITAMBAH.');			
			redirect('frontend/d_frontend/laman_link'); 			
		}
	}

	public function edit_link()
	{
		$data['id'] = $this->input->post('id');
		$data['link'] = $this->input->post('link', true);
		$data['pending'] = $this->input->post('pending', true);
		$data['status'] = 'Update';
		$data['created_by'] = $this->session->userdata('nama');
		$data['created_date'] = date('Y-m-d h-m-i');

		$result = $this->frontend_model->edit_link($data);

		if (!$result) { 							
			$this->session->set_flashdata('link', 'DATA LINK GAGAL DIUPDATE.'); 				
			redirect('frontend/d_frontend/laman_link'); 			
		} else { 								
			$this->session->set_flashdata('link', 'DATA LINK BERHASIL DIUPDATE.');			
			redirect('frontend/d_frontend/laman_link'); 			
		}
	}

	public function del_link(){
		$id = $this->input->post('id');
		$result = $this->frontend_model->del_link($id);

		if (!$result) { 							
			$this->session->set_flashdata('link', 'DATA LINK GAGAL DIHAPUS.'); 				
			redirect('frontend/d_frontend/laman_link'); 			
		} else { 								
			$this->session->set_flashdata('link', 'DATA LINK BERHASIL DIHAPUS.');			
			redirect('frontend/d_frontend/laman_link'); 			
		}
	}

	public function show_l($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '1'
		);

		$result= $this->frontend_model->update_berkas('tbl_flink',$data, $id);
		$this->session->set_flashdata('link', 'LINK BERHASIL HIDDEN.');			
		redirect('frontend/d_frontend/laman_link');
	}

	public function hide_l($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '0'
		);

		$result= $this->frontend_model->update_berkas('tbl_flink',$data, $id);
		$this->session->set_flashdata('link', 'LINK BERHASIL DITAMPILKAN.');			
		redirect('frontend/d_frontend/laman_link');
	}
}
?>