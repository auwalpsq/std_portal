$(document).ready(function() {
    $('.category').on('click', function() {
        //alert('Please select a category');
        let category = $(this).val();
        let type = 'category';
        let operation = 'fetch';
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {type: type, operation: operation, category: category},
            success: function(response){
                $('#directorate').html(response);
            }
        });
    });
    // $('.gender').on('click', function(){
    //     alert($(this).val());
    // });
    $('#faculty').on('change', function() {
        let faculty_id = $(this).val();
        let type = 'department';
        let operation = 'fetch';

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {type: type, operation: operation, faculty_id: faculty_id},
            success: function(response){
                $('#department').html(response);
            }
        });
    });
    $('#directorate').on('change', function() {
        let directorate_id = $(this).val();
        let type = 'unit';
        let operation = 'fetch';

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {type: type, operation: operation, directorate_id: directorate_id},
            success: function(response){
                $('#unit').html(response);
            }
        });
    });
});