function addItem(item) {
  $.post( "php/add_item.php", { selected: item } );
}
