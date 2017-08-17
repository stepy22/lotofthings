<form action="post" id="forgotpassform">
    <div class="modal" id="forgotpassmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Resetuj lozinku!
                </div>
                <div class="modal-body">
                    <div id="forgotmesage"></div>
                    <!-- forgot poruka -->

                    <div class="form-group">
                        <label for="Email" class="sr-only">Email</label>
                        <input id="loginemail" type="text" class="form-control" name="loginemail" placeholder="email" maxlength="50">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-target="#signmodal" data-toggle="modal">
                        Registruj se
                    </button>
                    <input type="submit" class="btn green" name="login" value="submit">
                    <button type="button" class="btn btn-primary">Odustani</button>
                </div>
            </div>
        </div>
    </div>
</form>