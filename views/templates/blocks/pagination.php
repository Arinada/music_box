<div style="text-align: center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($pageNum = 1; $pageNum <= $pageCount; $pageNum++)
                echo "<li class=\"page-item\"><a onclick=\"$handler($pageNum)\" id='page_num' class=\"page-link\" href=\"#$pageNum\">$pageNum</a></li>";
            ?>
        </ul>
    </nav>
</div>