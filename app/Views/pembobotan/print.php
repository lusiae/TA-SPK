<!DOCTYPE html>
<html lang="id">

<head>
    <title>Cetak - Hasil Perhitungan AHP</title>
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/adminlte.min.css">
    <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
</head>

<body>
    <h4>
        <center>HASIL PERHITUNGAN SISTEM PENDUKUNG KEPUTUSAN<br>PEMILIHAN MAHASISWA BIDIKMISI METODE AHP</center>
    </h4>
    <hr>
    <div id="tctk"></div>
</body>

<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Madiun, <?php echo date('d-M-Y') ?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
    <td><br /><br /><br /></td>
    </tr>
    <tr>
        <td align="right">( <?= userLogin()->nama_lengkap ?> )
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>

</html>