<!-- NE PAS EFFACER -->
<?php
foreach (gd_info() as $key => $value)
  echo "$key: <b>$value</b><br />";


?>

<?php
phpinfo();
?>

<!-- À EFFACER -->


'georgia' => array(
'name' => 'Calibri',
'import' => '',
'css' => "font-family: Calibri, sans-serif;"
)
);
return apply_filters('my_available_fonts', $fonts);