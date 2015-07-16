var ENC = ENC || {};
ENC.height = {
	EqualElementA: function(elementA, elementB){
		elementAHeight = $(elementA).height();
		$(elementB).height(elementAHeight);
	},
	EqualElementA_Divided: function(elementA, elementB, divisionNumber){
		elementAHeight = $(elementA).height();
		equalElementADivided = elementAHeight / divisionNumber;
		$(elementB).height(equalElementADivided);
	},
	EqualElementA_Offset: function(elementA, elementB, elementOffset){
		elementAHeight = $(elementA).height();
		elementBHeight = elementAHeight / elementOffset;
		elementBMarginTop = elementAHeight - elementBHeight;
		$(elementB).height(elementBHeight);
		$(elementB).css("margin-top", elementBMarginTop);
	},
	EqualElement_Tallest: function(container){
		currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
		 $(container).each(function() {
			$el = $(this);
			$($el).height('auto')
			topPostion = $el.position().top;
			if(currentRowStart != topPostion){
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++){
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0;
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			}else{
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}
};
ENC.minHeight = {
	EqualElementA: function(elementA, elementB){
		elementAHeight = $(elementA).height();
		$(elementB).css("min-height", elementAHeight);
	},
	EqualElementA_Divided: function(elementA, elementB, divisionNumber){
		elementAHeight = $(elementA).height();
		equalElementADivided = elementAHeight / divisionNumber;
		$(elementB).css("min-height", equalElementADivided);
	}
};
ENC.width = {
	EqualElementA: function(elementA, elementB){
		elementAWidth = $(elementA).width();
		$(elementB).width(elementAWidth);
	},
	EqualElementA_Divided: function(elementA, elementB, divisionNumber){
		elementAWidth = $(elementA).width();
	$(elementB).width(elementAWidth / divisionNumber);
	}
};
ENC.align = {
	horizontalCenter: function(elementA, elementB, xs, sm, md, lg){
		elementAWidth = $(elementA).width();
		$(elementB).css("margin", "0 auto");
		$(elementB).css("display", "block");
		if (window.matchMedia("(max-width: 767px)").matches){
			$(elementB).width(elementAWidth / xs);
		}else if(window.matchMedia("(max-width: 1023px)").matches){
			$(elementB).width(elementAWidth / sm);
		}else if(window.matchMedia("(max-width: 1365px)").matches){
			$(elementB).width(elementAWidth / md);
		}else if(window.matchMedia("(max-width: 1920px)").matches){
			$(elementB).width(elementAWidth / lg);
		}
	},
	verticalCenter: function(outerElement, innerElement, innerElementContent){
		outerElementHeight = $(outerElement).outerHeight(true);
		innerElementContentHeight = $(innerElementContent).outerHeight(true);
		console.log(innerElementContentHeight + innerElementContent);
		$(innerElement).css("padding-top", outerElementHeight / 2);
		$(innerElementContent).css("margin-top", -innerElementContentHeight / 2);
	}
};
ENC.scroll = {
	windowHeight_Divided: function(elementName, elementClass, minusElementName, divisionNumber){
		element = $(elementName);
		minusElementHeight = $(minusElementName).height();
	    $(window).scroll(function(){
	   		scroll = $(window).scrollTop();
			windowHeight = $(window).height();
			windowHeightDivide = windowHeight / divisionNumber;
			windowHeightMinus = windowHeightDivide - minusElementHeight;
	        if (scroll >= windowHeightMinus){
	            element.addClass(elementClass);
	        } else {
	            element.removeClass(elementClass);
	        }
	    });
	},
	addClass: function(element, elementAddClass, scrollAddClassValue){
		$(window).scroll(function() {    
	    scrollTopValue = $(window).scrollTop();
		    if (scrollTopValue >= scrollAddClassValue) {
		        $(element).addClass(elementAddClass);
		    } else {
		        $(element).removeClass(elementAddClass);
		    }
		});
	}
};
ENC.hover = {
	ClassActiveNotActive: function(element, activeClass, notActiveClass){
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
	},
	ClassActive: function(element, activeClass){
		$(element).hover(
			function () {
				$(this).addClass(activeClass);
			}, 
			function () {
				$(this).removeClass(activeClass);
			}
		)
	},
	AddClassRemoveClass: function(elementA, elementB, activeClass, nonActiveClass){
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
};