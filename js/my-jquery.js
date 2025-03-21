$(document).ready(function() {
    $('.category').on('click', function() {
        let category = $(this).val();
        if(category == 'academic'){
            $('.div-academic').show();
            $('.div-nonacademic').hide();
        }else if(category == 'nonacademic'){
            $('.div-nonacademic').show();
            $('.div-academic').hide();
        }
    });
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