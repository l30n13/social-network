<?php

class Home_Model extends Model {
    function __construct() {
        parent::__construct();
    }

    function search() {
        $search = filter_input(INPUT_GET, 'search');
        $query = "SELECT * FROM profile WHERE
                                             `first_name` LIKE '$search%' OR
                                             `middle_name` LIKE '$search%' OR
                                             `last_name` LIKE '$search%';";

        $result = $this->db->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchAll();
    }

    function jquery_search() {
        $search = filter_input(INPUT_GET, 'search');
        $query = "SELECT * FROM profile WHERE
                                             `first_name` LIKE '$search%' OR
                                             `middle_name` LIKE '$search%' OR
                                             `last_name` LIKE '$search%';";

        $result = $this->db->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        while ($s = $result->fetch(PDO::FETCH_ASSOC)) {
            $name = ($s['first_name'] != null) ? $s['first_name'] . " " : "";
            $name .= ($s['middle_name'] != null) ? $s['middle_name'] . " " : "";
            $name .= ($s['last_name'] != null) ? $s['last_name'] . " " : "";

            echo '<a href="#">
                    <div class="result"  onclick="goThisProfile('.$s['profile_id'].')">
                        <div class="img">
                            <img src="<?= URL ?>public/images/404.png" width="60" height="60">
                        </div>
                        <div class="name">'.
                            $name
                        .'</div>
                    </div>
                  </a>';
        }
    }
}