<!--<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
	<select name="category" id="category">
		<option value="voce" selected>Voce</option>
		<option value="povrce">Povrce</option>
		<option value="ukrasno">Ukrasno</option>
		<option value="plodonosno">Plodonosno</option>
	</select>
</form>-->

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="form-control" placeholder="Search …" value="" name="s">
				</label>
				<select name="category" id="category">
				<option value="" default>Choose category</option>
		<option value="voce">Voce</option>
		<option value="povrce">Povrce</option>
		<option value="ukrasno">Ukrasno</option>
		<option value="plodonosno">Plodonosno</option>
	</select>
	<input type="submit" class="search-submit" value="Search">
</form>