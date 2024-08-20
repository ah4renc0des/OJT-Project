function start_loader() {
    $('body').append('<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div></div></div>');
}

function end_loader() {
    $('#preloader').fadeOut('fast', function() {
        $('#preloader').remove();
    });
}

window.alert_toast = function($msg = 'TEST', $bg = 'success', $pos = 'top') {
    var Toast = Swal.mixin({
        toast: true,
        position: $pos,
        showConfirmButton: false,
        timer: 5000
    });
    Toast.fire({
        icon: $bg,
        title: $msg
    });
}

$(document).ready(function() {
    // Admin Login
    $('#login-frm').submit(function(e) {
        e.preventDefault();
        start_loader();
        if ($('.err_msg').length > 0) $('.err_msg').remove();

        $.ajax({
            url: _base_url_ + 'classes/Login.php?f=login',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err);
                end_loader();
            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp);
                    if (resp.status == 'success') {
                        location.replace(_base_url_ + resp.redirect); // Redirect based on the response
                    } else if (resp.status == 'incorrect') {
                        showError('#login-frm', 'Incorrect username or password');
                    }
                    end_loader();
                }
            }
        });
    });

    // Establishment Login
    $('#flogin-frm').submit(function(e) {
        e.preventDefault();
        start_loader();
        if ($('.err_msg').length > 0) $('.err_msg').remove();

        $.ajax({
            url: _base_url_ + 'classes/Login.php?f=flogin',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err);
                end_loader();
            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp);
                    if (resp.status == 'success') {
                        location.replace(_base_url_ + resp.redirect); // Redirect based on the response
                    } else if (resp.status == 'incorrect') {
                        showError('#flogin-frm', 'Incorrect username or password');
                    }
                    end_loader();
                }
            }
        });
    });

    // User Login
    $('#slogin-frm').submit(function(e) {
        e.preventDefault();
        start_loader();
        if ($('.err_msg').length > 0) $('.err_msg').remove();

        $.ajax({
            url: _base_url_ + 'classes/Login.php?f=slogin',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err);
                end_loader();
            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp);
                    if (resp.status == 'success') {
                        location.replace(_base_url_ + resp.redirect); // Redirect based on the response
                    } else if (resp.status == 'incorrect') {
                        showError('#slogin-frm', 'Incorrect username or password');
                    }
                    end_loader();
                }
            }
        });
    });

    // System Info Update
    $('#system-frm').submit(function(e) {
        e.preventDefault();
        start_loader();
        if ($('.err_msg').length > 0) $('.err_msg').remove();

        $.ajax({
            url: _base_url_ + 'classes/SystemSettings.php?f=update_settings',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            dataType: 'json',
            success: function(resp) {
                if (resp.status == 'success') {
                    location.reload();
                } else if (resp.status == 'failed' && !!resp.msg) {
                    $('#msg').html('<div class="alert alert-danger err_msg">' + resp.msg + '</div>');
                    $("html, body").animate({ scrollTop: 0 }, "fast");
                } else {
                    $('#msg').html('<div class="alert alert-danger err_msg">An Error occurred</div>');
                }
                end_loader();
            }
        });
    });
});

// Function to display error messages dynamically
function showError(formId, message) {
    var _frm = $(formId);
    var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> " + message + "</div>";
    _frm.prepend(_msg);
    _frm.find('input').addClass('is-invalid');
    $('[name="username"]').focus();
}