// add functionality here for add button
$('#addTask').click(function(){
    
    var nameInput = $("[name='taskDescription']");
    var data = {'taskDescription': nameInput.val()};
    
    $.ajax({
       type: "POST",
       url: "/todo",
       data: data,
       success: function(data) {
           var data = jQuery.parseJSON(data);
           $("ul.tasks").append('' +
           '<li>' +
           '<span class = "task">' + data.taskDescription + '</span>' +
           '<button id = "'+ data.id +'" class = "done-button">Mark As Done</button>'+
           '</li>'
           );
       },
       error: function(data) {
           alert("Error in adding item to the list");
       }
    });
});

// add functionality to update button

$(document).on('click', 'button.done-button', function(e)){
    var button = this;
    var id = button.id;
    $.ajax({
        type: "PUT",
        url: "/todo/" + id,
        success: function(data)
        {
            var data = jQueyry.parseJSON(data);
            $("#id" + id).removeClass("done-button").addClass("delete-button").html("Delete From The List");
            $("#id" + id).prev().addClass("done");
        },
        error: function(data){
            alert("Error in updating item status in the list");
        }
    });
}

// Delete a task from the To Do list 
$(document).on('click', 'button.delete-button', function(e) {
    var button = this;
    var id = button.id;
    $.ajax({
        type: "DELETE",
        url: "/todo/" + id,
        success: function(data)
        {
            $("#" + id).parent().remove();
        },
        error: function(data)
        {
            alert("ERROR");
        }
    });
});