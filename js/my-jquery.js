$(document).ready(function() {
    $('#search_staff').on('click', function(){
        let id = $('#id').val();
        if(id.length > 0){
            let type = 'personnel';
            let operation = 'find';
            $.post('ajax/crud.php', {id: id, type: type, operation: operation}, function(response){
                let data = JSON.parse(response);
                if(data['message'] == 'success'){
                    $('#personnel_id').val(data['result']['personnel_id']);
                    $('#full_name').val(data['result']['first_name'] + " " + data['result']['surname'] + " " + data['result']['other_names']);
                    $('#directorate').val(data['result']['directorate']);
                    $('#unit').val(data['result']['unit']);
                    $('#email').val(data['result']['email'])
                }else{
                    alert('Staff not found');
                }
            });
        }else{
            alert('Please enter a staff ID or Email');
        }
    });
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