<?php get_header(); 

$author_id = $_GET['author'];
$avatar = get_avatar($author_id, 200, '', '', array('class' => 'dn-big-icon'));
$name = get_the_author_meta('display_name', $author_id);
$other_name = get_the_author_meta('nickname', $author_id);
$email = get_the_author_meta('user_email', $author_id);
$bio = get_the_author_meta('description', $author_id);

$posts = get_posts([
    'post_status' => 'publish',
    'orderby' => 'rand',
    'author' => $author_id
]);

?>

<div id="dn-profile">
    <div class="dn-col">
        <?php echo $avatar; ?>
    </div>
    <div class="dn-info dn-col">
        <h2><?= $name ?></h2>
        <h3><?= $other_name ?></h2>
        <p><?= $bio ?></p>
        <a href="mailto:<?= $email ?>">Contact me</a>
    </div>
</div>

<div class="pin-container">

<?php

foreach($posts as $post) {

    $id = $post->ID;
    $image = get_the_post_thumbnail_url($id);
    $alt = get_post_meta( get_post_thumbnail_id($id), '_wp_attachment_image_alt', true );
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_avatar = get_avatar_url($author_id);
    $post_url = get_permalink($id);

    ?>

    <div class="pin-box">
        <a href="<?= $post_url ?>"></a>
        <img src="<?= $image ?>" alt="<?= $alt ?>">
        <div class="pin-caption">
            <img src="<?= $author_avatar ?>">
            <div><?= $author_name ?></div>
        </div>  
    </div>

    <?php } ?>

</div>

<?php get_footer(); ?>