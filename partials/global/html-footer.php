	<ul class="accessibility-links">
		<li><a href="#top">Skip to top</a></li>
	</ul>

	<!-- Postload Javascript --> 
	<script type="text/javascript">
		WebFontConfig = {
			google: { 
				families: [ 'Roboto:400,400italic,700,700italic:latin', 'Lora:400,400italic:latin' ] 
			},
			custom: { 
				families: [ 'Icons' ], 
				testStrings: {
					'Icons': '\uE036' 
				}
			}
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/vendor.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/scripts.js"></script>

</body>
</html>