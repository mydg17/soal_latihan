<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container"> 
    <div class="row">
        <div class="login autocenter col-6">
            <form method="post" action="<?= base_url('registration/new_user');?>">
            <label><h3>Registration User</h3></label>
            <div class="form-group">
                <label>
                    Username
                </label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>
                    Password
                </label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>
                    Email
                </label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>
                    Role
                </label>
                <input type="role" name="role" class="form-control" required>
            </div>
            <div class="from-input">
                <input type="submit" value="Registration"  class="btn btn-primary btn-sm"> <a href='login' class="btn btn-warning btn-sm">Back to login -></a>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>