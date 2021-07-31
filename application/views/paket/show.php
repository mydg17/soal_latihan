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
            <tr>ID soal</tr>
            <tr>Paket</tr>
        </thead>
        <tbody>
        <?php 
            $i = 0;
            foreach( $datapaket as $row ){ 
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row->id_soal; ?></td>
                <td><?= $row->nama_paket; ?></td>
                <td>
                    <?= anchor( 'paket/edit/'.$row->id_paket_soal, 'Edit' ); ?>
                    <?= anchor( 'paket/delete/'.$row->id_paket_soal, 'Delete' ); ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>