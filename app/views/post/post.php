<?php $this->setSiteTitle('Post'.$this->post->id.' - MVC Framework'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<?php
    echo '<a class="btn btn-primary my-3" href="'.PROOT.'" role="button">Back</a>';
    echo '<h4 class="my-2">' . $this->post->title . '</h4>';
    echo '<figure class="figure">';
    echo '<img src="' . $this->post->thumb . '" class="figure-img img-fluid rounded" alt="Thumb">';
    echo '<figcaption class="figure-caption">' . $this->post->description .'</figcaption>';
    echo '</figure>';
?>
<?php $this->end(); ?>