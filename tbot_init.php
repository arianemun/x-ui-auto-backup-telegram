<?php
require_once("PersianCalendar.php");

function Bot($method, $data = [])
{
    $url = 'https://api.telegram.org/botTOKEN' . $method;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($ch);
    curl_close($ch);
    if (curl_error($ch)) {
        return curl_error($ch);
    } else {
        return $res;
    }
}

function sendDocument($chat_id, $document, $caption = null, $parse = 'HTML')
{

    return Bot('sendDocument', [
        'chat_id' => $chat_id,
        'document' => $document,
        'caption' => $caption,
        'parse_mode' => $parse,
    ]);
}

$serverInfo = [
    "ipAddress" => "192.168.1.1",
    "severName" => "#Sx1"
];

sendDocument(CHATID, new CURLFile('/etc/x-ui/x-ui.db'), '
📡 <b>Server Name:</b> <b> ' . $serverInfo['severName'] . '</b>
🌐 <b>IP Address:</b> <code> ' . $serverInfo['ipAddress'] . '</code>
⏰ <b>Time:</b> <code> ' . mds_date("i:H", "now", 0) . '</code>
🗓 <b>Date:</b> <code> ' . mds_date("Y/m/d", "now", 0) . '</code>
');
sendDocument(CHATID, new CURLFile('/usr/local/x-ui/bin/config.json'), '
📡 <b>Server Name:</b> <b> ' . $serverInfo['severName'] . '</b>
🌐 <b>IP Address:</b> <code> ' . $serverInfo['ipAddress'] . '</code>
⏰ <b>Time:</b> <code> ' . mds_date("i:H", "now", 0) . '</code>
🗓 <b>Date:</b> <code> ' . mds_date("Y/m/d", "now", 0) . '</code>
');