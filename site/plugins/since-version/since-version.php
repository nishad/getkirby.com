<?php

class SinceVersion {

  public static function fullVersion($v) {
    return $v . str_repeat('.0', 2 - substr_count($v, '.'));
  }

  public static function findChangelog($v) {

    $v         = static::fullVersion($v);
    $changelog = page('changelog')->children()->findBy('version', $v);

    return $changelog ?: false;

  }

  public static function highlightingBadge($field) {

    if($field->isNotEmpty()) {

      $since   = static::fullVersion($field);
      $current = page('changelog')->children()->last()->version();
      $compare = version_compare($current, $since);

      if($compare == 0) {
        return '<div class="since-badge since-badge--new">new</div>';
      } else if($compare < 0) {
        return '<div class="since-badge since-badge--upcoming">upcoming</div>';
      }

    }

  }

  public static function kirbytext($field, $label = 'Introduced in', $tag = 'p') {

    if($field->isNotEmpty()) {
      $kt = '(since: ' . $field . ' label: ' . $label . ' tag: ' . $tag . ')';
      return kirbytext($kt);
    }

  }

  public static function removeTag($string) {
    return preg_replace('!<div class="since-badge">(.*?)</div>!', '', $string);
  }

}
