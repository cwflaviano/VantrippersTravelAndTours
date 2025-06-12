$(document).ready(function() {
    $('.nav-link[data-widget="pushmenu"]').on('click', function() {
        setTimeout(() => {
            if ($('body').hasClass('sidebar-collapse')) {
                $('.logo-circle').hide();
                $('.logo-responsive').show();
            } else {
                $('.logo-circle').show();
                $('.logo-responsive').hide();
            }
        }, 100); // Delay to sync with sidebar animation
    });
});

