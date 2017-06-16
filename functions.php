<?php

function prohibit_author_comment( $approved, $commentdata ) {

  $post_id = $commentdata['comment_post_ID']; // get the post ID.
  $author_id = get_post_field( 'post_author', $post_id ); // Get the author ID. 

	if( $commentdata['user_ID'] == $author_id ) {
		return 'trash'; // skip everything, comment goes straight to trash or '0' or 'spam'.

	}

	return $approved; // This is the approval status set on WP Dashboard.
}

add_filter( 'pre_comment_approved' , 'prohibit_author_comment' , '99', 2 );

?>
