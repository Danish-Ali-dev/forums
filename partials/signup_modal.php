<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodal">Signup for an iDiscuss Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/forums/partials/handle_signup.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" maxlength="20" required="" class="form-control" id="username"
                            name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" maxlength="20" required="" class="form-control" id="password"
                            name="password">
                        <input type="checkbox" class="my-1" onclick="myFunction1()"> &nbsp;Show Password
                    </div>
                    <div class="mb-1">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" maxlength="20" required="" class="form-control" id="cpassword"
                            name="cpassword">
                        <input type="checkbox" class="my-1" onclick="myFunction2()"> &nbsp;Show Password
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" name="signup">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction1() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction2() {
    var x = document.getElementById("cpassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>