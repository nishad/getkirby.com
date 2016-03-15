<?php

kirbytext::$post[] = function($kirbytext, $value) {

  return preg_replace_callback('!\(toc\)!', function($match) use($value) {

    preg_match_all('!<h2>(.*)</h2>!', $value, $matches);

    $ul = brick('ul');
    $ul->addClass('toc');

    foreach($matches[1] as $match) {

      // remove since version tags
      $match = SinceVersion::removeTag($match);

      $li = brick('li', '<a href="#' . str::slug($match) . '">' . $match . '</a>');
      $ul->append($li);
    }

    return $ul;

  }, $value);

};
