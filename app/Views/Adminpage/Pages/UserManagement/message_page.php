<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php if(session()->has('user_restored')) : ?>
            User Restored
        <?php elseif (session()->has('user_archived')): ?>
            User Archived
        <?php endif; ?>
    </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
    const url = "<?= base_url('/admin/users_management') ?>";

    <?php if(session()->has('user_restored')) : ?>
        Swal.fire({
            title: "Restored!",
            text: "User has been successfully restored.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = url;
        });
    <?php elseif (session()->has('user_archived')): ?>
        Swal.fire({
            title: "Archived!",
            text: "User has been successfully archived.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = url;
        });
    <?php else: ?>
        Swal.fire({
            title: "Access Denied",
            icon: "error",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = url;
        });
    <?php endif; ?>
</script>
</body>
</html>