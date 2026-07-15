<?php

$schedules = require 'schedule_data.php';

$data = [];

foreach ($schedules as $group) {
    foreach ($group['events'] as $key => $event) {
        $data[$key] = $event;
    }
}

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=toeic_schedule.ics');

echo "BEGIN:VCALENDAR\r\n";
echo "VERSION:2.0\r\n";
echo "PRODID:-//Akira Mukai//TOEIC Schedule Maker//JA\r\n";
echo "CALSCALE:GREGORIAN\r\n";

$tests = $_POST['tests'] ?? [];
$types = $_POST['types'] ?? [];

foreach ($tests as $test) {
    foreach ($types as $type) {

        if (!isset($data[$test][$type])) {
            continue;
        }

        $date = $data[$test][$type][0];
        $title = $data[$test][$type][1];

        $end_date = date(
            'Ymd',
            strtotime(substr($date,0,4).'-'.substr($date,4,2).'-'.substr($date,6,2).' +1 day')
        );

        $uid = md5($test . $type);
        echo "BEGIN:VEVENT\r\n";
        echo "UID:$uid@tsukuba42195.sakura.ne.jp\r\n";
        echo "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
        echo "DTSTART;VALUE=DATE:$date\r\n";
        echo "DTEND;VALUE=DATE:$end_date\r\n";
        echo "SUMMARY:$title\r\n";
        echo "END:VEVENT\r\n";
    }
}

echo "END:VCALENDAR\r\n";
?>
