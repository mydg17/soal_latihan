<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management User Data
                </div>
                <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">Add Data</button>
                <table id="datauser" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">ADD DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('users/create',['class'=>'form-inline']);?>
        <div class="form-group mb-2 col-12">
            <div class="col-4">USERNAME</div>
            <?php echo form_input(['name' => 'nama', 'class'=>'form-control col-8']);?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">PASSWORD</div>
            <?php echo form_input(['name' => 'pass', 'class'=>'form-control col-8','type'=>'password']);?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">EMAIL</div>
            <?php echo form_input(['name' => 'mail', 'class'=>'form-control col-8', 'type' => 'email']);?>
        </div>
        <div class="form-group mb-2 col-12">
            <div class="col-4">ROLE</div>
            <?php echo form_dropdown('role', ['admin' => 'admin','tutor' => 'tutor'], 'tutor', ['class' => 'form-control']);?>
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
        var baseUrl = $('#base-url').data('url');
        var no = 1;
        var table = $('#datauser');
        table.DataTable({
            'processing': true,
            'serverSide': true,
            'ordering': true, 
            'order': [
                [0, 'asc']
            ], 
            'ajax': {
                'url': 'json/show_user',
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
                    'data': 'val3'
                },
                {
                    'render': function(data, type, row) {
                        var html = '<a class="btn btn-sm badge-success float-left mr-2" href="users/edit/' + row.id + '" title="Edit"><span class="fa fa-edit"></span> EDIT</a>';
                        html += '<a class="btn btn-sm badge-danger float-left" href="users/delete/' + row.id +  '" title="HAPUS"><span class="fa fa-trash">HAPUS</span></a>';
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