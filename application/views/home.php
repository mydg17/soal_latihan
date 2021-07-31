    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask">
        <span class="material-icons">
            add_task
        </span>
        Create a new to do...
</button>
<div class="row">
        <div class="tdl autocenter col-10">
            <div class="form-group">
                <table class="table" id="todolist" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="90%">List for to do</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($tampil as $row){
                    ?>
                        <tr>
                            <td><?= $row->text_tdl; ?></td>
                            <td>
                                <input type="hidden" name="text_tdl" value="<?= $row->text_tdl; ?>">
                                <input type="hidden" name="id_tdl" value="<?= $row->id_tdl; ?>">
                                <span class="material-icons text-primary" data-toggle="modal"  data-target="#updtask<?= $row->id_tdl; ?>">edit_note</span>
                                <span class="material-icons text-danger hapustask" data-toggle="modal" data-target="#remtask<?= $row->id_tdl; ?>">delete</span>
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
