

<?php
$servername = "localhost";
$username = "root";
$password = "jefflin123";

$dbname = "rfid_arduino";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



    $start_time = time();

    # 小於 20s 就繼續轉圈圈
    while (time() - $start_time) {
        
        # 檢查是否有更新資料, 檢查對象可以是檔案, mysql, redis 等等
        $data = null;
        if ( /* call function check data */ ) {
            $data = /* newdata */

            # 結束並輸出結果
            exit ($data);
        }

        # 這裡暫停 2s ，避免過於頻繁執行
        sleep(1);
    }

    # 超過時間沒資料而結束
    exit('no data');

?> 