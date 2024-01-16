<html>
	<head>

	</head>

	<body>
		<h1>DreamFox</h1>
		<form id="dream" action="./php/api/post-user-dream.php" method="POST">
			<label for="username">Username</label>
			<input type="text" id="username" name="username">

			<br>

			<label for="password">Password</label>
			<input type="text" id="password" name="password">

			<br>

			<label for="title">Dream Title</label>

			<input type="text" id="title" name="title">
			
			<br>

			<label for="content">Dream Content</label>
			<br>
			<textarea form="dream" name="content" id="content" cols="30" rows="10"></textarea>

			<br>

			<label for="lucid">Lucid</label>
			<input type="checkbox" id="lucid" name="is_lucid">

			<br>

			<input type="submit" value="Submit">
		</form>
	</body>
</html>

