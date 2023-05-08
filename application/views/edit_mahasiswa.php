<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
<body>
<?php foreach($mahasiswa as $u) ?>
<form action="<?= base_url('index.php/mahasiswa/update'); ?>" method="post">
<table border="1%">
<tr>
	<th colspan="3">
	Input Data Diri
	</th>
</tr>
<tr>
	<td>NIM</td>
	<td>:</td>
	<td><input name="nim" id="nim" readonly value="<?php echo $u->nim ?>"></td>
</tr>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" name="nama" id="nama" value="<?php echo $u->nama ?>"></td>
</tr>
<tr>
	<td>Jurusan</td>
	<td>:</td>
	<td>
		<select name="jurusan" id="jurusan" value="<?php echo $u->jurusan ?>">
		<option value="Teknik Informatika">Teknik Informatika</option>
		<option value="Management">Management</option>
		<option value="Administrasi">Administrasi</option>
		<option value="Teknik Informasi">Teknik Informasi</option>
		</select>
	</td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><input type="text" name="alamat" id="alamat" value="<?php echo $u->alamat ?>"></td>
</tr>
<tr>
	<td colspan="3"><input type="submit" name="submit" id="submit" value="submit"></td>
</tr>

</table>

</form>
</body>
</html>