

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Schools</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-secondary text-white text-center">
  <h1>All Schools</h1>
  <p>Schools are  institution for educating children</p> 
</div>
  
<div class="container-fluid mt-5">
    <div class="row">
        @foreach($related_schools as $allschools)
        <a href="/Searched/school/{{ $allschools->id}}" class="" style="height:600px;">
            <div class="card">
                <img class="card-img-top"style="height: 400px;" src="/storage/{{ $allschools->main_banner}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$allschools->name}}</h5>
                    <p class="card-text">Some quick example</p>
                </div>
            </div>
</a>
        @endforeach
    </div>
</div>

</body>
</html>

