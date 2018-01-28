function addItem(item) {
  $.post( "php/add_item.php", { selected: item } );
}

function removeItem(item) {
  $.post( "php/remove_item.php", { selected: item } );
}
