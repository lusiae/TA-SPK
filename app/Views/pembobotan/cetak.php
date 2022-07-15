<?php error_reporting(0);
$db = db_connect();
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Mahasiswa.xls"); ?>
<h4>
    <center>HASIL PERHITUNGAN SISTEM PENDUKUNG KEPUTUSAN<br>PEMILIHAN MAHASISWA BIDIKMISI METODE AHP</center>

</h4>

<tr>
    <td align="left">Madiun, <?php echo date('d-M-Y') ?></td>
</tr>
<tr>
    <td><br><br></td>
</tr>


<table class='table table-bordered' border='1'>
    <tr>

        <th>NPM</th>
        <th>Nama Mahasiswa</th>
        <th>Program Studi</th>
        <th>Tahun</th>
        <th>Hasil</th>
        <th>Rangking</th>
    </tr>
    <?php
    $urut = 1;
    $query = $db->query("SELECT a.nama_mahasiswa as nama_mahasiswa, a.npm as npm, a.program_studi as prodi, a.tahun as tahun, sum(h.hasil) as nilai from hasil h join alternatif a on a.id_alternatif=h.id_alternatif group by nama_mahasiswa order by hasil desc");
    $mahasiswa = $query->getResultArray();
    foreach ($mahasiswa as $list) {
        if ($urut > 10) {
            $style = 'color:red';
        } else {
            $style = '';
        }  ?>


        <tr style='<?= $style ?>'>

            <td><?= $list['npm'] ?></td>
            <td><?= $list['nama_mahasiswa'] ?></td>
            <td><?= $list['prodi'] ?></td>
            <td><?= $list['tahun'] ?></td>
            <td><?= number_format($list['nilai'], 3) ?></td>
            <td>
                <center><b><?= $urut++ ?></b></center>
            </td>
        </tr>

    <?php }  ?>

</table>