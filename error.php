<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<title>Error</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="error-container">
		<div class="error-message">
			Wrong/Invalid Input
		</div>
	</div>
</body>
</html>

<style>
body {
	margin: 0;
	padding: 0;
	background-image: url(image.PNG);
    background-size: 50% auto;
	background-position: center;
    background-repeat: no-repeat;
}

.error-container {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	background-color: rgba(255, 255, 255, 0.5);
}

.error-message {
	font-family: 'Roboto', sans-serif;
	font-size: 3rem;
	font-weight: 200;
	text-align: center;
	padding: 20px;
	background-color: transparent;
	box-shadow: none;
	border: none;
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
}
}
</style>