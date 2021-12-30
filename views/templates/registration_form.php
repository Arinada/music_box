</div id='registration-form-wrapper'>
<form class="modal" id="registration-form" method="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; font-size: 14pt">Registration form</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" required id="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">E-mail:</label>
                        <input class="form-control" required id="e-mail" type="email" id="message-text"/>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input class="form-control" required id="pwd" type="password" id="message-text"/>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Repeat Password:</label>
                        <input class="form-control" required id="repeat_pwd" type="password" id="message-text"/>
                    </div>
                    <div class="form-group">
                    <select id="roles" style="height: 25px; width: 25%" class="form-select" required aria-label="select example">
                        <option id="role" type='hidden' value="">Choose role</option>
                        <option id="role" value="1">Reader</option>
                        <option id="role" value="2">Writer</option>
                    </select>
                    <button id="roles_info_btn" style="height: 5%; width: 5%" class="form-select"><a href="roles_info_page">?</a></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="register-btn" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</form>
</div>
