<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="MyCI/css/bootstrap.css" />
</head>

<body>
    <center>
        <h1>Data Mahasiswa</h1>

        <a href="<?= base_url('index.php/mahasiswa/insert'); ?>">Tambah Data</a>
        <script src="MyCI/js/bootstrap.bundle.js"></script>
        <table width="40%" border="1">
            <table class="table">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>NIM</td>
                        <td>Nama</td>
                        <td>Jurusan</td>
                        <td>Alamat</td>
                        <td>Action</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <?php $no = 0;
                foreach ($mahasiswa as $row):
                    $no++; ?>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $row->nim; ?>
                        </td>
                        <td>
                            <?php echo $row->nama; ?>
                        </td>
                        <td>
                            <?php echo $row->jurusan; ?>
                        </td>
                        <td>
                            <?php echo $row->alamat; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('index.php/mahasiswa/hapus/' . $row->nim); ?>">hapus</a>
                        </td>
                        <td>
                            <a href="<?= base_url('index.php/mahasiswa/edit/' . $row->nim); ?>">edit</a>
                    </tr>

                <?php endforeach; ?>
            </Table>
    </center>

</body>

</html>