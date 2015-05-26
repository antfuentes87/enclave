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
		var paddingElementValue = $(paddingElement).css("padding");
		$(insideElement).css("height", outsideElement - paddingElementValue);
	});
}


