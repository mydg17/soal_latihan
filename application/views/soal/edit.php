<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management User Data
                </div>
                <div class="card-body">
                    <?php echo form_open('soal/edit',['class'=>'form-inline']);?>
                    <?php echo form_hidden('id',$datasoal[0]['id_soal']);?>
                    <?php echo form_hidden('id_user',$datasoal[0]['id_user']);?>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">TEXT</div>
                            <?php echo form_input(['name' => 'text_soal','class'=>'form-control col-8'], $datasoal[0]['text_soal']);?>
                        </div>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">PAKET SOAL</div>
                            <?php echo form_input(['name' => 'id_paket_soal','class'=>'form-control col-8'], $datasoal[0]['id_paket_soal']);?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo anchor('soal','Back',['class'=>'btn btn-secondary']);?>
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
