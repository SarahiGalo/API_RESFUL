<!DOCTYPE html>
<html>
<head>
	<title>Registrar Categoria</title>
</head>
<body>
	<form action="/categorias" method="POST">
		{{ csrf_field() }}
		<input type="text" name="Nombre" placeholder="Nombre Categoria"><br><br>
		<input type="submit" name="Enviar">
	</form>
</body>
</html>