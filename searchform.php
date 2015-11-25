<div class="search-box">
	<form method="get" action="<?php echo home_url(); ?>/">
		<input type="text" size="15" class="search-field" name="s" id="s" value="<?php _e('To search type and hit enter', 'm1studio')?>" onfocus="if(this.value == '<?php _e('To search type and hit enter', 'm1studio') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('To search type and hit enter', 'm1studio') ?>';}"/>
	</form>
</div>