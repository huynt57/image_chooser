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
                            <a data-image-src="<?php echo $item['image_url'] ?>" 
                               data-image-standard="<?php echo $item['image_standard_url'] ?>"
                               data-caption="<?php echo $item['caption'] ?>"
                               data-username="<?php echo $item['username'] ?>"
                               data-insta-id="<?php echo $item['user_insta_id'] ?>"
                               data-toggle="modal" data-target="#modal" class="label label-primary update" 
                               >Cập nhật</a>
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
                <h4 class="modal-title">Choose Image or Not ??</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <img src="" id="image_src">
                    </div>
                    <div class="col-md-5">
                        <form id="save-form">
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <textarea class="form-control" id="caption" rows="12" name="caption"></textarea>
                                <input type="hidden" name="image_standard_url" id="image_standard_url">
                                <input type="hidden" name="username" id="username">
                                <input type="hidden" name="user_insta_id" id="user_insta_id">

                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="choose" id="choose" value="yes"> Chọn ảnh này
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-modal">Save</button>
                </div>
            </div>


        </div>
    </div>
    <script>
        $(document).on('click', '.update', function () {
            var image_src = $(this).attr('data-image-src');
            var image_standard_url = $(this).attr('data-image-standard');
            var caption = $(this).attr('data-caption');
            var username = $(this).attr('data-username');
            var user_insta_id = $(this).attr('data-insta-id');
            $('#image_src').attr('src', image_src);
            $('#caption').val(caption);
            $('#image_standard_url').val(image_standard_url);
            $('#username').val(username);
            $('#user_insta_id').val(user_insta_id);
            $('#choose').removeAttr('checked');
        });

        $(document).on('click', '#save-modal', function () {
            var form = $('#save-form');
            var data = form.serialize();
            console.log(data);
            $.ajax({
                beforeSend: function (xhr) {
                    $('#modal').addClass('blur-loading');
                },
                type: 'POST',
                url: '<?php echo Yii::app()->createUrl('image/insert') ?>',
                data: data,
                dataType: 'json',
                success: function (response)
                {

                    displayMessage(1);
                },
                error: function (response)
                {
                    displayMessage(2);
                },
                complete: function (response)
                {
                    $('#modal').removeClass('blur-loading');
                }
            });
        });


        $(function () {
            $("#example1").DataTable();
        });
    </script>