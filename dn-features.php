<?php

function dn_features() {

    // Active when viewing single.php
    // Action hook
    // Display at the bottom of the page
    // Heading "Related"
    // Other posts with the same tags
    // Links to those posts

    if (is_single()) {

    ?>
    <div class="related-box container">
        <h4>Related Posts</h4>
        <div class="pin-container">
    <?php

    $main_post = get_post();
    $tags = get_the_tags($main_post->ID);
    $tag_list = "";
    foreach($tags as $tag) {
        $tag_list = $tag_list . $tag->name . ",";
    }
    $tag_list = substr($tag_list, 0, strlen($tag_list) - 1);

    foreach(get_posts([
        'numberposts' => 8,
        'post_status' => 'publish',
        'orderby' => 'rand',
        'tag' => $tag_list
    ]) as $post) {

        $id = $post->ID;
        $author_id = $post->post_author;
        $image = get_the_post_thumbnail_url($id);
        $alt = get_post_meta( get_post_thumbnail_id($id), '_wp_attachment_image_alt', true );
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_avatar = get_avatar_url($author_id);
        $post_url = get_permalink($id);

    ?>

    <div class="pin-box">
        <a href="<?= $post_url ?>"></a>
        <img src="<?= $image ?>">
        <div class="pin-caption">
            <img src="<?= $author_avatar ?>" alt="<?= $alt ?>">
            <div><?= $author_name ?></div>
        </div>  
    </div>

    <?php } ?>
            
        </div>
    </div>

<?php } }

add_action('get_footer', 'dn_features');