<?php 

    $path = explode("/","$_SERVER[REQUEST_URI]")[1];
    $permit_admin = array(
        'users','views'
    );

    $permit_tutor = array(
        'soal','views','paket'
    );
    
    $home ='';
    if( $token):
        $role = $token->role;
        $user = $token->username;
        switch ($role) {
            case "admin":
                $ref = 'admin';
                $home = 'users';
                if( !in_array($path,$permit_admin) ):
                    redirect('users','refresh');
                endif;
            break;
            case "tutor":
                $ref = 'tutor';
                $home = 'soal';
                if( !in_array($path,$permit_tutor) ):
                    redirect('soal','refresh');
                endif;
            break;
        }
    else:
        redirect('login','refresh');
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<title><?php echo $title; ?>
  </title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #03A99F;color:#fff;">
    <div class="container">
      <a class="navbar-brand" href="#">PELATIHAN SOAL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?= base_url(); ?><?= $home; ?>">Home
          <a class="nav-item nav-link" href="<?= base_url(); ?>views">Preview Soal</a>
          <?php if($ref=='tutor'): echo '<a class="nav-item nav-link" href="'.base_url('soal').'">Managemen Soal</a>'; endif; ?>
        </div>
      </div>
      <div class="row" style="width:20%;max-width:40%;">
        <img src='<?= base_url('assets/img/avatar.png');?>' class="img col-4">
        <div class="row">
            <div class="col">
                <?php echo "Hi, ".$user; ?>
                <br>
                <a href = "<?= base_url('login/out');?>" > Logout? </a>
            </div>
        </div>
    </div>
  </nav>

<div class="container"> 
    
    </div>
    