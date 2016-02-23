<form  action="<?php echo Yii::app()->createUrl('upload/AddPostForWeb') ?>" enctype="multipart/form-data" method="POST" class="qh-form qh-upload-post-form">
    <div class="qh-form-row">
        <textarea rows="4" placeholder="Miêu tả" class="post-description" name="post_content"></textarea>
    </div>
    <div class="qh-form-row clearfix text-center">
        <div class="post-image-upload">

        </div>
        <input type="hidden" value="<?php echo Yii::app()->request->url ?>" name="previous_url">
        <input type="hidden" value="<?php echo Yii::app()->session['user_id'] ?>" name="user_id" >
        <div class="post-image-input">
            <input type="file" class="hidden" id="inputPostImage" name="images[]">
            <label for="inputPostImage" class="label-image-input text-center">
                <div class="icon"><i class="fa fa-plus"></i></div>
                <div class="text">Thêm ảnh</div>
            </label>
        </div>
    </div>
    <div class="qh-form-row clearfix text-center">
        <div class="category-title">Chọn chuyên mục (tối đa: 2)</div>
        <div class="category-choosing">
            <div class="qh-form-row">
                <label class="qh-form-label">Thời trang nam</label>
                <?php foreach ($male_cats as $cat): ?>
                    <div class="checkbox-inline">
                        <label><input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name ?></label>
                    </div>
                <?php endforeach; ?>
                <label class="qh-form-label">Thời trang nữ</label>
                <?php foreach ($female_cats as $cat): ?>
                    <div class="checkbox-inline">
                        <label><input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name ?></label>
                    </div>
                <?php endforeach; ?>
                <label class="qh-form-label">Khác</label>
                <?php foreach ($other_cats as $cat): ?>
                    <div class="checkbox-inline">
                        <label><input type="checkbox" name="cats[]" value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="qh-form-row clearfix text-center">
        <button class="qh-btn qh-btn-red600" type="submit">Đăng ảnh</button>
        <div class="post-cancel"><a href="#">Hủy đăng ảnh</a></div>
    </div>
</form>