<?php

function show_levels() {
  date_default_timezone_set('America/New_York');
  $host = '127.0.0.1';
  $db   = 'ncriverl_custom';
  $user = 'ncriverl_custom';
  $pass = 'ch33s3';
  $charset = 'utf8';
    
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  $pdo = new PDO($dsn, $user, $pass, $opt); 

  $results = $pdo->query('
    SELECT
      t.id,
      t.name,
      t.usgs_id,
      t.cfs_flood,
      t.cfs_high,
      t.cfs_low,
      t.last_checked,
      l.height,
      l.cfs,
      l.time
    FROM tracked_gages t
    INNER JOIN level_data l
      ON l.usgs_id = t.usgs_id
      AND t.last_checked = l.time
    ORDER BY
      t.name
  ');

  $records = $results->fetchAll();  

  foreach ($records as $record) {
    $container_class = '';
    if ($record['cfs_flood'] && $record['cfs'] >= ($record['cfs_flood'] - 1000)) {
      $class = 'danger';
      $description = 'WARNING: River is near or at flood stage and represents a significant risk of injury or death.';
      $container_class = 'flood';
    }
    elseif ($record['cfs_high'] && $record['cfs'] >= $record['cfs_high']) {
      $class = 'danger';
      $description = 'Above recommended for recreational craft.';
    }
    elseif ($record['cfs_high'] && $record['cfs'] >= ($record['cfs_high'] - 500)) {
      $class = 'warn';
      $description = 'High runnable, caution advised.';
    }
    elseif ($record['cfs'] < $record['cfs_low']) {
      $class = 'low';
      $description = 'Too low.';
    }
    else {
      $class = 'ok';
      $description = 'Runnable.';
    }
    $output .= '
      <div class="individual-detail ' . $container_class . '">
        <h2>' . $record['name'] . '</h2><div class="level ' . $class . '"><img src="/img/level-icons.jpg"></img></div>
        <div class="description">
          <p class="level-text">Currently  ' . $record['height'] . ' Feet (' . $record['cfs'] . 'cfs)  <br />Last updated ' . date('g:ia m/d/Y', $record['time']) . '</p>
          <p>' . $description . ' </p>
        </div>
      </div>
    ';
  }
  return $output;  
}

?>
