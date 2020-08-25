<div id="login" class="modal hide fade">
 <div class="modal-dialog">
    <div class="modal-content">
			<div class="modal-header2">
				<a class="close" data-dismiss="modal">X</a>
				<div style="width:40%;display:inline-block;color:#1C8EE0;border-bottom:solid;" id="logintab" class="logintab"><span style="font-weight: bold;">LOGIN</span></div><div style="width:40%;display:inline-block;color:#f8b600;border-bottom:none;" id="registertab" class="registertab"><span style="font-weight: bold;">REGISTER</span></div>
			</div>
			<div class="modal-body" id="modal-body">
				<form class="form-horizontal" action="" method="post" id="loginform"/>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="icontact_name">Your Mail :</label>
							<div class="controls">
								<input required class="input-xlarge" id="email" name="mail" type="email" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="icontact_email">Password:</label>
							<div class="controls">
								<input class="input-xlarge" required id="userpassword" type="password" name="userpassword" maxlength="16" minlength="8"/>
								<div class="passeye" onclick="visiblePass()" id="passeye"></div>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" id="loginbtn" name="loginbtn">OK</button>
						</div>
					</fieldset>
				</form>
				<div id="results"></div>
				<a href="#" id="forgottab" class="forgottab">Forgot your password?</a>
			</div>
			
			<div class="modal-body" id="modal-body3">
				<form class="form-horizontal" action="" method="post" id="forgotform"/>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="icontact_name">Your Mail :</label>
							<div class="controls">
								<input required class="input-xlarge" id="email" name="mail" type="email" />
							</div>
						</div>
						
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" id="forgotbtn" name="forgotbtn">OK</button>
						</div>
					</fieldset>
				</form>
				<span>If you forgot your password, enter your e-mail here and get a link to reset it<span>
				<div id="forgotresults"></div>
			</div>
			
			<div class="modal-body" id="modal-body2">
				<form class="form-horizontal" action="" method="post" id="regform"/>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="icontact_name">Enter Mail:</label>
							<div class="controls">
								<input type="email" required class="input-xlarge" id="email" name="mail" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="icontact_nick">Enter Nick:</label>
							<div class="controls">
								<input class="input-xlarge" maxlength="16" minlength="3" pattern="[A-Za-z0-9 ]+" required id="icontact_nick" type="text" name="nick" />
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" id="registerbtn" name="registerbtn">Register</button>
						</div>
					</fieldset>
				</form>
				<span>By registering, you agree with our <a href="/rules.php">rules</a><span>
				<div id="regresults"></div>
			</div>
			</div>
			</div>
			
		</div>