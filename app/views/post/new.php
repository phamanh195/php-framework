<?php $this->setSiteTitle('New Post - MVC Framework'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h2 class="my-3 text-center">NEW POST</h2>
<form action="<?=PROOT?>post/new" method="POST" enctype="multipart/form-data">

    <div><?= $this->displayErrors ?></div>

    <div class="form-group mt-1">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>

    <div class="form-group mt-1">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
    </div>

    <div class="form-group">
        <label for="thumb">Image</label>
        <input type="file" class="form-control-file" id="thumb" name="thumb" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2 mb-5">Submit</button>
</form>
<?php $this->end(); ?>