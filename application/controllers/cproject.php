<?php
class cproject extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'pagination', 'form_validation', 'upload'));
        $this->load->model('mproject');
    }
    function index()
    {
        $data['cproject'] = $this->mproject->tampilData()->result();
        $config['base_url'] = site_url('cproject/index/');
        if ($this->uri->segment(3) == "delete_success")
            $data['message'] = "<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if ($this->uri->segment(3) == "add_success")
            $data['message'] = "<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message'] = '';
        $this->template->display('mproject/index', $data);
    }
    function tambah()
    {
        $nim = $this->input->post('nim');
        if ($nim <> "") {
            $cek = $this->mproject->cek($nim);
            if ($cek->num_rows() > 0) {
                $data['message'] = "<div class='alert alert-warning'>NIM sudah digunakan</div>";
                $this->template->display('cproject/tambah', $data);
            } else {
                $isidata = array(
                    'nim' => $this->input->post('nim'),
                    'nama' => $this->input->post('nama'),
                    'jurusan' => $this->input->post('jurusan'),
                    'alamat' => $this->input->post('alamat')
                );
                $this->mproject->simpan($isidata);
                redirect('cproject/index/add_success');
            }
        } else {
            $data['message'] = "";
            $this->template->display('mproject/tambah', $data);
        }
    }
    function hapus()
    {
        $nim = $this->input->post('kode');
        $this->mproject->hapus($nim);
    }
    function edit($id)
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        if ($nim <> "" and $nama <> "" and $jurusan <> "" and $alamat <> "") {
            $isidata = array(
                'nama' => $this->input->post('nama'),
                'jurusan' => $this->input->post('jurusan'),
                'alamat' => $this->input->post('alamat')
            );
            $this->mproject->update($nim, $isidata);
            $data['message'] = "<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['mhs'] = $this->mproject->cek($id)->row_array();
            $this->template->display('cproject/edit', $data);
        } else {
            $data['mhs'] = $this->mproject->cek($id)->row_array();
            $data['message'] = "";
            $this->template->display('mproject/edit', $data);
        }
    }
}