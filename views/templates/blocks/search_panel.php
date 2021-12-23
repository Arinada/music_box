<div class="container" id="search_id">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button id="btn_filter_by" type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a>Contain</a></li>
                        <li><a>Equal</a></li>
                        <li><a>Start with</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="text" class="form-control" name="search_by" id="search_by" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="ShowSearchedSongsOnPage(1)" type="button"><span
                                class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div>