<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo form_open('pilgan/edit');?>
    <?php echo form_hidden('id',$datapilgan[0]->id_pilgan);?>

    <table>
        <tr><td>ID</td><td><?php echo form_input('',$datapilgan[0]->id_pilgan,"disabled");?></td></tr>
        <tr><td>ID soal</td><td><?php echo form_input('id_soal',$datapilgan[0]->id_soal);?></td></tr>
        <tr><td>Text Pilgan</td><td><?php echo form_input('text',$datapilgan[0]->text_pilgan);?></td></tr>  
        <tr><td>Order Pilgan</td><td><?php echo form_input('order',$datapilgan[0]->order_pilgan);?></td></tr>    
        <tr><td colspan="2">
            <?php echo form_submit('submit','Simpan');?>
            <?php echo anchor('users','Kembali');?></td></tr>
    </table>
    <?php
    echo form_close();
    ?>

</body>
</html>