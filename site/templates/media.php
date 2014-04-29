<?php snippet('header') ?>

<main class="main columns download-single media" role="main">
  <h1 class="alpha"><?php echo $page->title() ?></h1>

  <article class="column four">
    <p class="gamma subtitle"><?php echo $page->subtitle() ?></p>
    <?php $image = $page->images()->nth(1) ?>
    <figure><img src="<?php echo $image->url() ?>" alt="<?php echo $page->title() ?>" /></figure>
  </article>

  <aside class="column two last download-meta">
    <h2 class="gamma">Grab it!</h2>
    <ul>
      <li><a href="<?php echo $page->link() ?>">Download [<?php echo $image->niceSize() ?>]</a></li>
    </ul>
  </aside>

</main>

<?php snippet('footer') ?>