/*************** GLOBAL VARIABLES ***************/
var $addDepartmentBtn = $("#add_department_btn");
var $sendToText = $(".send-to-text");
var $departmentChckbx = $(".department-chckbx");
var $selectedDepartments = $("#selected_departments");

/*************** END GLOBAL VARIABLES ***************/
$addDepartmentBtn.on('click', function(){
	$( "#department_list" ).popup( "open" );
});

$departmentChckbx.on('click', function(){
    createDepartmentTextString();
});

/************************** PRIVATE FUNCTIONS *************************/
var createDepartmentTextString = function(){
	var textString = '';
	var departmentsString = ''

    $departmentChckbx.each(function(){
    	if($(this).prop('checked')) {
            textString = textString + $(this).data('department-desc') + ',';
            departmentsString = departmentsString + $(this).data('department-id') + ','
        }
	});
    $sendToText.html('<i><strong>To: </strong>' + textString.slice(0,-1) + '</i>');
    $selectedDepartments.val(departmentsString.slice(0,-1));
};
