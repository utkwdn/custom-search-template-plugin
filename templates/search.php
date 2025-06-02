<?php
$query_title = do_blocks('<!-- wp:query-title {"type":"search","fontSize":"large"} /-->');
$query_body = do_blocks('<!-- wp:pattern {"slug":"utkwds/query"} /-->');

get_header();
?>

<header class="wp-block-template-part site-header">
	<?php block_header_area(); ?>
</header>

<main class="wp-block-group site-content has-global-padding is-layout-constrained" style="margin-top:0;padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)" id="wp--skip-link--target">
	<div class="wp-block-group is-layout-flow" style="margin-bottom:var(--wp--preset--spacing--small)">
		<?php echo $query_title; ?>
		</div>
	</div>
	<div class="nav nav-tabs tab-content main-tabs-content search-tab" id="myTabContent">
		<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
			<?php get_template_part( 'classic-template-parts/gcse-search', 'gcse-search', array() ) ?>
		</div>
	</div>
</main>

<script>
	const mainSearchField = document.getElementById('site-search-input-tabpanel');
	mainSearchField.value = '<?php echo get_search_query(); ?>';

	const allOfUtkLink = document.getElementById('search-all-utk-link');

	allOfUtkLink.addEventListener('click', function() {
		const triggerEl = document.querySelector('#mainTabs button[data-bs-target="#profile-tab-pane"]');
		bootstrap.Tab.getOrCreateInstance(triggerEl).show();
	});
</script>

<?php
get_footer();
