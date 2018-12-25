$(document).ready(function () {

    listPermissions($('#group-id').val())

    $(document).on('change', '.permission',  function () {
        const permission = $(this).attr('permission');
        const groupId = $('.group-permissions').val();

        let action;
        if (this.checked)
            action = "allow";
        else
            action = "deny";

        updatePermission(groupId, permission, action);

    });

    $('#group-id').on('change', function () {
        listPermissions($(this).val())
    })
});


function updatePermission(groupId, permission, action) {
    $.ajax({
        url: 'permissions/edit/' + groupId + '/' + permission.replace('/', '-') + '/' + action,
        type: 'POST',
        dataType: 'html',
        beforeSend: function (xhr) { // Add this line
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function (data, textStatus, jqXHR) {
            console.log(textStatus);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
        }
    });
}

function listPermissions(groupId) {
    $.ajax({
        url: 'permissions/index/' + groupId,
        type: 'GET',
        dataType: 'html',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());

            $('#permission-content').html('<span class="content-loading"><i class="fa fa-refresh fa-spin"></i></span>');
        },
        success: function (data, textStatus, jqXHR) {
            $('#permission-content').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}
