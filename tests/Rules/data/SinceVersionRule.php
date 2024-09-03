<?php

// ============= //
// Failing usage //
// ============= //

// Method introduced in a point release of the tested major (6.0.3)
$query = new WP_Date_Query( [] );
$query->sanitize_relation( 'AND' );

// Method introduced in a subsequent major (6.1.0)
$cache = new WP_Object_Cache();
$cache->flush_group( 'foo' );

// Method introduced in a subsequent major (6.1.0) surrounded by an uneffective conditional
if ( class_exists( 'WP_Object_Cache' ) ) {
	$cache = new WP_Object_Cache();
	$cache->flush_group( 'foo' );
}

// Function introduced in a subsequent major (6.1.0)
get_template_hierarchy( 'foo' );

// @TODO need static method call tests



// ============= //
// Passing usage //
// ============= //

// Function introduced in a subsequent major (6.1.0) correctly guarded
if ( function_exists( 'get_template_hierarchy' ) ) {
	get_template_hierarchy( 'foo' );
}

// Method introduced in a point release of the tested major (6.0.3) correctly guarded
$query = new WP_Date_Query( [] );
if ( method_exists( $query, 'sanitize_relation' ) ) {
	$query->sanitize_relation( 'AND' );
}

// Method introduced in a point release of the tested major (6.0.3) correctly guarded
if ( method_exists( 'WP_Date_Query', 'sanitize_relation' ) ) {
	$query = new WP_Date_Query( [] );
	$query->sanitize_relation( 'AND' );
}

// Method introduced in a point release of the tested major (6.0.3) with additional code after the guard
$query = new WP_Date_Query( [] );
if ( method_exists( $query, 'sanitize_relation' ) ) {
	do_something_unrelated();

	for ( $i = 0; $i < 10; $i++ ) {
		$query->sanitize_relation( 'AND' );
	}
}

// Method introduced in the tested version (6.0.0)
$locale = new WP_Locale();
$locale->get_list_item_separator();

// Method introduced in a prior major (5.9.0)
$debug = new WP_Debug_Data();
$debug->get_mysql_var( 'foo' );

// Function introduced in a prior major (5.8.0)
get_adjacent_image_link();
