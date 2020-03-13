$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// A $( document ).ready() block.
$(document).ready(function () {
    $(document).on('click', '#updateRoutes', function () {
        /**
         * get All allowed modules
         */
        var moduleIds = [];
        $.each($("input[name='moduleIds']:checked"), function () {
            moduleIds.push($(this).val());
        });

        /**
         * get All allowed routes
         */
        var routeIds = [];
        $.each($("input[name='routeIds']:checked"), function () {
            routeIds.push($(this).val());
        });

        let urlPath = 'permission/restrict';
        $.ajax({
            method: 'POST',
            url: APP_URL + urlPath,
            data: {
                user_id: USER_ID,
                restricted_modules: JSON.stringify(moduleIds),
                restricted_routes: JSON.stringify(routeIds)
            },
            success: function (data) {
                if (data.success) {
                    Swal.fire(
                        'Saved!',
                        'You have successfully changed the user permission.',
                        'success'
                    )
                }
            }
        });
    });

    $(".moduleCheckBox").click(function () {
        $(`.route_${$(this).attr('id')}`).prop('checked', $(this).prop('checked'));
    });
});
