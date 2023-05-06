<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if($_SESSION["GDS"]){
        ?>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      
      Swal.fire({
      title: 'CADASTRO REALIZADO COM SUCESSO',
      width: 600,
      padding: '3em',
      color: '#fff',
      background: '#585757',

    })
    setTimeout(function() {
    }, 5000); 
    </script>

  <style>

  .swal2-confirm.swal2-styled{
         background-color: #8BDE38;
         display:none;
     } 
  </style>
        <?php
    }
    $_SESSION["GDS"] = "";
    ?>
</body>
</html>