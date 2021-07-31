<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo form_open_multipart('paket/create');?>
    <table>
        <tr><td>ID soal</td><td><?php echo form_input('soal');?></td></tr>
        <tr><td>Nama Paket</td><td><?php echo form_input('nama_paket');?></td></tr>     
        <tr><td colspan="2">
            <?php echo form_submit('submit','Simpan');?>
            <?php echo anchor('paket','Kembali');?></td></tr>
    </table>
    <?php
    echo form_close();
    ?>
</body>
</html>