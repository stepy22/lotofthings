<form action="post" id="signupform">
    <div class="modal" id="signmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Probaj aplikaciju!Besplatno!
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="signupmessage"></div>

                    <!-- Sign up poruka iz php -->
                    <div class="form-group">
                        <label for="username" class="sr-only">Username:</label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="username" maxlength="30">

                    </div>
                    <div class="form-group">
                        <label for="Email" class="sr-only">Email</label>
                        <input id="email" type="text" class="form-control" name="email" placeholder="email" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="pasword" class="sr-only">Password</label>
                        <input id="pasword" type="password" class="form-control" name="password" placeholder="password" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="pasword2" class="sr-only">Password</label>
                        <input id="pasword2" type="password" class="form-control" name="password2" placeholder="Confirm password" maxlength="50">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <input type="submit" class="btn green" name="signup" value="Registruj se">
                    <button type="button" class="btn btn-primary">Odustani</button>
                </div>
            </div>
        </div>
    </div>
</form>