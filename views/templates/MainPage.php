<!DOCTYPE html>
<html lang="en">
<head>
    <title>MusicBox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../../js/search_panel.js"></script>
    <link rel="stylesheet" href="../css/main_page/styles.css">

    <script src="../../js/search_panel.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <div class="text-right" id="shift-right">
        <?php
        if ($authorized):
            include_once VIEW_DIR_PATH . '/blocks/view_song_element.php';
        else:
            include_once VIEW_DIR_PATH . '/blocks/profile_buttons.php';
        endif; ?>
    </div>
    <h1>MusicBox</h1>
    <p>Listen to high quality music on MusicBox!</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Share your own records with users</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Listen <a class="nav-link" href="#">Popular playlists</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Make your playlist</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>
</div>
<!-- search panel-->
<!------ Include the above in your HEAD tag ---------->
<div class="container" id="search_id">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#contains">Contains</a></li>
                        <li><a href="#its_equal">It's equal</a></li>
                        <li><a href="#greather_than">Start with</a></li>
                        <li><a href="#less_than">Less than < </a></li>
                        <li class="divider"></li>
                        <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="text" class="form-control" name="search_by" id="search_by" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="showSearchValue()" type="button"><span
                                class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
    <?php
    include_once VIEW_DIR_PATH . '/blocks/audio_record.html'
    ?>
</div>

</body>
</html>
