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
		);
	});
}

function encHoverAddClassSub(elementA, elementB, activeClass, nonActiveClass) {
	$(window).on("load resize scroll",function(e){
		$(elementB).addClass(nonActiveClass);
		$(elementA).hover(
			function () {
				$(elementB).removeClass(nonActiveClass);
				$(elementB).addClass(activeClass);
			}, 
			function () {
				$(elementB).removeClass(activeClass);
				$(elementB).addClass(nonActiveClass);
			}
		);
	});
}
