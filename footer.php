<footer>
		<p>This is my footer</p>
		<h4>Lista svih kategorija</h4>
		<?php wp_list_categories(array('orderby'=>'count', 'order'=>'DESC', 'show_count'=>1, 'number'=>5, 'title_li'=>'')); ?>
	</footer>
	
	<?php wp_footer(); ?>
	
	</body>
</html> 