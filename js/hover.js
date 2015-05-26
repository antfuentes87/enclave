function encHover($elementCSSPath, $activeClass, $nonActiveClass) {
   $(function(){
		$($elementCSSPath).click(function() {
			$(this).addClass($activeClass);
		},
		function(){
			$(this).removeClass($activeClass);
		});
		$($elementCSSPath).click(function() {
			var fullPath = $elementCSSPath + ':not(.' + $activeClass + ')';
			$(fullPath).addClass($nonActiveClass);
		},
		function(){
			var fullPath = $elementCSSPath + ':not(.' + $activeClass + ')';
			$(fullPath).removeClass($nonActiveClass);
		});
	});
}

function encHoverAddClass(element, activeClass) {
	$(window).on("load resize scroll",function(e){
		$(element).hover(
			function () {
				$(this).addClass(activeClass);
			}, 
			function () {
				$(this).removeClass(activeClass);
			}
		)
	});
}
