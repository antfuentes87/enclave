function encVerticalCenter(parentClassPath, childClassPath, childContentClassPath){
	$(window).on("load resize scroll",function(e){
		var parentHeight = $(parentClassPath).height();
		var childContentHeight = $(childContentClassPath).height();
		$(childClassPath).css("padding-top", parentHeight / 2);
		$(childContentClassPath).css("margin-top", -childContentHeight / 2);
	});
}
