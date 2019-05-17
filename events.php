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

  $curDate = date(DATE_ISO8601);
  echo "event: ping\n",
       'data: {"time": "' . $curDate . '"}', "\n\n";
  
  while (ob_get_level() > 0) {
    ob_end_flush();
  }
  
  flush();

  if (connection_aborted()) {
    break;
  }
  
  sleep(1);
}

