<?php

function dn_links() {
    
    $post_id = get_queried_object_id();
    $p = get_post($post_id);
    $author_id = $p->post_author;
    $avatar = get_avatar($author_id, 200, '', '', array('class' => 'dn-icon'));
    $name = get_the_author_meta('display_name', $author_id);
    $other_name = get_the_author_meta('nickname', $author_id);

    $posts = get_posts([
        'numberposts' => 3,
        'post_status' => 'publish',
        'author' => $author_id
    ]);

    $featured = '';

    foreach($posts as $post) {
        $image = get_the_post_thumbnail_url($post->ID);
        $alt = get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true );
        $post_url = get_permalink($post->ID);

        $featured = $featured .'<a href="'. $post_url .'" class="dn-feat">
            <img class="dn-featimg" src="'. $image .'" alt="'. $alt .'" />
        </a>';
    }

$dn = '<div class="dn-container" id="dn-link">
    <div class="dn-col">
        '. $avatar .'
    </div>
    <div class="dn-col">
        <a href="/?author='. $author_id .'" class="dn-name">
            '. $name .'
        </a>
        <p class="dn-user">
            '. $other_name .'
        </p>
    </div>

    <div id="dn-hover" class="hidden">
        <div class="dn-container dn-hover-container">
            <div class="dn-col">
                '. $avatar .'
            </div>
            <div class="dn-col">
                <a href="/?author='. $author_id .'" class="dn-name">
                    '. $name .'
                </a>
                <p class="dn-user">
                    '. $other_name .'
                </p>
            </div>
        </div>
        <div class="dn-features">
            '. $featured .'
        </div>
        <a class="dn-button" href="/?author='. $author_id .'">
            View Profile
        </a>
    </div>
</div>';

return $dn;
}
add_filter('the_author_display_name', 'dn_links'); ?>