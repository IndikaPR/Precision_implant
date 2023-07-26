<?php /* Template Name: Home */ ?>
<?php get_header();
?>

<section class="home-banner" id="contact">
    <?php getImage(get_field('background_image', 'option'), 'full-image'); ?>
    <div class="container" id="schedule">
        <div class="banner-image">
            <?php getImage(get_field('banner_image'), 'full-image bg'); ?>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="content-wrapper">
                    <?php the_field('banner_content'); ?>
                </div>
            </div>
            <?php if ($formID = get_field('banner_form')) : ?>
                <div class="col-sm-12 col-lg-4">
                    <div class="contact-form">
                        <?php if (get_field('banner_form_title')) : ?>
                            <div class="content-wrapper"><?php the_field('banner_form_title'); ?></div>
                        <?php endif; ?>
                        <?php echo do_shortcode('[forminator_form id="' . $formID . '"]'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (get_field('about_content')) : ?>
    <section class="home-about" id="about">
        <div class="container" id="schedule">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="full-image-parent">
                        <a href="<?php echo esc_url(get_field('about_video')['url']); ?>" data-caption="" data-fancybox>
                            <img src="<?php echo esc_url(get_field('about_video_thumbnail')['url']); ?>" alt="Video Thumbnail" class="full-image">
                        </a>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="content-wrapper">
                        <?php the_field('about_content'); ?>
                    </div>
                </div>

            </div>
    </section>
<?php endif; ?>

<?php if (have_rows('process_steps')) : ?>
    <section class="home-process" id="process">
        <?php getImage(get_field('process_background_image'), 'full-image bg'); ?>
        <div class="container">
            <?php if (get_field('process_title')) : ?>
                <div class="content-wrapper process-title"><?php the_field('process_title'); ?></div>
            <?php endif; ?>
            <?php if (have_rows('process_steps')) : ?>
                <div class="process-steps">
                    <?php while (have_rows('process_steps')) : the_row(); ?>
                        <div class="process-step">
                            <p><?php the_sub_field('step'); ?></p>
                            <?php if (get_sub_field('step_content')) : ?>
                                <?php $name = nl2br(get_sub_field('step_content')); ?>
                                <p class="step-content"><?php echo $name; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('schedule_content')) : ?>
    <section class="home-schedule" id="schedule">
        <?php getImage(get_field('schedule_background_image'), 'full-image bg'); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content-wrapper">
                        <?php the_field('schedule_content'); ?>

                        <?php if ($link = get_field('schedule_link')) : ?>
                            <a href="<?php echo $link['url']; ?>" class="theme-btn call-link"><?php echo $link['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('testimonials')) : ?>
    <section class="home-testimonials" id="what-they-say">
        <?php getImage(get_field('testimonial_backrground_image'), 'full-image bg'); ?>
        <div class="container">
            <?php if (get_field('gallery_title')) : ?>
                <div class="content-wrapper testimonial-title"><?php the_field('gallery_title'); ?></div>
            <?php endif; ?>


            <?php
            $images = get_field('image_gallery');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($images) : ?>
                <ul>
                    <div class="image-gallery">
                        <?php foreach ($images as $image_id) : ?>
                            <li>
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </li>
                        <?php endforeach; ?>
                    </div>
                </ul>
            <?php endif; ?>

            <div class="swiper" id="testimonialsSwiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('testimonials')) : the_row(); ?>
                        <div class="swiper-slide">
                            <div class="stars">
                                <?php
                                $starRating = get_sub_field('testimonial_starts');
                                for ($i = 0; $i < $starRating; $i++) {
                                    echo '<div class="rating-star"><i class="fa-solid fa-star"></i></div>';
                                }
                                ?>
                            </div>
                            <?php if (get_sub_field('testimonial_content')) : ?>
                                <?php $name = nl2br(get_sub_field('testimonial_content')); ?>
                                <p class="testimonial-content">"<?php echo $name; ?>"</p>
                            <?php endif; ?>
                            <p class="testimonial-name"><?php the_sub_field('testimonial_name'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('faq_title')) : ?>
    <section class="home-faq" id="faq">
        <div class="container">
            <?php if (get_field('faq_title')) : ?>
                <div class="content-wrapper faq-title"><?php the_field('faq_title'); ?></div>
            <?php endif; ?>

            <div class="theme-accordion">
                <?php $accordionIndex = 0; ?>
                <?php while (have_rows('faq')) : the_row(); ?>
                    <?php $accordionIndex++; ?>
                    <div class="accordion" id="accordionExample<?php echo $accordionIndex; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne<?php echo $accordionIndex; ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $accordionIndex; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $accordionIndex; ?>">
                                    <p class="faq-label"><?php the_sub_field('faq_label'); ?></p>
                                </button>
                            </h2>
                            <div id="collapseOne<?php echo $accordionIndex; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $accordionIndex; ?>" data-bs-parent=".theme-accordion">
                                <div class="accordion-body">
                                    <p class="faq-content"><?php the_sub_field('faq_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>