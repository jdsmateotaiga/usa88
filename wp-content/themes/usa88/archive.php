<?php
get_header();
echo '<section>';
$parent_category = get_queried_object();
echo '<h2>Parent Category</h2>';
echo '<pre>';
print_r($parent_category);
echo '</pre>';
$child_categories = get_terms( $parent_category->taxonomy, array(
      'parent'    => $parent_category->term_id,
      'hide_empty' => false
));

if($child_categories) {
echo '<h2>Child Categories</h2>';
foreach($child_categories as $item) {
  echo '<a style="color: blue;" href="'.get_category_link($item->term_id).'">'.$item->name.'</a><br>';
}
echo '<pre>';
print_r($child_categories);
echo '</pre>';
} else {
  echo '<h2>Display all Products of ' .$parent_category->name. '!</h2>';
}
echo '</section>';
get_footer();
?>
