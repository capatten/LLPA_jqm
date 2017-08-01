var $toggleOptions = $(".fa-ellipsis-v");
var $menuOptions = $(".menuOptions");

$toggleOptions.on('click', function(e){
	e.stopPropagation();
	toggleOptionsDropDown(e);
});

$(document).click(function(){
 	$menuOptions.hide();
	$menuOptions.removeClass('optionsActive');
});

/************ FUNCTIONS ************/
var toggleOptionsDropDown = function(){
	if($menuOptions.hasClass('optionsActive')){
		$menuOptions.hide();
		$menuOptions.removeClass('optionsActive');
	}else{
		$menuOptions.show();
		$menuOptions.addClass('optionsActive');
	}
}