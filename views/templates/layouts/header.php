<div class="jumbotron text-center">
    <div class="text-right" id="shift-right">
        <?php
        if ($authorized):
            include_once VIEW_DIR_PATH . '/templates/blocks/view_song_element.php';
        else:
            include_once VIEW_DIR_PATH . '/templates/blocks/profile_buttons.php';
        endif; ?>
    </div>
    <h1>MusicBox</h1>
    <p>Listen to high quality music on MusicBox!</p>
</div>
