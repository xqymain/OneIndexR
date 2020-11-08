<?php 
        if ($item["size"] < 10000000) {
                $url = 'https://proxy.srv.pub:8443/-----https://docs.google.com/viewer?url='.urlencode($item['downloadUrl']);
                view::direct($url);
        } else {
                view::direct($item['downloadUrl']);
        }
        exit();
?>
