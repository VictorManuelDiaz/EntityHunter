$(document).ready(function () {
    $('#url-form').on('submit', function (event) {
        event.preventDefault();

        var url = $('#url-input').val();


        $('#result').html('<p>Loading...</p>');

        
        $.ajax({
            url: '/api/hunt-entities',
            type: 'POST',
            data: {
                url: url
            },
            success: function (response) {
                displayEntities(response);
            },
            error: function (xhr, status, error) {
                $('#result').html('<tr><td colspan="3"><p class="text-danger">An error occurred. Please try again.</p></td></tr>');
            }
        });
    });

    function displayEntities(data) {
        var html = '';
        $.each(data, function (index, entity) {
            html += '<tr><td>' + entity.name + '</td><td>' + entity.type + '</td><td>' + entity.salience + '</td></tr>';
        });
        $('#result').html(html);
    }
});
