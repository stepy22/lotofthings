<form action="post" id="loginform">
    <div class="modal" id="loginmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Uloguj se!
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="loginmessage"></div>
                    <!-- login poruka iz php -->

                    <div class="form-group">
                        <label for="Email" class="sr-only">Email</label>
                        <input id="loginemail" type="text" class="form-control" name="loginemail" placeholder="email" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="pasword" class="sr-only">Password</label>
                        <input id="loginpasword" type="password" class="form-control" name="loginpassword" placeholder="password" maxlength="50">
                    </div>
               <div class="chechbox"><label for="rememberme">
                   <input id="rememberme"name="rememberme" type="checkbox">
                       Zapamti me!
                   </label>
                   <a data-dismiss="modal" data-target="#forgotpassmodal" data-toggle="modal" style="cursor:pointer" class="pull-right" href="#">Zaboravio si password?</a>

               </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-target="#signmodal" data-toggle="modal">
                        Registruj se
                    </button>
                    <input type="submit" class="btn green" name="login" value="Uloguj se">
                    <button type="button" class="btn btn-primary">Odustani</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include "forgotpass.php"; ?>