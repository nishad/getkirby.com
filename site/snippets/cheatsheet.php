<main class="main" role="main">

  <h1 class="alpha"><?=$page->title()->html() ?></h1>

  <section class="text">
    <h2 class="beta">Table of contents</h2>
    <div class="cheatsheet-grid">
      <?php foreach($page->children()->visible() as $child): ?>
      <div class="cheatsheet-grid-item">
        <h3 class="gamma">
          <a href="#<?= $child->uid() ?>">
            <?= $child->title()->html() ?>
          </a>
        </h3>
      </div>
      <?php endforeach ?>
    </div>
  </section>

  <?php foreach($page->children()->visible() as $child): ?>
  <section class="text" id="<?= $child->uid() ?>">
    <h2 class="beta no-margin-bottom"><?= $child->title()->html() ?></h2>
    <?php if($extendingMode = $child->extendingModeLink()): ?>
      <div class="zeta subtitle"><?= $extendingMode ?></div>
    <?php endif ?>
    <?= $child->text()->kirbytext() ?>

    <div class="cheatsheet-grid">
      <?php foreach($child->inheritedChildren() as $doc): ?>
      <div class="cheatsheet-grid-item">
        <a href="<?= $doc->url($child) ?>">
          <h3 class="gamma">
            <?= $doc->title($child)->html() ?>
            <?= SinceVersion::highlightingBadge($doc->since()) ?>
          </h3>
          <?= $doc->excerpt()->kirbytext() ?>
        </a>
      </div>
      <?php endforeach ?>
    </div>

  </section>
  <?php endforeach ?>

</main>
