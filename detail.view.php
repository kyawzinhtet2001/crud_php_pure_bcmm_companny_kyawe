<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    
    <div class="container lh-lg">
    <div class="h1 p-5">Details</div>
        <div>
            Name:
        </div>
        <div>
            <?php echo $i['name']; ?>
        </div>
        <div>
            Address:
        </div>
        <div>
            <?php echo $i['address']; ?>
        </div>
        <div>
            Salary:
        </div>
        <div>
            <?php echo $i['salary']; ?>
        </div>

    </div>
</body>
</html>