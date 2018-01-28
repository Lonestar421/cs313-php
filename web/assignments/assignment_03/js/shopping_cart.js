function addItem(item) {
  $.post( "add_item.php", { selected: item } );
}
