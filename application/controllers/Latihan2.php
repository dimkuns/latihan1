<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Latihan2 extends CI_Controller
{
public function index()
{
$this->load->helper('url');
$this->load->view('input_matakuliah');
}
public function cetak()
{
$kodeMataKuliah = $this->input->post('kode');
$namaMataKuliah = $this->input->post('nama');
$sksMataKuliah = $this->input->post('sks');
$this->load->library('form_validation');
$this->form_validation->set_rules(
'kode',
'Kode Matakuliah',
'required|min_length[3]',
[
'required' => '* Kode Matakuliah Harus diisi',
'min_lenght' => '* Kode terlalu pendek'
]
);
$this->form_validation->set_rules(
'nama',
'Nama Matakuliah',
'required',
[
'required' => '* Nama Matakuliah Harus diisi'
]
);
if ($this->form_validation->run() != true) {
$this->load->helper('url');
$this->load->view('input_matakuliah');
} else {
if ($sksMataKuliah == 1) {
$sksUnggulan = "SKS Reguler";
$BobotNilai = "< 60";
$Status = "Wajib Remedial";
} else if ($sksMataKuliah == 2) {
$sksUnggulan = "SKS Reguler";
$BobotNilai = "60 sd 74";
$Status = "Tidak Remedial";
} else if ($sksMataKuliah == 3) {
$sksUnggulan = "SKS Reguler";
$BobotNilai = "75 sd 80";
$Status = "Tidak Remedial";
} else if ($sksMataKuliah == 4) {
$sksUnggulan = "Unggulan SKS";
$BobotNilai = "81 sd 100";
$Status = "Tidak Remedial";
}
//membuat object untuk parsing data ke view yg dituju
$data = [
'kode' => $kodeMataKuliah,
'nama' => $namaMataKuliah,
'sks' => $sksMataKuliah,
'unggulan' => $sksUnggulan,
'range' => $BobotNilai,
'status' => $Status
];
//kirim ke view
$this->load->view('output_matakuliah.html', $data);
}
}
}
?>