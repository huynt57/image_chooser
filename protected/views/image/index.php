<div class="box">
    <div class="box-header">
        <h3 class="box-title">Image Chooser</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
<!--                    <th>ID</th>-->
                    <th>Image</th>
                    <th>Caption (Insta)</th>
                    <th>Username</th>
                    <th>Instagram ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item): ?>
                    <tr>
    <!--                         <td width="10%"><?php echo $item['id'] ?></td>-->
                        <td><img src="<?php echo $item['image_url_thumbnail'] ?>"></td>
                        <td width="40%"><?php echo $item['caption'] ?></td>
                        <td><?php echo $item['username'] ?></td>
                        <td width="20%"><?php echo $item['user_insta_id'] ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#modal" class="label label-primary" onclick="getInfo(<?php echo $item['id'] ?>);">Cập nhật</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
<!--                    <th>ID</th>-->
                    <th>Image</th>
                    <th>Caption (Insta)</th>
                    <th>Username</th>
                    <th>Instagram ID</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(function () {
        //$("#example1").DataTable();
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>