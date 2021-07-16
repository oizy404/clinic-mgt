<div class="admin-login">
    <div class="col-md-4 offset-md-4 rounded" id="admin-login">
    <center><img src="images/acdclinicLogo.jpg" alt="acd clinic logo" class="acdclinic-Logo" id="acdclinicLogo"></center>
        <form action="#" method="post">
            @csrf
            @method('post')
            <div class="mb-3 mt-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-1">
                <label for="password" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" name="password">
            </div><br>
            <button type="submit" class="btn-primary" id="adminbtn-login">Log In</button>
            <button type="submit" class="btn-danger" id="adminbtn-cancel">Cancel</button>
        </form>
    </div>
</div>