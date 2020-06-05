<?php $this->setSiteTitle('Home - MVC Framework'); ?>
<?php $this->start('head'); ?>
    <meta content="test" />
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<?php
    if (currentUser()) {
        if (currentUser()->isAdmin()) {
            echo '<h2 class="mt-2"> Hello Admin - Manager Posts </h2>';
        }
        echo '<a href="'.PROOT.'post/new" class="btn btn-success px-3 my-2" role="button" aria-pressed="true">New Post</a>';
    }
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Thumb</th>
            <th scope="col">Title</th>
            <?php
            if (currentUser() != null && currentUser()->isAdmin()) {
                echo '<th scope="col">Status</th>';
                echo '<th scope="col">Action</th>';
            }
            ?>
        </tr>
<?php
    foreach($this->posts as $post) {
        echo '<tr>';
        echo '<td>' . $post->id . '</td>';
        echo '<td><img src="' . $post->thumb . '" width="130" /></td>';
        echo '<td><a class="text-decoration-none" href="' . PROOT . 'post/post/' . $post->id . '">' . $post->title . '</a></td>';
        if (currentUser() != null && currentUser()->isAdmin()) echo '<td>' . $post->status . '</td>';
        if (currentUser() != null && currentUser()->isAdmin()) {
            echo '<td>';
            echo '<a class="text-decoration-none" href="' .PROOT. 'post/post/' .$post->id . '">Show</a> | ';
            echo '<a class="text-decoration-none" href="' .PROOT. 'post/edit/' .$post->id . '">Edit</a> | ';
            echo '<a class="text-decoration-none" href="' .PROOT. 'post/delete/' .$post->id . '">Delete</a>';
            echo '</td>';
        }
        echo '</tr>';
    }
?>
    </thead>
<?php $this->end(); ?>