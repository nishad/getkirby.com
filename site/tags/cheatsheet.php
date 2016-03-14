<?php

kirbytext::$tags['cheatsheet'] = array(
  'attr' => array(
    'field'
  ),
  'html' => function($tag) {
    return tpl::load(kirby()->roots()->snippets() . DS . 'cheatsheet' . DS .  $tag->attr('cheatsheet') . '.php', [
      'page'  => $tag->page(),
      'field' => $tag->attr('field')
    ]);
  }
);
