<?php include('top.inc');?>
<body>
    <main role="main">
        <div class="text-center py-5">
      <div class="container col-7">
         <img class="mb-5 form-logo" src="assets/form_logo.png">
         <h2>Join</h2>
         <p class="lead text-muted"><small>
          Fill in the join form to enjoy our service!
        </small></p>

        <form class="join" name="join" action="index.php?action=join" method="POST">
            <div class="py-3">
              <h4 class="mb-3">Information</h4>
              <label class="float-left" for="id">ID</label>
              <input type="text" class="form-control" id="id" placeholder="ID" value="" name="id" required>
              <div class="invalid-feedback">
                Valid ID is required.
              </div>
            </div> 
            <div class="py-3">              
              <label class="float-left" for="pw">Password</label>
              <input type="password" class="form-control" id="pw" placeholder="******" value="" name="pw" required>
              <div class="invalid-feedback">
                Valid Password is required.
              </div>
            </div>
            <div class="py-3">
              <label class="float-left" for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
              <div class="invalid-feedback">
                  Your username is required.
              </div>
            </div>
            <div class="py-4">
              <button class="btn btn-emp btn-lg" type="submit">Join</button>
              <button class="btn btn-sub btn-lg" type="reset">Reset</button>
            </div>
        </form>
        </div>
        </div>
    </main>

<?php include('bottom.inc');?>
