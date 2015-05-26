function encVerticalCenter(parentClassPath, childClassPath, childContentClassPath){
	$(window).on("load resize scroll",function(e){
		var parentHeight = $(parentClassPath).height();
		var childContentHeight = $(childContentClassPath).height();
		$(childClassPath).css("padding-top", parentHeight / 2);
		$(childContentClassPath).css("margin-top", -childContentHeight / 2);
	});
}

function encSetSameHeight(classPathA, classPathB){
	$(window).on("load resize scroll",function(e){
		var classHeightB = $(classPathA).height();
		$(classPathB).css("height", classHeightB);
	});
}

function encSetHalfHeight(classPathA, classPathB){
	$(window).on("load resize scroll",function(e){
		var classHeightB = $(classPathA).height();
		$(classPathB).css("height", classHeightB / 2);
	});
}

function encParallellHeight(elementA, elementB, elementRatio){
	$(window).on("load resize scroll",function(e){
		var elementAHeight = $(elementA).height();
		var elementBHeight = elementAHeight / elementRatio;
		var elementBMarginTop = elementAHeight - elementBHeight;
		$(elementB).css("height", elementBHeight);
		$(elementB).css("margin-top", elementBMarginTop);
	});
}

function encSetHeightMinusPadding(outsideElement, paddingElement, insideElement){
	$(window).on("load resize scroll",function(e){
		var paddingElementValue = $(paddingElement).css("padding").replace("px", "");
		var outsideElementHeight = $(outsideElement).height();
		$(insideElement).css("height", outsideElementHeight - paddingElementValue);
	});
}

function encEvenMargin(margin, elementA, elementB, elementC, elementD){
	$(window).on("load resize scroll",function(e){
	
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
	});
}

function encSetSameHeightMinusMargin(elementA, elementB){
	$(window).on("load resize scroll",function(e){
		var elementAHeight = $(elementA).height();
		
		var elementBMarginLeft = $(elementB).css("margin-left").replace("px", '');
		var elementBMarginBottom = $(elementB).css("margin-bottom").replace("px", '');
		
		var elementBMarginLeftNumber = Math.floor(elementBMarginLeft);
		var elementBMarginBottomNumber = Math.floor(elementBMarginBottom);
		
		var elementBTotalMargin = elementBMarginLeftNumber + elementBMarginBottomNumber;

		$(elementB).css("height", elementAHeight - elementBTotalMargin);
	});
}
