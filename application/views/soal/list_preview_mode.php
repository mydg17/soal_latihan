<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Management Soal Data
                </div>
                <div class="card-body">
                <table id="datapaket" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th style="width:90%;">Nama Paket</th>
                        <th style="width:10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </div>
        
        </div>
    </div>
</div>

    <script>
        $(document).ready( function () {

        var Ptable = $('#datapaket');
        Ptable.DataTable({
            'processing': true,
            'serverSide': true,
            'ordering': true, 
            'ajax': {
                'url': '../json/show_paket',
                'type': 'post'
            },
            'deferRender': true,
            'aLengthMenu': [
                [15, 5],
                [15, 5]
            ],
            'columns': [
                {
                    'data': 'val1'
                },
                {
                    'render': function(data, type, row) {
                        var html = '<a class="btn-sm badge-warning float-left" href="../views/preview/' + row.id +  '" title="LIHAT"><span class="fa fa-trash">LIHAT</span></a>';
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