<div class="social-media-wrapper">
    <p class="social-media-title">Follow Us</p>
    <div class="social-media">
        <?php if ($facebook = get_field('facebook', 'option')) : ?>
            <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>
        <?php if ($twitter = get_field('twitter', 'option')) : ?>
            <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>
        <?php if ($instagram = get_field('instagram', 'option')) : ?>
            <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>
        <?php if ($youtube = get_field('youtube', 'option')) : ?>
            <a href="<?php echo $youtube; ?>"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
    </div>
</div>