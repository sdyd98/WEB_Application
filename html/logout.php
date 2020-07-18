<?php
    session_start();
    session_destroy();
    // 이전페이지에 대한 url 정보
    $prevPage = $_SERVER["HTTP_REFERER"];
?>
<meta http-equiv="refresh" content="0; url=<?=$prevPage?>" />
