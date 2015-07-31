<style type="text/css" rel="stylesheet">
    .search_result_body {
        width: auto;
        overflow: auto;
        height: 620px;
        background: chocolate;
    }

    .search_result_body a {
        text-decoration: none;
        color: #000;
    }

    .main_search_result {
        width: auto;
        height: auto;
        float: left;
        margin-top: 20px;
        margin-left: 20px;
        /*border: solid 1px;*/
    }

    .profile_img {
        width: 80px;
        height: 80px;
        float: left;
        border: none;
    }

    .search_ {
        padding: 20px 0 20px 20px;
        float: left;
        font-size: 20px;
    }
</style>

<div class="search_result_body">
    <?php
    if ($this->result != false) {
        foreach ($this->result as $r) {
            $name = ($r['first_name'] != null) ? $r['first_name'] . " " : "";
            $name .= ($r['middle_name'] != null) ? $r['middle_name'] . " " : "";
            $name .= ($r['last_name'] != null) ? $r['last_name'] . " " : "";

            echo '<a href="#">
                        <div class="main_search_result" onclick="goThisProfile(' . $r['profile_id'] . ')">
                            <div class="profile_img">
                                <img src="' . URL . 'public/images/404.png" width="80" height="80"/>
                            </div>
                            <div class="search_">
                                ' . $name . '
                            </div>
                        </div>
                  </a>
                  <div class="clear"></div>';
        }
    }
    //echo "<pre>";
    ?>
</div>
    