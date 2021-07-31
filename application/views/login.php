<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="coverLogin">
<div class="container"> 
    <div class="row">
        <div class="login autocenter col-6">
        <?= form_open('login'); ?>
            <div class="form-group">
                <label>
                    Username
                </label>
                <?= form_input(array('name' => 'username', 'class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <label>
                    Password
                </label>
                <?= form_input(array('name' => 'password', 'type' => 'password', 'class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <label>
                    Role
                </label>
                <?php 
                    $opt_role = array('admin' => 'admin', 'tutor' => 'tutor' );
                    echo form_dropdown('role', $opt_role, 'tutor',['class' => 'form-control' ]);
                ?>
            </div>
            <div class="from-input">
                <?php echo form_submit('submit','Simpan',['class'=>'btn btn-primary btn-sm']);?>
            </div>
            </form>
        </div>
    </div>
</div>

<script>

// const login = document.querySelector('#frmlogin');
// const form = document.forms[0];

// login.addEventListener('submit', async (e) => {
//   e.preventDefault();

//   const res = await fetch('login', {
//     method: 'POST',
//     headers: {
//       'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
//     },
//     body: JSON.stringify({
//       username: form.username.value,
//       password: form.password.value,
//       role: form.role.value
//     })
//   });
// });
</script>