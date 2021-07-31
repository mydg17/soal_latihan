<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>No</tr>
            <tr>ID Pilgan</tr>
            <tr>ID Soal</tr>
            <tr>Text</tr>
            <tr>Order</tr>
        </thead>
        <tbody>
        <?php 
            $i = 0;
            foreach( $datapilgan as $row ){ 
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row->id_pilgan; ?></td>
                <td><?= $row->id_soal; ?></td>
                <td><?= $row->text_pilgan; ?></td>
                <td><?= $row->order_pilgan; ?></td>
                <td>
                    <?= anchor( 'pilgan/edit/'.$row->id_pilgan, 'Edit' ); ?>
                    <?= anchor( 'pilgan/delete/'.$row->id_pilgan, 'Delete' ); ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>