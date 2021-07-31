<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management User Data
                </div>
                <div class="card-body">
                    <?php echo form_open('paket/edit',['class'=>'form-inline']);?>
                    <?php echo form_hidden('id',$datapaket[0]['id_paket_soal']);?>
                        <div class="form-group mb-2 col-12">
                            <div class="col-4">NAMA PAKET</div>
                            <?php echo form_input(['name' => 'text_soal','class'=>'form-control col-8'], $datapaket[0]['nama_paket']);?>
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
