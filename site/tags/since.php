<?php

kirbytext::$tags['since'] = array(
  'attr' => [
    'label'
  ],
  'html' => function($tag) {

    $label = empty($tag->attr('label')) ? 'since' : $tag->attr('label');

    if($changelog = page('changelog')->children()->filterBy('title', '*=', $tag->attr('since'))->first()) {
      return '<div class="version-badge"><span>' . $label . ' </span><a href="' . $changelog->url() . '">' . $tag->attr('since') . '</a></div>';
    } else {
      return '<div class="version-badge"><span>' . $label . ' </span>' . $tag->attr('since') . '</div>';
    }


  }
);
