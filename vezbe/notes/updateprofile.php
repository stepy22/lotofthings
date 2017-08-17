<form action="post" id="updateusernameform">
    <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Promeni username
                </div>
                <div class="modal-body">
                    <div id="signupmessage"></div>
                    <!-- forgot poruka -->

                    <div class="form-group">
                        <label for="usrupdate" class="sr-only">Email</label>
                        <input id="usrupdate" type="text" class="form-control" name="updateusername" placeholder="Unesi novi username" maxlength="50">

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green" name="usrupdate" value="submit">

                </div>
            </div>
        </div>
    </div>
</form>

<form action="post" id="updateemailform">
    <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Promeni email
                </div>
                <div class="modal-body">
                    <div id="signupmessage"></div>
                    <!-- forgot poruka -->

                    <div class="form-group">
                        <label for="emlupdate" class="sr-only">Email</label>
                        <input id="emlupdate" type="text" class="form-control" name="updateemail" placeholder="unesi novi mail" maxlength="50">

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green" name="emailupdate" value="submit">

                </div>
            </div>
        </div>
    </div>
</form>

<form action="post" id="updatepassform">
    <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 id="myModalLabel">
                        Promeni sifru
                </div>
                <div class="modal-body">
                    <div id="signupmessage"></div>
                    <!-- forgot poruka -->

                    <div class="form-group">
                        <label for="passupdate" class="sr-only">Email</label>
                        <input id="oldpass" type="text" class="form-control" name="oldpass" placeholder="Unesi sifru" maxlength="50">
                        <input id="passupdate" type="text" class="form-control" name="updatepassword" placeholder="Unesi novu sifru" maxlength="50">
                        <input id="passupdateagain" type="text" class="form-control" name="updatepasswordagain" placeholder="Unesi novu sifru opet" maxlength="50">

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green" name="updatepass" value="submit">

                </div>
            </div>
        </div>
    </div>
</form>