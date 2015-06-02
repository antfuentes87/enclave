function encHoverClassActiveNotActive(element, activeClass, notActiveClass) {
   $(function(){
		$(element).hover(function() {
			$(this).addClass(activeClass);
		},
		function(){
			$(this).removeClass(activeClass);
		});
		$(element).hover(function() {
			var elementNot = element + ':not(.' + activeClass + ')';
			$(elementNot).addClass(notActiveClass);
		},
		function(){
			var elementNot = element + ':not(.' + activeClass + ')';
			$(elementNot).removeClass(notActiveClass);
		});
	});
}

function encHoverClassActive(element, activeClass) {
	$(element).hover(
		function () {
			$(this).addClass(activeClass);
		}, 
		function () {
			$(this).removeClass(activeClass);
		}
	);
}

function encHoverAddClassRemoveClass(elementA, elementB, activeClass, nonActiveClass) {
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
}
