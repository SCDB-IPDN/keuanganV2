<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Kerjasama extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('kerjasama_m');
		$this->load->helper('url');
    }

    public function mou() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('kerjasama_v');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	
	public function get_mou() {
		$data = $this->kerjasama_m->get_mou->result();
		$mou = array();
		$no = 1;
		foreach($data as $d) {
			$mitra = $d->mitra;
			$no_mitra = $d->no_mitra;
			$no_ipdn = $d->no_ipdn;
			$tmt = $d->tmt;
			$hal = $d->hal;
            $masa_berlaku = $d->masa_berlaku;
            $status = $d->status;
			$file = "./assets/mou_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'kerjasama'){
				$opsi = "<a 
					href='javascript:;' data-mou='$d->id' data-mitra='$d->mitra' data-hal='$d->hal' data-file='$d->nama_file'
				    data-status='$d->status' data-tmt='$d->tmt'
					data-toggle='modal' data-target='#editmou' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id='$d->id' data-mitra='$d->mitra' data-hal='$d->hal'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$mou[] = array(
				$no++,
				$mitra,
				$no_mitra,
				$no_ipdn,
				$tmt,
                $hal,
                $masa_berlaku,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($mou);
	}

    public function add_mou() {
		// $url = $this->input->post('url', true);
		$data['mitra'] = $this->input->post('mitra', true);
		$data['no_mitra'] = $this->input->post('no_mitra', true);
		$data['no_ipdn'] = $this->input->post('no_ipdn', true);
		$data['tmt'] = $this->input->post('tmt', true);
		$data['hal'] = $this->input->post('hal', true);
		$data['masa_berlaku'] = $this->input->post('masa_berlaku', true);
		$data['status'] = $this->input->post('status', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/mou_files';
			$config['allowed_types'] = 'pdf';
			//$config['max_size'] = 2048; //KB
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('mou', ['danger', $error]);
				redirect("kerjasama/mou"); 
			}
			else {
				$data['nama_file'] = $this->upload->data('file_name');
			}
		}
			
		$result = $this->kerjasama_m->add_mou($data);

		if ($result) { 				
			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil disimpan']);
			redirect("kerjasama/mou"); 			
		} 
		else { 								
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal disimpan']); 
			redirect("kerjasama/mou"); 	
		}
    }
    
    public function del_mou() {
		$id = $this->input->post('del_id');
		// $url = $this->input->post('url', true);
		$mou = $this->kerjasama_m->getById($id);
		$file = "./assets/mou_files/$mou->nama_file";
		if(is_file($file)) {
			unlink($file);
		}

		$hasil = $this->kerjasama_m->del_mou($id);

		if ($hasil) { 								
			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil dihapus']);			
			redirect("kerjasama/mou");		
		} else { 								
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal dihapus']);	
			redirect("kerjasama/mou");
		}
    }
    
    public function edit_mou() {
		// $url = $this->input->post('url', true);
		$id = $this->input->post('id', true);
		$editmou['mitra'] = $this->input->post('mitra', true);
		$editmou['no_mitra'] = $this->input->post('no_mitra', true);
		$editmou['no_ipdn'] = $this->input->post('no_ipdn', true);
		$editmou['tmt'] = $this->input->post('tmt', true);
		$editmou['hal'] = $this->input->post('hal', true);
        $editmou['masa_berlaku'] = $this->input->post('masa_berlaku', true);
        $editmou['status'] = $this->input->post('status', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/mou_files';
			$config['allowed_types'] = 'pdf';
			//$config['max_size'] = 2048; //KB
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('mou', ['danger', $error]);
				redirect("kerjasama/mou"); 
			}
			else {
				$pdf = $this->kerjasama_m->getById($id);
				$file = "./assets/mou_files/$pdf->nama_file";
				if(is_file($file)) {
					unlink($file);
				}
				$editmou['nama_file'] = $this->upload->data('file_name');
			}
		}

		$result = $this->kerjasama_m->edit_mou($id, $editmou);

		if ($result) { 		
			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil diubah']);	
			redirect("kerjasama/mou");
		} else {
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal diubah']);			
			redirect("kerjasama/mou");
		}
    }
}