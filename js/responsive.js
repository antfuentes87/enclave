function encPadding_EvenInner(margin, elementA, elementB, elementC, elementD){
	var marginHalfPx = margin.replace("px", '');
	var marginHalf = Math.floor(marginHalfPx) / 2;
	$(elementA).css("padding-top", 0);
	$(elementA).css("padding-bottom", marginHalf);
	$(elementA).css("padding-left", 0);
	$(elementA).css("padding-right", marginHalf);
	$(elementB).css("padding-top", 0);
	$(elementB).css("padding-bottom", marginHalf);
	$(elementB).css("padding-left", marginHalf);
	$(elementB).css("padding-right", 0);
	$(elementC).css("padding-top", marginHalf);
	$(elementC).css("padding-bottom", 0);
	$(elementC).css("padding-left", 0);
	$(elementC).css("padding-right", marginHalf);
	$(elementD).css("padding-top", marginHalf);
	$(elementD).css("padding-bottom", 0);
	$(elementD).css("padding-left", marginHalf);
	$(elementD).css("padding-right", 0);
}

function encMargin_EvenInner(margin, elementA, elementB, elementC, elementD){
	var marginHalfPx = margin.replace("px", '');
	var marginHalf = Math.floor(marginHalfPx) / 2;
	$(elementA).css("margin-top", 0);
	$(elementA).css("margin-bottom", marginHalf);
	$(elementA).css("margin-left", 0);
	$(elementA).css("margin-right", marginHalf);
	$(elementB).css("margin-top", 0);
	$(elementB).css("margin-bottom", marginHalf);
	$(elementB).css("margin-left", marginHalf);
	$(elementB).css("margin-right", 0);
	$(elementC).css("margin-top", marginHalf);
	$(elementC).css("margin-bottom", 0);
	$(elementC).css("margin-left", 0);
	$(elementC).css("margin-right", marginHalf);
	$(elementD).css("margin-top", marginHalf);
	$(elementD).css("margin-bottom", 0);
	$(elementD).css("margin-left", marginHalf);
	$(elementD).css("margin-right", 0);
}

function encAddClassScrollWindowHeight_Half(startClass, endClass, minusClass){
	var header = $(startClass);
	var minusClassHeight = $(minusClass).height();
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
	var windowHeight = $(window).height();
	var windowHeightDivide = windowHeight / 2;
	var windowHeightMinus = windowHeightDivide - minusClassHeight;
        if (scroll >= windowHeightMinus) {
            header.addClass(endClass);
        } else {
            header.removeClass(endClass);
        }
    });
}

function encFlexFont(elementA, elementB, fontRatio, lineheightRatio){
	var elementAWidth = $(elementA).width();
	$(elementB).css("font-size", elementAWidth / fontRatio);
	$(elementB).css("line-height", elementAWidth / lineheightRatio + 'px');
}

function encFlexPaddingTopBottom(elementA, elementB){
	var elementAHeight = $(elementA).height();
	$(elementB).css("padding-top", elementAHeight / 16);
	$(elementB).css("padding-bottom", elementAHeight / 32);	
}

function encMarginNegativeVerticalCenter(elementA, elementB){
	var elementAHeight = $(elementA).height();
	var elementBHeight = $(elementB).height();
	var elementBMargin = elementAHeight - elementBHeight;
	$(elementB).css("vertical-align", elementBMargin / 4);
}

function encFlexWidthCenter(elementA, elementB, xs, sm, md, lg){
	var elementAWidth = $(elementA).width();
	$(elementB).css("margin", "0 auto");
	$(elementB).css("display", "block");
	if (window.matchMedia("(max-width: 767px)").matches){
		$(elementB).width(elementAWidth / xs);
		console.log(elementAWidth / xs);
	}else if(window.matchMedia("(max-width: 1023px)").matches){
		$(elementB).width(elementAWidth / sm);
	}else if(window.matchMedia("(max-width: 1365px)").matches){
		$(elementB).width(elementAWidth / md);
	}else if(window.matchMedia("(max-width: 1920px)").matches){
		$(elementB).width(elementAWidth / lg);
	}
}

function encVerticalCenter(outerElement, innerElement, innerElementContent){
	var outerElementHeight = $(outerElement).height();
	var innerElementContentHeight = $(innerElementContent).height();
	$(innerElement).css("padding-top", outerElementHeight / 2);
	$(innerElementContent).css("margin-top", -innerElementContentHeight / 2);
}

function encAllWidthsEqualElementA(elementA, elementB){
	var elementAWidth = $(elementA).width();
	$(elementB).width(elementAWidth);
}

function encAllWidthsEqualElementA_Half(elementA, elementB){
	var elementAWidth = $(elementA).width();
	$(elementB).width(elementAWidth / 2);
}

function encAllMinHeightsEqualElementA(elementA, elementB){
	var elementAHeight = $(elementA).height();
	$(elementB).css("min-height", elementAHeight);
}

function encAllMinHeightsEqualElementA_Half(elementA, elementB){
	var elementAHeight = $(elementA).height();
	$(elementB).css("min-height", elementAHeight / 2);
}

function encAllHeightsEqualElementA(elementA, elementB){
	var elementAHeight = $(elementA).height();
	$(elementB).css("height", elementAHeight);
}

function encAllHeightsEqualElementA_Half(elementA, elementB){
	var elementAHeight = $(elementA).height();
	$(elementB).css("height", elementAHeight / 2);
}

function encAllHeightsEqualElementA_Offset(elementA, elementB, elementOffset){
	var elementAHeight = $(elementA).height();
	var elementBHeight = elementAHeight / elementOffset;
	var elementBMarginTop = elementAHeight - elementBHeight;
	$(elementB).height(elementBHeight);
	$(elementB).css("margin-top", elementBMarginTop);
}

function encAllHeightsEqualElementA_MinusPadding(elementA, elementB){
	var elementAHeight = $(elementA).height();
	var elementAPaddingTop = $(elementA).css("padding-top").replace("px", "");
	var elementAPaddingRight = $(elementA).css("padding-right").replace("px", "");
	var elementAPaddingBottom = $(elementA).css("padding-bottom").replace("px", "");
	var elementAPaddingLeft = $(elementA).css("padding-left").replace("px", "");
	var elementAPaddingTop = Math.floor(elementAPaddingTop);
  	var elementAPaddingRight = Math.floor(elementAPaddingRight);
  	var elementAPaddingBottom = Math.floor(elementAPaddingBottom);
  	var elementAPaddingLeft = Math.floor(elementAPaddingLeft);
  
	if(elementAPaddingTop != ""){
		if(elementAPaddingBottom != ""){
			var elementAPadding = elementAPaddingTop + elementAPaddingBottom;	
		}else{
			var elementAPadding = elementAPaddingTop;
		}
	}else if(elementAPaddingBottom != ""){
		if(elementAPaddingTop != ""){
			var elementAPadding = elementAPaddingBottom + elementAPaddingTop;
		}else{
			var elementAPadding = elementAPaddingBottom;
		}
	}else if(elementAPaddingRight != ""){
		var elementAPadding = elementAPaddingRight;
	}else if(elementAPaddingLeft != ""){
		var elementAPadding = elementAPaddingLeft;
	}
  	$(elementB).height(elementAHeight - elementAPadding);
}

function encAllHeightsEqualElementA_MinusMargin(elementA, elementB){
	var elementAHeight = $(elementA).height();
	var elementAMarginTop = $(elementA).css("margin-top").replace("px", "");
	var elementAMarginRight = $(elementA).css("margin-right").replace("px", "");
	var elementAMarginBottom = $(elementA).css("margin-bottom").replace("px", "");
	var elementAMarginLeft = $(elementA).css("margin-left").replace("px", "");
	var elementAMarginTop = Math.floor(elementAMarginTop);
  	var elementAMarginRight = Math.floor(elementAMarginRight);
  	var elementAMarginBottom = Math.floor(elementAMarginBottom);
  	var elementAMarginLeft = Math.floor(elementAMarginLeft);
  
	if(elementAMarginTop != ""){
		if(elementAMarginBottom != ""){
			var elementAMargin = elementAMarginTop + elementAMarginBottom;	
		}else{
			var elementAMargin = elementAMarginTop;
		}
	}else if(elementAMarginBottom != ""){
		if(elementAMarginTop != ""){
			var elementAMargin = elementAMarginBottom + elementAMarginTop;
		}else{
			var elementAMargin = elementAMarginBottom;
		}
	}else if(elementAMarginRight != ""){
		var elementAMargin = elementAMarginRight;
	}else if(elementAMarginLeft != ""){
		var elementAMargin = elementAMarginLeft;
	}
  	$(elementB).height(elementAHeight - elementAMargin);
}

function encEvenPaddingFourElements(padding, elementA, elementB, elementC, elementD){
	var paddingHalfPx = padding.replace("px", '');
	var paddingHalf = Math.floor(paddingHalfPx) / 2;
	$(elementA).css("padding-top", padding);
	$(elementA).css("padding-bottom", paddingHalf);
	$(elementA).css("padding-left", padding);
	$(elementA).css("padding-right", paddingHalf);
	$(elementB).css("padding-top", padding);
	$(elementB).css("padding-bottom", paddingHalf);
	$(elementB).css("padding-left", paddingHalf);
	$(elementB).css("padding-right", padding);
	$(elementC).css("padding-top", paddingHalf);
	$(elementC).css("padding-bottom", padding);
	$(elementC).css("padding-left", padding);
	$(elementC).css("padding-right", paddingHalf);
	$(elementD).css("padding-top", paddingHalf);
	$(elementD).css("padding-bottom", padding);
	$(elementD).css("padding-left", paddingHalf);
	$(elementD).css("padding-right", padding);
}

function encEvenMarginFourElements(margin, elementA, elementB, elementC, elementD){
	var marginHalfPx = margin.replace("px", '');
	var marginHalf = Math.floor(marginHalfPx) / 2;
	$(elementA).css("margin-top", margin);
	$(elementA).css("margin-bottom", marginHalf);
	$(elementA).css("margin-left", margin);
	$(elementA).css("margin-right", marginHalf);
	$(elementB).css("margin-top", margin);
	$(elementB).css("margin-bottom", marginHalf);
	$(elementB).css("margin-left", marginHalf);
	$(elementB).css("margin-right", margin);
	$(elementC).css("margin-top", marginHalf);
	$(elementC).css("margin-bottom", margin);
	$(elementC).css("margin-left", margin);
	$(elementC).css("margin-right", marginHalf);
	$(elementD).css("margin-top", marginHalf);
	$(elementD).css("margin-bottom", margin);
	$(elementD).css("margin-left", marginHalf);
	$(elementD).css("margin-right", margin);
}

function encAllHeightsEqualElement_Tallest(container){
	var currentTallest = 0,
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
