    <div class="row">
        <div class="col footer">
            <label>Umrotix - test Programming</label>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addtask" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">What will you do?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method='' action='' id="sendtask">
      <div class="modal-body">
        <label><h5>Add task</h5></label>
        <textarea class="form-control" name="task"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savetask">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- hapus -->
<?php foreach($tampil as $row){ ?>
<div class="modal fade" id="remtask<?= $row->id_tdl; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method='' action='' id="deltask">
      <div class="modal-body">
        <label><h5>You will delete this</h5></label>
        <input type="hidden" name="task" value="<?= $row->id_tdl; ?>">
        <input type="hidden" name="user" value="<?= $this->session->userdata('id_user'); ?>">
        <?= $row->text_tdl; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= base_url();?>home/deltask/<?= $row->id_tdl; ?>"><button type="button" value="delete" class="btn btn-primary btn-danger">Delete</button></a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

<!-- update -->
<?php foreach($tampil as $row){ ?>
<div class="modal fade" id="updtask<?= $row->id_tdl; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to update?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method='post' action='home/updatetask' id="updtask">
      <div class="modal-body">
        <label><h5>You will edit this</h5></label>
        <input type="hidden" name="task" value="<?= $row->id_tdl; ?>">
        <input type="hidden" name="user" value="<?= $this->session->userdata('id_user'); ?>">
        <textarea class="form-control" name="text_task"><?= $row->text_tdl; ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Update" class="btn btn-primary btn-warning">
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

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
                        var html = '<a class="btn btn-sm badge-success float-left mr-2" href="C_mo_order/Tedit/' + row.id_user + '" title="Edit"><span class="fa fa-edit"></span> T</a>';
                        html += '<a class="btn btn-sm badge-success float-left mr-2" href="C_mo_order/edit/' + row.id_user + '" title="Edit"><span class="fa fa-edit"></span> R</a>';
                        html += '<a class="btn btn-sm badge-danger text-white float-left" data-target="#modalHapus' + row.id_user + '" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span></a>';
                        html += '<a class="btn btn-sm badge-primary float-left ml-2" href="C_mo_order/print/' + row.id_user + '" title="Edit"><span class="fa fa-print"></span></a>';
                        return html;
                    },
                    orderable: false
                }
            ]
        });

            $('#savetask').click(function(){
                var data = $('#sendtask').serialize();
                $.ajax({
                    url: '<?php echo base_url(); ?>home/addtask',
                    type: 'POST',
                    data: data,
                    cache	: false,
                    success:function(data){
                        // document.getElementById("addtask").classList.add('show');
                        location.href = 'home';
                    }
                });
                });
        } );
    </script>
    </body>
</html>