<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Kerjasama extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Kerjasama_m');
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
		$data = $this->Kerjasama_m->get_mou();
		$mou = array();
		$no = 1;
		foreach($data as $d) {
			$mitra = $d->mitra;
			$no_mitra = $d->no_mitra;
			$no_int = $d->no_int;
			$tmt = $d->tmt;
			$hal = $d->hal;
            $masa_berlaku = $d->masa_berlaku;
            $status = $d->status;
			$file = "./assets/mou_files/$d->file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'kerjasama'){
				$opsi = "<a 
					href='javascript:;' data-mou='$d->id' data-mitra='$d->mitra' data-no_mitra='$d->no_mitra' 
					data-no_int='$d->no_int' data-tmt='$d->tmt' data-hal='$d->hal' data-masa_berlaku='$d->masa_berlaku'
					data-status='$d->status' data-file='$d->file'
					data-toggle='modal' data-target='#editmou' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id='$d->id' data-mitra='$d->mitra' data-hal='$d->hal' data-no_ipdn='$d->no_int'
					data-toggle='modal' data-target='#delmou' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$mou[] = array(
				$no++,
				$mitra,
				$no_mitra,
				$no_int,
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
		$data['mitra'] = $this->input->post('mitra', true);
		$data['no_mitra'] = $this->input->post('no_mitra', true);
		$data['no_int'] = $this->input->post('no_int', true);
		$data['tmt'] = $this->input->post('tmt', true);
		$data['hal'] = $this->input->post('hal', true);
		$data['masa_berlaku'] = $this->input->post('masa_berlaku', true);
		$data['status'] = $this->input->post('status', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/mou_files';
			$config['allowed_types'] = 'pdf';
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('mou', ['danger', $error]);
				redirect("kerjasama/mou"); 
			}
			else {
				$data['file'] = $this->upload->data('file_name');
			}
		}
			
		$result = $this->Kerjasama_m->add_mou($data);

		if ($result) { 			
			
			$isi = $data['no_int'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Menambahkan MOU, Nomor IPDN = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->Kerjasama_m->log($log);

			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil disimpan']);
			redirect("kerjasama/mou"); 	
		} 
		else {
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal disimpan']); 
			redirect("kerjasama/mou"); 	
		}
    }
    
    public function del_mou() {
		$id = $this->input->post('del_id_mou');
		$mou = $this->Kerjasama_m->getById($id);
		$file = "./assets/mou_files/$mou->file";
		if(is_file($file)) {
			unlink($file);
		}

		$hasil = $this->Kerjasama_m->del_mou($id);

		if ($hasil) { 	
	
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Menghapus MOU, Nomor IPDN = $id";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->Kerjasama_m->log($log);

			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil dihapus']);			
			redirect("kerjasama/mou");		
		} else { 								
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal dihapus']);	
			redirect("kerjasama/mou");
		}
    }
    
    public function edit_mou() {
		$id = $this->input->post('id_mou', true);
		$editmou['mitra'] = $this->input->post('mitra', true);
		$editmou['no_mitra'] = $this->input->post('no_mitra', true);
		$editmou['no_int'] = $this->input->post('no_int', true);
		$editmou['tmt'] = $this->input->post('tmt', true);
		$editmou['hal'] = $this->input->post('hal', true);
        $editmou['masa_berlaku'] = $this->input->post('masa_berlaku', true);
        $editmou['status'] = $this->input->post('status', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/mou_files';
			$config['allowed_types'] = 'pdf';
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('mou', ['danger', $error]);
				redirect("kerjasama/mou"); 
			}
			else {
				$pdf = $this->Kerjasama_m->getById($id);
				$file = "./assets/mou_files/$pdf->file";
				if(is_file($file)) {
					unlink($file);
				}
				$editmou['file'] = $this->upload->data('file_name');
			}
		}

		$result = $this->Kerjasama_m->edit_mou($id, $editmou);

		if ($result) { 
			
			$isi = $editmou['no_int'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Mengubah MOU, Nomor IPDN = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->Kerjasama_m->log($log);

			$this->session->set_flashdata('mou', ['success', 'Data MOU berhasil diubah']);	
			redirect("kerjasama/mou");
		} else {
			$this->session->set_flashdata('mou', ['danger', 'Data MOU gagal diubah']);			
			redirect("kerjasama/mou");
		}
    }

	public function tmt_year() {
		$tmt_list = $this->Kerjasama_m->filter_tmt();
		$tmt = [];
		foreach($tmt_list as $t) {
			$tmt[] =  $t['YEAR(`tmt`)'];
		}
		echo json_encode($tmt);
	}
}