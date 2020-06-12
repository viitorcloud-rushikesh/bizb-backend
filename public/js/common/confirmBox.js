let toast = Swal.mixin({
    buttonsStyling: false,
    customClass: {
        confirmButton: 'btn btn-alt-success m-5',
        cancelButton: 'btn btn-alt-danger m-5',
        input: 'form-control'
    }
});

// Init an example confirm alert on button click
$('body').on('click', '.js-swal-confirm', function() {
    let routeUrl = $(this).attr('data-href');
    let entity = $(this).attr('data-entity');
    if(typeof entity == 'undefined') {
        entity = 'item';
    }
    toast.fire({
        title: 'Are you sure?',
        text: 'If you delete this ' + entity + ', it will also delete all its related content.',
        type: 'warning',
        showCancelButton: true,
        customClass: {
            confirmButton: 'btn btn-alt-danger m-1',
            cancelButton: 'btn btn-alt-secondary m-1'
        },
        confirmButtonText: 'Yes, delete it!',
        html: false,
        preConfirm: e => {
            return new Promise(resolve => {
                $('#deleteItem').attr('action', routeUrl)
                $('#deleteItem').submit();
            });
        }
    })
});

// function notifyMsg(message = 'Success', type = 'success', icon = 'fa fa-check') {
//     Dashmix.helpers('notify', {
//         align: 'right',             // 'right', 'left', 'center'
//         from: 'top',                // 'top', 'bottom'
//         type: type,               // 'info', 'success', 'warning', 'danger'
//         icon: icon + ' mr-5',    // Icon class
//         message: message
//     });
// }