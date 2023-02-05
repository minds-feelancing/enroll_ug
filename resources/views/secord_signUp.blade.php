
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body class="bg-light bg-primary">
    <div class="form-container" style="width: 500px; height: 330px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #F5F5F5; padding: 20px;">
      <form action="{{ url('/step2/store') }}" method="post">
        @csrf
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Back</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>
