<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo form_open_multipart('users/create');?>
    <table>
        <tr><td>username</td><td><?php echo form_input('nama');?></td></tr>
        <tr><td>password</td><td><?php echo form_input('pass');?></td></tr>     
        <tr><td>email</td><td><?php echo form_input('mail');?></td></tr>  
        <tr><td>role</td><td><?php echo form_input('role');?></td></tr>     
        <tr><td colspan="2">
            <?php echo form_submit('submit','Simpan');?>
            <?php echo anchor('kontak','Kembali');?></td></tr>
    </table>
    <?php
    echo form_close();
    ?>
</body>
</html>