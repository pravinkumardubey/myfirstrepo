function deleteRoleModule(id) {
    $.ajax({
        url: 'delete-role-module/' + id,
        type: 'get',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            // console.log(data);
        }
    });
}