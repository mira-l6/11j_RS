$(document).on('click', '#delTaskBtn', function(){
    var id = $(this).attr('data-val');
    // alert(id);
    var action = dltRecord;

    $.ajax({
        url: "todo-list.php",
        type: "POST",
        data: {action: action, id: id},
        success: function(data){
            alert(data);
        }
    });
})