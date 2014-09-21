    	<div class="cRight" style="width:800px; height:170px; ">
        	<h2>Freelance Work</h2>
            <p class="text"><span class="info-sub">Client: </span>Various<span class="info-sub2">My Role(s): </span>Everything<span class="info-sub2">Date:</span> N/A</p>
        </div>
        
        <div class="cRight" style="width:800px; height:auto; margin-top:30px;">
            <div id="outerCon" class="c960">
                <div id="loginCon">
                    <div id="login" class="boxin">
                        <h3>Login</h3><center><br />
                        
                        <?php if(isset($_GET['error'])): ?>
                          <h2>Username and/or Password are incorrect</h2>
                        <?php endif ?>
                        
                        <?php if(isset($_GET['login_required'])): ?>
                          <h2>You must log in to view this page.</h2>
                        <?php endif ?>
                        
                        <form action="authenticate.php" method="POST">
                          <label for="username">Username:</label>
                          <input type="text" name="username" id="username"><br />
                          <label for="password">Password:</label>
                          <input type="password" name="password" id="password" ><br />
                          <input type="submit" value="Log In" >
                        </form></center>
                    </div>
				</div>
			</div>
                       