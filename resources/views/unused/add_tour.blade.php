<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Tour</title>
</head>
<body>
    <h1>Addicionar Tour</h1>
    <form action="/cadastrarTour" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter email">
          
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Local</label>
            <input type="text" class="form-control" id="local" name="local" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">EP</label>
            <input type="text" class="form-control" id="ep" name="ep" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">EG</label>
            <input type="text" class="form-control" id="eg" name="eg" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">EMG</label>
            <input type="text" class="form-control" id="emg" name="emg" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">img</label>
            <input type="text" class="form-control" id="img" name="img" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">img2</label>
            <input type="text" class="form-control" id="img2" name="img2" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">img3</label>
            <input type="text" class="form-control" id="img3" name="img3" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Obs.</label>
            <input type="text" class="form-control" id="obs" name="obs" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Destaque</label>
            <input type="text" class="form-control" id="destaque" name="destaque" aria-describedby="emailHelp" placeholder="Enter email">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
</body>
</html>