<?php

header("Content-Type: text/event-stream");

$messages = [
  [
    'title' => 'Hello Malte',
    'body' => 'What are you hacking?'
  ],
  [
    'title' => 'Hello Rune',
    'body' => 'What are you trying next?'
  ],
  [
    'title' => 'Hello Timon',
    'body' => 'Radio Ga Ga?'
  ],
];

while (true) {
  $randomMessage = $messages[array_rand($messages)];

  echo 'event: ping' . PHP_EOL . 'data: {"time": "' . date(DATE_ISO8601) . '"}' . PHP_EOL . PHP_EOL;

  echo 'data: {"title": "' . $randomMessage['title'] .', "body": "' . $randomMessage['body'] . '"}' . PHP_EOL . PHP_EOL;
  
  while (ob_get_level() > 0) {
    ob_end_flush();
  }
  
  flush();

  if (connection_aborted()) {
    break;
  }
  
  sleep(1);
}

