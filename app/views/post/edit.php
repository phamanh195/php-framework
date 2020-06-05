<?php $this->setSiteTitle('New Post - MVC Framework'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h2 class="my-3 text-center">NEW POST</h2>
<form action="<?=PROOT?>post/edit" method="POST" enctype="multipart/form-data">

    <div><?= $this->displayErrors ?></div>

    <div class="form-group mt-1">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $this->post->title ?>">
    </div>

    <div class="form-group mt-1">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $this->post->description ?>">
    </div>

    <div class="form-group">
        <label for="thumb">Image</label>
        <input type="file" class="form-control-file" id="thumb" name="thumb" required>
    </div>

    <div class="form-group">
    <label for="status">Status</label>
    <select multiple class="form-control" id="status" name="status">
        <?php
        if ($this->post->status == '1') {
            echo '<option value="1" selected>Enable</option>';
            echo '<option value="0">Unable</option>';
        } else {
            echo '<option value="1">Enable</option>';
            echo '<option value="0" selected>Unable</option>';
        }
        ?>
    </select>
    </div>

    <button type="submit" class="btn btn-primary mt-2 mb-5">Submit</button>
</form>
<?php $this->end(); ?>