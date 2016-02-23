<div class="box">
    <div class="box-header">
        <h3 class="box-title">Upload Image</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form  action="<?php echo Yii::app()->createUrl('upload/AddPostForWeb') ?>" enctype="multipart/form-data" method="POST" class="qh-form qh-upload-post-form">


            <input type="hidden" value="<?php echo Yii::app()->request->url ?>" name="previous_url">
            <input type="hidden" value="<?php echo Yii::app()->session['user_id'] ?>" name="user_id" >
            <div class="form-group">
                <label for="exampleInputFile">Upload ảnh (có thể nhiều ảnh)</label>
                <input type="file" id="exampleInputFile" name="images[]" multiple="">
            </div>
            <div class="form-group">
                <label>Thời trang nam</label>
                <?php foreach ($male_cats as $cat): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>">
                            <?php echo $cat->cat_name ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <label>Thời trang nữ</label>
                <?php foreach ($female_cats as $cat): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>">
                            <?php echo $cat->cat_name ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <label>Khác</label>
                <?php foreach ($other_cats as $cat): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>">
                            <?php echo $cat->cat_name ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <div class="form-group">
                    <textarea rows="4" placeholder="Miêu tả" class="form-control" name="post_content"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Đăng bài</button>

            </div>
        </form>
    </div> 
</div>