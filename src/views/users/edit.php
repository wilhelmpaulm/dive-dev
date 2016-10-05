<?php getPage("shared/header") ?>
<div class="container">
    <form class="form-horizontal" action="<?= linkTo("users/{$user["id"]}") ?>" method="POST">
        <fieldset>
            <legend>Edit User</legend>
            <div class="form-group">
                <label for="firstEmail" class="col-lg-2 control-label">First Name</label>
                <div class="col-lg-10">
                    <input name="first_name" value="<?= $user["first_name"] ?>" type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
                <div class="col-lg-10">
                    <input name="last_name"  value="<?= $user["last_name"] ?>" type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input name="email"  value="<?= $user["email"] ?>" type="email" required="" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input name="password"  value="<?= $user["password"] ?>" type="password" required="" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Radios</label>
                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="male" checked="">
                            male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios2" value="female">
                            female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Address</label>
                <div class="col-lg-10">
                    <textarea name="address" class="form-control" rows="3" id="textArea" 
                              style=""> <?= $user["address"] ?></textarea>
                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<?php
getPage("shared/footer")?>