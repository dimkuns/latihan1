<?php
class mahasiswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_mahasiswa');
  }
  function index()
  {
    $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
    $this->load->view('mahasiswa', $data);
  }
  function hapus($nim)
  {
    $this->m_mahasiswa->hapus($nim);
    $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
    $this->load->view('mahasiswa', $data);
  }
  function insert()
  {
    $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
    $this->load->view('insert_mahasiswa', $data);
  }
  function insertmahasiswa()
  {
    $nim = $this->input->post('nim');
    $nama = $this->input->post('nama');
    $jurusan = $this->input->post('jurusan');
    $alamat = $this->input->post('alamat');
    $this->load->library('form_validation');

    $this->form_validation->set_rules(
      'nim',
      'nim',
      'required|min_length[8]',
      [
        'required' => '* NIM harus Harus diisi',
        'min_lenght' => '* NIM terlalu pendek'
      ]
    );
    $this->form_validation->set_rules(
      'nama',
      'nama',
      'required',
      [
        'required' => '*Nama Harus diisi'
      ]
    );
    $this->form_validation->set_rules(
      'alamat',
      'alamat',
      'required|min_length[3]',
      [
        'required' => '* Alamat harus Harus diisi',
        'min_lenght' => '* Alamat terlalu pendek'
      ]
    );
    if ($this->form_validation->run() != true) {
      $this->load->view('insert_mahasiswa');
    } else {
      $data = array(
        'nim' => $nim,
        'nama' => $nama,
        'jurusan' => $jurusan,
        'alamat' => $alamat
      );
      $this->m_mahasiswa->input_data($data,'mahasiswa');
      redirect('http://localhost/myci/index.php/mahasiswa');
    }
    ;
  }
  function edit($nim)
  {
    $where = array('nim' => $nim);
    $data['mahasiswa'] = $this->m_mahasiswa->edit_data($where,'mahasiswa')->result();
    $this->load->view('edit_mahasiswa', $data);
  }
  function update()
  {
    $nim = $this->input->post('nim');
    $nama = $this->input->post('nama');
    $jurusan = $this->input->post('jurusan');
    $alamat = $this->input->post('alamat');

    $this->form_validation->set_rules(
      'nama',
      'nama',
      'required',
      [
        'required' => '*Nama Harus diisi'
      ]
    );
    $this->form_validation->set_rules(
      'alamat',
      'alamat',
      'required|min_length[3]',
      [
        'required' => '* Alamat harus Harus diisi',
        'min_lenght' => '* Alamat terlalu pendek'
      ]
    );
    if ($this->form_validation->run() != true) {
      $this->load->view('insert_mahasiswa');
    } else {
      $data = array(
        'nama' => $nama,
        'jurusan' => $jurusan,
        'alamat' => $alamat,

      );
      $where = array(
        'nim' => $nim
      );

      $this->m_mahasiswa->update_data($data, 'mahasiswa', $where);
      redirect('http://localhost/myci/index.php/mahasiswa');
    }
  }
}