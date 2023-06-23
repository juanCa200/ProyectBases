<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Education</title>

  <!-- 100% free to play, nah mentiras, 100% CSS sin BOOSTRAP*/ -->

<style>

  body{
        background-image: url("/app/img/universitarios.jpg"); 
        background-repeat: no-repeat;
        background-size: cover;
      }

  .bg{
          background-image: url("/app/img/estudiante.png");
          background-position: 50% 10px;
          background-repeat: no-repeat;
  }

  .container {
    width: 75%;
  }

  .bg-primary {
    background-color: #007bff;
  }

  .mt-5 {
    margin-top: 4rem;
    margin-left:11rem;
  }

  .rounded {
    border-radius: 0.25rem;
  }

  .shadow {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  }
  .row {
    display: flex;
    flex-wrap: wrap;
  }

  .align-items-stretch {
    align-items: stretch;
  }

  .custom-style {
    box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.5);
    border-radius: 6px 8px;
  }
  .col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
  }

  .d-none {
    display: none !important;
  }

  .d-lg-block {
    display: block !important;
  }

  .cold-md-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }

  .col-lg-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }

  .col-xl-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }

  .rounded {
    border-radius: 0.25rem;
  }
  .col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
  }

  .bg-white {
    background-color: #fff;
  }

  .p-5 {
    padding: 1.25rem;
  }

  .rounded-end {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
  }

  .fw-bold {
    font-weight: bold;
  }

  .text-center {
    text-align: center;
  }

  .pt-5 {
    padding-top: 3.125rem;
  }
  .form-label {
    margin-bottom: 0.5rem;
    font-family: "Roboto", sans-serif;
  }

  .form-control {
    font-family: "Roboto", sans-serif;
    display: block;
    width: 80%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,
      box-shadow 0.15s ease-in-out;
  }

  .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .my-3 {
    margin-top: 1rem;
    margin-bottom: 1rem;
  }

  a {
    color: #007bff;
    text-decoration: none;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch" style="box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.5); border-radius:6px 8px; ">
            <div class="col bg d-none d-lg-block cold-md-5 col-lg-5 col-xl-6 rounded">
            </div>
            <div class="col bg-white p-5 rounded-end">
            <h2 class="fw-bold text-center pt-5" style="font-weight: bold; font-family: Roboto, sans-serif;  letter-spacing: 2px; font-size:1.9rem">ADMINISTRACIÓN</h2>
            <form action="/app/views/loginProcesado.php" style="margin-left:15px;" method="POST">
            <div class="mb-4">
                <br>
                <label class="form-label">Usuario</label><br>
                <input placeholder="Ingrese su usuario" type="text" style="margin-top:10px; margin-bottom:15px" class="form-control" name="usuario">
            </div>
            <div class="mb-4">
            <label for="password"  class="form-label">Password</label>
                <input placeholder="Ingrese su codigo" type="password" style="margin-top:10px;" class="form-control" name="password">
            </div>
            <div class="d-grid">
            <button type="submit" style="margin-top:30px; width:86%;" class="btn btn-primary">Iniciar</button>
            </div>
            <br><br><br><br><br><br>
        </form>        
            </div>
         </div>
    </div> 
</body>
</html>