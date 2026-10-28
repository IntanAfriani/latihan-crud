<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet">
</head>

<body>

    <div class="container">
        <h2>Data Mahasiswa</h2>

        <form method="post" action="simpan.php">
            <input type="text" name="nim" placeholder="NIM" required> <br><br>
            <input type="text" name="nama" placeholder="Nama" required> <br><br>
            <input type="text" name="jurusan" placeholder="Jurusan" required> <br><br>
            <input type="number" name="angkatan" placeholder="Angkatan" required> <br><br>
            <button type="submit">Simpan</button> <br><br>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td><?= $row['angkatan'] ?></td>
                    <td>
                        <a class="edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="hapus" href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>

</body>

</html>