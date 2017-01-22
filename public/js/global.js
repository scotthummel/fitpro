$(function() {
    $('.alert').delay(6000).slideUp();

    $('form.delete button').click(function(e) {
        e.preventDefault();
        var resource = $(this).closest('form').data('type');
        if (!resource) {
            resource = 'resource';
        }

        if (confirm('Are you sure you want to delete this ' + resource + '?')) {
            this.form.submit();
        } else {
            return false;
        }
    });

    $('a[data-toggle="popover"], span[data-toggle="popover"]').popover({ trigger: "hover" });
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}