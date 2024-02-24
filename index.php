<html>
	<head>

		<style>
			body {
				background-color: #121212;
				color: #FAFAFA;
			}
		</style>
	</head>


	<body>
		<h1>DreamFox App</h1>

		<h1>Submit a dream</h1>
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

		<h1>Display dreams</h1>
		<form action="">
			<label for="username-dream">Username</label>
			<input type="text" id="username-dream" name="password">
			<br>
			<button id="submit">Print</button>
		</form>

		<script>
			const button = document.getElementById("submit");
			const usernameDream = document.getElementById("username-dream");

			button.addEventListener("click", (event) => {
				event.preventDefault();
				fetch(`./php/api/get-user-dreams.php?username=${usernameDream.value}`)
				.then(response => response.json())
				.then(json => {
					console.clear();
					displayDreams(json);
				});
			});

			function displayDreams(json) {
				const dreams = json.dreams;
				for (const dream of dreams) {
					const content = dream.content.replaceAll("\\n", "\n").replaceAll('\\"', '\"'); // my past mistakes have brought me here today
					console.log(`${dream.title}\n\n${content}\n\n${dream.date}`);
				}
			}
		</script>
	</body>
</html>

