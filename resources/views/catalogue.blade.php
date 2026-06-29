<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    
   <center> <h1  style="margin-bottom: 30px">Notre Catalogue </h1></center>


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">image</th>
        <th scope="col">nom</th>
        <th scope="col">Prix</th>
        <th scope="col">solde</th>


      </tr>
    </thead>
    <tbody>

@foreach ($games as $game)


<tr>
    <td> <img style="border-radius: 40px" src="{{$game['image']}}" class="card-img-top" alt="..." ></td>
    <td style="text-transform: uppercase">{{$game['name']  }}</td>
    <td style="text-decoration: line-through;">{{$game['prix'] }}$ </td>
    <td style="color:red">{{$game['prix'] - (0.3 * $game['prix'])}}$ </td>


  </tr>

@endforeach


    </tbody>
  </table>

</body>