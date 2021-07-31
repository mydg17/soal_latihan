<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management Soal Data
                </div>
                <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">Add Data</button>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#paket">Data Paket</button>
                <table id="datasoal" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Text</th>
                        <th>Paket Soal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </div>
        
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD DATA SOAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('soal/create_latsol',['class'=>'form-inline']);?>
      <?php echo form_hidden('id_user',$token->id);?>
        <div class="form-group mb-2 col-12">
            <div class="col-4">TEXT</div>
            <?php echo form_textarea(['name' => 'text_soal', 'class'=>'form-control areasoal col-8']);?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">PAKET SOAL</div>
            <select name='id_paket_soal' class="form-control">
            <?php 
            for( $i= 0; $i< count($datapaket); $i++ ){ 
            ?>
            ?>
                <option value="<?= $datapaket[$i]['id_paket_soal'];?>"><?= $datapaket[$i]['nama_paket']; ?></option>
            <?php 
            }?>
            </select>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">Opsi A</div>
            <?php echo form_textarea(['name' => 'text_pilgan[]', 'class'=>'form-control areasoal col-8']);?>
            <?php echo form_hidden('order_pilgan[]','A');?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">Opsi B</div>
            <?php echo form_textarea(['name' => 'text_pilgan[]', 'class'=>'form-control areasoal col-8']);?>
            <?php echo form_hidden('order_pilgan[]','B');?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">Opsi C</div>
            <?php echo form_textarea(['name' => 'text_pilgan[]', 'class'=>'form-control areasoal col-8']);?>
            <?php echo form_hidden('order_pilgan[]','C');?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">Opsi D</div>
            <?php echo form_textarea(['name' => 'text_pilgan[]', 'class'=>'form-control areasoal col-8']);?>
            <?php echo form_hidden('order_pilgan[]','D');?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_submit('submit','Simpan', ['class'=>'btn btn-primary']);?>
      </div>
        <?php
        echo form_close();
        ?>
    </div>
  </div>
</div>

<div class="modal fade" id="paket" tabindex="-1" role="dialog" aria-labelledby="paket" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD DATA PAKET</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('paket/create',['class'=>'form-inline']);?>
      <?php echo form_hidden('id_user',$token->id);?>
        <div class="form-group mb-2 col-12">
            <div class="col-4">Nama Paket</div>
            <?php echo form_input(['name' => 'nama_paket', 'class'=>'form-control col-8']);?>
            <hr width="100%">
            <table id="datapaket" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th style="width:30%;">Nama Paket</th>
                        <th style="width:60%;">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_submit('submit','Simpan', ['class'=>'btn btn-primary']);?>
      </div>
        <?php
        echo form_close();
        ?>
    </div>
  </div>
</div>

    <script>
        $(document).ready( function () {
        var table = $('#datasoal');
        table.DataTable({
            'processing': true,
            'serverSide': true,
            'ordering': true, 
            'order': [
                [0, 'asc']
            ], 
            'ajax': {
                'url': 'json/show_soal',
                'type': 'post'
            },
            'deferRender': true,
            'aLengthMenu': [
                [5, 10, 50],
                [5, 10, 50]
            ],
            'columns': [
                {
                    'data': 'val1'
                },
                {
                    'data': 'val2'
                },
                {
                    'render': function(data, type, row) {
                        var html = '<a class="btn btn-sm badge-success float-left mr-2" href="soal/edit/' + row.id + '" title="Edit"><span class="fa fa-edit"></span> EDIT</a>';
                        html += '<a class="btn btn-sm badge-danger float-left" href="soal/delete/' + row.id +  '" title="HAPUS"><span class="fa fa-trash">HAPUS</span></a>';
                        return html;
                    },
                    orderable: false
                }
            ]
        });


        var Ptable = $('#datapaket');
        Ptable.DataTable({
            'processing': true,
            'serverSide': true,
            'ordering': true, 
            'lengthChange': false,
            'order': [
                [0, 'asc']
            ], 
            'ajax': {
                'url': 'json/show_paket',
                'type': 'post'
            },
            'deferRender': true,
            'aLengthMenu': [
                [5, 10, 50],
                [5, 10, 50]
            ],
            'columns': [
                {
                    'data': 'val1'
                },
                {
                    'render': function(data, type, row) {
                        var html = '<a class="btn-sm badge-success float-left mr-2" href="paket/edit/' + row.id + '" title="Edit"><span class="fa fa-edit"></span> EDIT</a>';
                        html += '<a class="btn-sm badge-danger float-left" href="paket/delete/' + row.id +  '" title="HAPUS"><span class="fa fa-trash">HAPUS</span></a>';
                        return html;
                    },
                    orderable: false
                }
            ]
        });
    } );
    </script>
    </body>
</html>