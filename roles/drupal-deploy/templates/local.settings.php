<?php

// Database configuration
$databases['default']['default'] = array(
  'driver' => 'mysql',
  'database' => '{{ user }}',
  'username' => '{{ user }}',
  'password' => '{{ lookup("file", "fetched/passwords/" + user) }}',
  'host' => 'localhost',
);

// Drush alias for localhost
$site_aliases['local'] = array(
  'name' => 'example',
  'dir' => '/home/{{ user }}/git/www',
  'url' => 'localhost',
);

if (isset($conf)) {

  $conf = array(
    'environment_indicator_overwritten_color' => "{{ environments[user].color }}",
    'environment_indicator_overwrite' => "1",
    'environment_indicator_overwritten_position' => "top",
    'environment_indicator_overwritten_name' => "{{ environments[user].name | upper }}",
  ) + $conf;

  //$conf['page_compression'] = 0;
  //$conf['preprocess_css'] = 0;
  //$conf['preprocess_js'] = 0;
  //$conf['error_level'] = 2;
}

//$base_url = 'http://localhost'; // No trailing slashes

// Check if redis is active and installed by checking
// if $conf['redis_client_host'] exists.
if (!array_key_exists('redis_client_host', $conf)) {

  $exclude_cache_paths = array(
    //'admin/structure/features',
  );

  if (!in_array($_GET['q'], $exclude_cache_paths)) {
    $conf['redis_client_host'] = '127.0.0.1';
    $conf['redis_client_port'] = 6379;
    $conf['redis_client_base'] = {{ environments[user].redis_db }};
    $conf['lock_inc'] = 'sites/all/modules/redis/redis.lock.inc';
    $conf['path_inc'] = 'sites/all/modules/redis/redis.path.inc';
    $conf['path_alias_admin_blacklist'] = TRUE;
    $conf['cache_backends'][] = 'sites/all/modules/redis/redis.autoload.inc';
    $conf['cache_default_class'] = 'Redis_Cache';
  }
}