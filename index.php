<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/618893c402.js"></script>

	<title>Recuperar acesso ao Wordpress</title>

	<?php
include("conexao.php"); // caminho do seu arquivo de conexão ao banco de dados


$consulta = "SELECT * FROM wp_users";
$con      = $mysqli->query($consulta) or die($mysqli->error);
?>
</head>
<body>
<div class="container mt-5">
      
	  <h1 class="text-center">Lista de usuarios do Wordpress</h1>
      <br>
		
	<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center" scope="col">ID</th>
      <th class="text-center" scope="col">Usuário</th>
      <th class="text-center" scope="col">Senha em MD5</th>
	  <th class="text-center" scope="col">E-mail</th>
	  <th class="text-center" scope="col" >Editar</th>
    </tr>
  </thead>
  <tbody>
  <?php while($dado = $con->fetch_array()) { 	?>
    <tr>
      <td class="text-center" scope="row"><?php echo $dado['ID']; ?></td>
      <td class="text-center"><?php echo $dado['user_login']; ?></td>
      <td class="text-center"><?php echo $dado['user_pass']; ?></td>
	  <td class="text-center"><?php echo $dado['user_email']; ?></td>
	  <td class="text-center"><i class="fa fa-edit" data-toggle="modal" data-target="#Modal" data-id="<?php echo $dado['ID']; ?>" style="cursor: pointer"></i></td>
	</tr>
		<?php } ?>
  </tbody>
</table>
</div>

<!-- Modal -->

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterando senha do ID:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="recipient-id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Alterar senha:</label>
            <input type="text" name="novasenha" class="form-control" id="message-text">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
	  </div>
	  </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#Modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('id') 
  var modal = $(this)
  modal.find('.modal-title').text('Alterando senha do ID: ' + recipient)
  modal.find('#recipient-id').val(recipient)
})
</script>
</body>
</html>