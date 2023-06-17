<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodal">Login to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/forums/partials/handle_login.php">
                    <div class="mb-3">
                        <label for="username_login" class="form-label">Username</label>
                        <input type="text" required="" class="form-control" id="username_login" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password_login" class="form-label">Password</label>
                        <input type="password" required="" class="form-control" id="password_login" name="password">
                        <input type="checkbox" class="my-1" onclick="myFunction()"> &nbsp;Show Password
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("password_login");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>