<?php

function lp_store_display() {
	if ( isset( $_POST['search'] ) ) {
		//echo 1; exit;
		$search = urlencode( $_POST['search'] );
		$url = LANDINGPAGES_STORE_URL."?type=templates&s=".$search;
?>

		<div style='text-align:right;margin:10px;'>
			<form action="edit.php?post_type=landing-page&page=lp_store" method="POST" id="">
				<input type="search" autofocus="autofocus"  name="search" value="<?php echo $_POST['search']; ?>">
				<label for="plugin-search-input" class="screen-reader-text">Search Templates</label>
				<input type="submit" value="Search Templates" class="button" id="plugin-search-input" name="plugin-search-input">
			</form>
		</div>
		<?php
	}
	else {
		$url = LANDINGPAGES_STORE_URL;
	}
?>
	<?php global $current_user;
	get_currentuserinfo();
	$username = "?username=" . urlencode( $current_user->user_login );
	$user_email = "&email="  . urlencode( $current_user->user_email );
	$first_name = "&first-name=" . urlencode( $current_user->user_firstname );
	$last_name = "&last-name=" . urlencode( $current_user->user_lastname ); ?>
	<script type='text/javascript'>
		jQuery(document).ready(function($) {

			new easyXDM.Socket({
				remote: "<?php echo $url . $username . $user_email . $first_name . $last_name; ?>",
				container: document.getElementById("lp-store-iframe-container"),
				onMessage: function(message, origin){
					var height = Number(message) + 1000;
					this.container.getElementsByTagName("iframe")[0].scrolling="no";
					this.container.getElementsByTagName("iframe")[0].style.height = height + "px";
				}
			});

		});
	</script>

	<div id="lp-store-iframe-container">
    </div>

	<?php
}
?>
