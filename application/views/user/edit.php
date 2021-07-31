<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management User Data
                </div>
                <div class="card-body">
                    <?php echo form_open('users/edit',['class'=>'form-inline']);?>
                    <?php echo form_hidden('id',$datauser[0]['id_user']);?>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">USERNAME</div>
                            <?php echo form_input(['name' => 'nama','class'=>'form-control col-8'], $datauser[0]['username']);?>
                        </div>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">PASSWORD</div>
                            <?php echo form_input(['name' => 'nama','class'=>'form-control col-8','type' => 'password' ], $datauser[0]['password']);?>
                        </div>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">EMAIL</div>
                            <?php echo form_input(['name' => 'mail', 'class'=>'form-control col-8', 'type' => 'email'], $datauser[0]['email']);?>
                        </div>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">ROLE</div>
                            <?php echo form_dropdown('role', ['admin' => 'admin','tutor' => 'tutor', $datauser[0]['role'] => $datauser[0]['role'] ], $datauser[0]['role'], ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo anchor('users','Back',['class'=>'btn btn-secondary']);?>
                        <?php echo form_submit('submit','Simpan', ['class'=>'btn btn-primary']);?>
                    </div>
                        <?php
                        echo form_close();
                        ?>
                </div>
            </div>
        
        </div>
    </div>
</div>

    </body>
</html>
