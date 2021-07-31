<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo form_open_multipart('pilgan/create');?>
    <table>
        <tr><td>ID soal</td><td><?php echo form_input('id_soal');?></td></tr>
        <tr><td>Text Pilgan</td><td><?php echo form_input('text');?></td></tr>  
        <tr><td>Order Pilgan</td><td><?php echo form_input('order');?></td></tr>    
        <tr><td colspan="2">
            <?php echo form_submit('submit','Simpan');?>
            <?php echo anchor('pilgan','Kembali');?></td></tr>
    </table>
    <?php
    echo form_close();
    ?>
</body>
</html>