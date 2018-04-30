<?php include('top.inc');?>
  <main role="main">
    <div class="text-center py-5">
      <div class="container col-7">
       <form class="form-signin" name="login" method="GET" action="index.php">
         <img class="mb-5 form-logo" src="assets/form_logo.png">
         <h2>Log in</h2>
         <p class="lead text-muted"><small>
          To create a new account, click <strong>Join</strong> button at the bottom.
        </small></p>
         <input type="hidden" name="action" value="login">
         <label for="inputId" class="sr-only">ID</label>
         <input type="text" name="id" id="inputId" class="form-control mb-1" placeholder="ID" required autofocus>
         <label for="inputPassword" class="sr-only">Password</label>
         <input type="password" name="pw" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
         <button class="btn btn-lg btn-emp btn-block" type="submit">Log in</button>
         <button class="btn btn-lg btn-sub btn-block" type="button" onClick="location.href='join.php'">Join</button>
        </form>
      </div>
    </div>
  </main>
<?php include('bottom.inc');?>