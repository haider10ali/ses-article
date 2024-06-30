<h2>Add Recent media coverage highlights</h2>
<?php settings_errors('ses'); ?>
<div class="ses__form">
    <form action="" method="POST">
        <?php wp_nonce_field('nonce_action_recent_media_courage', 'nonce_field_recent_media_courage'); ?>

        <div class="articles__custom__fields" style="width: calc(100% - 20px);">
            
            <input type="text" name="siteTitle" id="siteTitle" placeholder="Site Title">

            <input type="text" name="mediaTitle" id="mediaTitle" placeholder="Recent Media Title">

            <input type="url" name="mediaUrl" id="mediaUrl" placeholder="Recent Media Url">

            <input type="submit" value="Add Media" name="addMedia" class="button button-primary" style="width: 10% !important;">
        </div>
    </form>
</div>