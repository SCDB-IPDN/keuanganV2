<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dosen_dikti extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdosen_dikti');
    }

    function index()
    {
        if($this->session->userdata('nip') != NULL)
        {
            $belum = $this->mdosen_dikti->belum();
            $kurang_nidn = $belum[0]->total - $belum[0]->nidn;
            $kurang_serdos = $belum[0]->total - $belum[0]->serdos;

            $persentase_nidn = round($kurang_nidn  / $belum[0]->total * 100,2);
            $persentase_serdos = round($kurang_serdos / $belum[0]->total * 100,2);

            $x['belum'] = $belum;
            $x['persentase_nidn'] = $persentase_nidn;
            $x['persentase_serdos'] = $persentase_serdos;

            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('view_dosen', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        }else{
            redirect("user");
        }
    }

    function table_dosen_dikti() {
        $data = $this->mdosen_dikti->get_all_dosen()->result();

        $no = 1;
        $apa = array();

        foreach($data as $r) {
            $nama = $r->nama == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama;
            $tempat_lahir = $r->tempat_lahir == NULL ? "<i><font>Tidak ada data</font></i>": $r->tempat_lahir;
            $jenis_kelamin = $r->jenis_kelamin == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_kelamin;
            $tanggal_lahir = $r->tanggal_lahir == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_lahir;
            $agama = $r->agama == NULL ? "<i><font>Tidak ada data</font></i>": $r->agama;
            $nama_ibu = $r->nama_ibu == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_ibu;
            $status_aktif = $r->status_aktif == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_aktif;
            $nidn_nup_nidk = $r->nidn_nup_nidk == NULL ? "<i><font>Tidak ada data</font></i>": $r->nidn_nup_nidk;
            $nik = $r->nik == NULL ? "<i><font>Tidak ada data</font></i>": $r->nik;
            $nip = $r->nip == NULL ? "<i><font>Tidak ada data</font></i>": $r->nip;
            $npwp = $r->npwp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npwp;
            $ikatan_kerja = $r->ikatan_kerja == NULL ? "<i><font>Tidak ada data</font></i>": $r->ikatan_kerja;
            $status_pegawai = $r->status_pegawai == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_pegawai;
            $jenis_pegawai = $r->jenis_pegawai == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_pegawai;
            $no_sk_cpns = $r->no_sk_cpns == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_sk_cpns;
            $tanggal_sk_cpns = $r->tanggal_sk_cpns == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_sk_cpns;
            $no_sk_pengangkatan = $r->no_sk_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_sk_pengangkatan;
            $tanggal_sk_pengangkatan = $r->tanggal_sk_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_sk_pengangkatan;
            $lembaga_pengangkatan = $r->lembaga_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->lembaga_pengangkatan;
            $pangkat_golongan = $r->pangkat_golongan == NULL ? "<i><font>Tidak ada data</font></i>": $r->pangkat_golongan;
            $sumber_gaji = $r->sumber_gaji == NULL ? "<i><font>Tidak ada data</font></i>": $r->sumber_gaji;
            $alamat = $r->alamat == NULL ? "<i><font>Tidak ada data</font></i>": $r->alamat;
            $dusun = $r->dusun == NULL ? "<i><font>Tidak ada data</font></i>": $r->dusun;
            $rt = $r->rt == NULL ? "<i><font>Tidak ada data</font></i>": $r->rt;
            $rw = $r->rw == NULL ? "<i><font>Tidak ada data</font></i>": $r->rw;
            $kelurahan = $r->kelurahan == NULL ? "<i><font>Tidak ada data</font></i>": $r->kelurahan;
            $kodepos = $r->kodepos == NULL ? "<i><font>Tidak ada data</font></i>": $r->kodepos;
            $kecamatan = $r->kecamatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->kecamatan;
            $telepon = $r->telepon == NULL ? "<i><font>Tidak ada data</font></i>": $r->telepon;
            $hp = $r->hp == NULL ? "<i><font>Tidak ada data</font></i>": $r->hp;
            $email = $r->email == NULL ? "<i><font>Tidak ada data</font></i>": $r->email;
            $status_pernikahan = $r->status_pernikahan == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_pernikahan;
            $nama_suami_istri = $r->nama_suami_istri == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_suami_istri;
            $nip_suami_istri = $r->nip_suami_istri == NULL ? "<i><font>Tidak ada data</font></i>": $r->nip_suami_istri;
            $tmt_pns = $r->tmt_pns == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_pns;
            $pekerjaan = $r->pekerjaan == NULL ? "<i><font>Tidak ada data</font></i>": $r->pekerjaan;
            $mampu_menghandle_kebutuhan_khusus = $r->mampu_menghandle_kebutuhan_khusus == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_kebutuhan_khusus;
            $mampu_menghandle_braile = $r->mampu_menghandle_braile == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_braile;
            $mampu_menghandle_bahasa_isyarat = $r->mampu_menghandle_bahasa_isyarat == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_bahasa_isyarat;
            $sertifikasi_dosen = $r->sertifikasi_dosen == NULL ? "<i><font>Tidak ada data</font></i>": $r->sertifikasi_dosen;
            $bidang_ilmu = $r->bidang_ilmu == NULL ? "<i><font>Tidak ada data</font></i>": $r->bidang_ilmu;
            $jabatan = $r->jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->jabatan;
            $sk_jabatan = $r->sk_jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->sk_jabatan;
            $tmt_jabatan = $r->tmt_jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_jabatan;
            $tahun_ajaran = $r->tahun_ajaran == NULL ? "<i><font>Tidak ada data</font></i>": $r->tahun_ajaran;
            $perguruan_tinggi = $r->perguruan_tinggi == NULL ? "<i><font>Tidak ada data</font></i>": $r->perguruan_tinggi;
            $program_studi = $r->program_studi == NULL ? "<i><font>Tidak ada data</font></i>": $r->program_studi;
            $no_surat_tugas = $r->no_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_surat_tugas;
            $tanggal_surat_tugas = $r->tanggal_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_surat_tugas;
            $tmt_surat_tugas = $r->tmt_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_surat_tugas;
            $judul_penelitian = $r->judul_penelitian == NULL ? "<i><font>Tidak ada data</font></i>": $r->judul_penelitian;
            $lembaga = $r->lembaga == NULL ? "<i><font>Tidak ada data</font></i>": $r->lembaga;
            $tahun_penelitian = $r->tahun_penelitian == NULL ? "<i><font>Tidak ada data</font></i>": $r->tahun_penelitian;

            if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Akademik'){
                $aksi = " <a href='javascript:;'
                data-id='$r->id'
                data-nama='$r->nama'
                data-tempat_lahir='$r->tempat_lahir'
                data-jenis_kelamin='$r->jenis_kelamin'
                data-tanggal_lahir='$r->tanggal_lahir'
                data-agama='$r->agama'
                data-nama_ibu='$r->nama_ibu'
                data-status_aktif='$r->status_aktif'
                data-nidn_nup_nidk='$r->nidn_nup_nidk'
                data-nik='$r->nik'
                data-nip='$r->nip'
                data-npwp='$r->npwp'
                data-ikatan_kerja='$r->ikatan_kerja'
                data-status_pegawai='$r->status_pegawai'
                data-jenis_pegawai='$r->jenis_pegawai'
                data-no_sk_cpns='$r->no_sk_cpns'
                data-tanggal_sk_cpns='$r->tanggal_sk_cpns'
                data-no_sk_pengangkatan='$r->no_sk_pengangkatan'
                data-tanggal_sk_pengangkatan='$r->tanggal_sk_pengangkatan'
                data-lembaga_pengangkatan='$r->lembaga_pengangkatan'
                data-pangkat_golongan='$r->pangkat_golongan'
                data-sumber_gaji='$r->sumber_gaji'
                data-alamat='$r->alamat'
                data-dusun='$r->dusun'
                data-rt='$r->rt'
                data-rw='$r->rw'
                data-kelurahan='$r->kelurahan'
                data-kodepos='$r->kodepos'
                data-kecamatan='$r->kecamatan'
                data-telepon='$r->telepon'
                data-hp='$r->hp'
                data-email='$r->email'
                data-status_pernikahan='$r->status_pernikahan'
                data-nama_suami_istri='$r->nama_suami_istri'
                data-nip_suami_istri='$r->nip_suami_istri'
                data-tmt_pns='$r->tmt_pns'
                data-pekerjaan='$r->pekerjaan'
                data-mampu_menghandle_kebutuhan_khusus='$r->mampu_menghandle_kebutuhan_khusus'
                data-mampu_menghandle_braile='$r->mampu_menghandle_braile'
                data-mampu_menghandle_bahasa_isyarat='$r->mampu_menghandle_bahasa_isyarat'
                data-sertifikasi_dosen='$r->sertifikasi_dosen'
                data-bidang_ilmu='$r->bidang_ilmu'
                data-jabatan='$r->jabatan'
                data-sk_jabatan='$r->sk_jabatan'
                data-tmt_jabatan='$r->tmt_jabatan'
                data-tahun_ajaran='$r->tahun_ajaran'
                data-perguruan_tinggi='$r->perguruan_tinggi'
                data-program_studi='$r->program_studi'
                data-no_surat_tugas='$r->no_surat_tugas'
                data-tanggal_surat_tugas='$r->tanggal_surat_tugas'
                data-tmt_surat_tugas='$r->tmt_surat_tugas'
                data-judul_penelitian='$r->judul_penelitian'
                data-lembaga='$r->lembaga'
                data-tahun_penelitian='$r->tahun_penelitian' 
                data-toggle='modal' data-target='#editdosendikti' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id' 
                data-nama='$r->nama' 
                data-toggle='modal' data-target='#hapusdosendikti' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
            }else{
                $aksi = "Tidak ada Akses";
            }

            $apa[] = array(
                $no++,
                $aksi,
                $nama,
                $tempat_lahir,
                $jenis_kelamin,
                $tanggal_lahir,
                $agama,
                $nama_ibu,
                $status_aktif,
                $nidn_nup_nidk,
                $nik,
                $nip,
                $npwp,
                $ikatan_kerja,
                $status_pegawai,
                $jenis_pegawai,
                $no_sk_cpns,
                $tanggal_sk_cpns,
                $no_sk_pengangkatan,
                $tanggal_sk_pengangkatan,
                $lembaga_pengangkatan,
                $pangkat_golongan,
                $sumber_gaji,
                $alamat,
                $dusun,
                $rt,
                $rw,
                $kelurahan,
                $kodepos,
                $kecamatan,
                $telepon,
                $hp,
                $email,
                $status_pernikahan,
                $nama_suami_istri,
                $nip_suami_istri,
                $tmt_pns,
                $pekerjaan,
                $mampu_menghandle_kebutuhan_khusus,
                $mampu_menghandle_braile,
                $mampu_menghandle_bahasa_isyarat,
                $sertifikasi_dosen,
                $bidang_ilmu,
                $jabatan,
                $sk_jabatan,
                $tmt_jabatan,
                $tahun_ajaran,
                $perguruan_tinggi,
                $program_studi,
                $no_surat_tugas,
                $tanggal_surat_tugas,
                $tmt_surat_tugas,
                $judul_penelitian,
                $lembaga,
                $tahun_penelitian
            );
        }
        
        echo json_encode($apa);
    }


}