jQuery(document).ready(function(){
  jQuery("figure a").colorbox({rel:'figure a',transition:"fade",current:'{current}/{total}',previous:'&laquo;',next:'&raquo;',close:'x',maxWidth:'99%'});
  jQuery("p.attachment a").colorbox({maxWidth:'99%'});
});