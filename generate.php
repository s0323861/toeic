<?php

$data = [

"20260712" => [
    "exam" => ["20260712","TOEIC受験日"],
    "start" => ["20260507","TOEIC申込開始"],
    "end" => ["20260603","TOEIC申込締切"],
    "score" => ["20260730","TOEICデジタル公式認定証発行"]
],

"20260823" => [
    "exam" => ["20260823","TOEIC受験日"],
    "start" => ["20260521","TOEIC申込開始"],
    "end" => ["20260713","TOEIC申込締切"],
    "score" => ["20260910","TOEICデジタル公式認定証発行"]
],

"20260905" => [
    "exam" => ["20260905","TOEIC受験日"],
    "start" => ["20260604","TOEIC申込開始"],
    "end" => ["20260729","TOEIC申込締切"],
    "score" => ["20260925","TOEICデジタル公式認定証発行"]
],

"20260927" => [
    "exam" => ["20260927","TOEIC受験日"],
    "start" => ["20260714","TOEIC申込開始"],
    "end" => ["20260814","TOEIC申込締切"],
    "score" => ["20261015","TOEICデジタル公式認定証発行"]
],

"20261025" => [
    "exam" => ["20261025","TOEIC受験日"],
    "start" => ["20260729","TOEIC申込開始"],
    "end" => ["20260910","TOEIC申込締切"],
    "score" => ["20261112","TOEICデジタル公式認定証発行"]
],

"20261115" => [
    "exam" => ["20261115","TOEIC受験日"],
    "start" => ["20260817","TOEIC申込開始"],
    "end" => ["20261005","TOEIC申込締切"],
    "score" => ["20261204","TOEICデジタル公式認定証発行"]
],

"20261206" => [
    "exam" => ["20261206","TOEIC受験日"],
    "start" => ["20260911","TOEIC申込開始"],
    "end" => ["20261026","TOEIC申込締切"],
    "score" => ["20261223","TOEICデジタル公式認定証発行"]
],

"20261219" => [
    "exam" => ["20261219","TOEIC受験日"],
    "start" => ["20261006","TOEIC申込開始"],
    "end" => ["20261111","TOEIC申込締切"],
    "score" => ["20270108","TOEICデジタル公式認定証発行"]
]

];

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=toeic_schedule.ics');

echo "BEGIN:VCALENDAR\r\n";
echo "VERSION:2.0\r\n";

foreach ($_POST['tests'] as $test) {

    foreach ($_POST['types'] as $type) {

        $date = $data[$test][$type][0];
        $title = $data[$test][$type][1];

        echo "BEGIN:VEVENT\r\n";
        echo "DTSTART;VALUE=DATE:$date\r\n";
        echo "DTEND;VALUE=DATE:$date\r\n";
        echo "SUMMARY:$title\r\n";
        echo "END:VEVENT\r\n";
    }
}

echo "END:VCALENDAR\r\n";
?>