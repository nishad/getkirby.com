// Add section anchors to every <h2> + <h3> within docs

$('.text h2, .text h3').each(function() {
  var anchor = $(this).html();

  // remove since version tags
  anchor = anchor.replace(/(\s<div class="since-badge">(.*?)<\/div>)/ig,'');

  anchor = anchor.replace(/[\-\[\]\/\{\}\(\)\*\+\?\!\.\,\;\=\\\^\$\'\&\%\|]/g, '').replace(/\s/g,'-');
  console.log(anchor);

  $(this).attr('id',anchor.toLowerCase());
});
