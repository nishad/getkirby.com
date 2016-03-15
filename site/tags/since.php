<?php

kirbytext::$tags['since'] = array(
  'attr' => [
    'label',
    'tag'
  ],
  'html' => function($tag) {

    $version = $tag->attr('since');
    $label   = empty($tag->attr('label')) ? 'since' : $tag->attr('label');
    $tag     = empty($tag->attr('tag'))   ? 'div'   : $tag->attr('tag');

    $html = '<' . $tag . ' class="since-badge">' . $label . ' ';

    if($changelog = SinceVersion::findChangelog($version)) {
      $html .= '<a href="' . $changelog->url() . '">Kirby ' . $version . '</a>';
    } else {
      $html .= 'Kirby ' . $version;
    }

    $html .= '</' . $tag . '>';

    return $html;

  }
);
