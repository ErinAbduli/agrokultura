<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $prevPage = $_SERVER['HTTP_REFERER'];
} else {
    $prevPage = '../../../index.php';
}
?>

<!DOCTYPE html>
<html lang="sq">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Regjistrohu - Agrokultura</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../../assets/css/Regjistrohu.css" />
	<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
	<div class="wrapper">
		<a href="../../../index.html" class="back-btn"><i class="bi bi-chevron-left"></i>&nbsp; Back</a>
		<div class="form-box">
			<div class="header">
				<h2>Krijo një llogari</h2>
				<p class="subtitle">Plotëso të dhënat për t'u regjistruar</p>
			</div>

			<form class="register-form" novalidate>
				<div class="form-fields">
					<div class="first-part">
						<div>
							<label for="fullname">Emri i plotë</label>
							<input type="text" id="fullname" name="fullname" placeholder="Shkruaj emrin dhe mbiemrin"
								required />
							<div class="error-msg" id="fullnameErrorMsg"></div>
						</div>
						<div>
							<label for="email">Email</label>
							<input type="email" id="email" name="email" placeholder="Shkruaj email-in tënd" required />
							<div class="error-msg" id="emailErrorMsg"></div>
						</div>
						<div>
							<label for="password">Fjalëkalimi</label>
							<input type="password" id="password" name="password" placeholder="Krijo një fjalëkalim"
								required minlength="8" />
							<div class="error-msg" id="passwordErrorMsg"></div>
						</div>
						<div>
							<label for="confirm-password">Konfirmo fjalëkalimin</label>
							<input type="password" id="confirm-password" name="confirm-password"
								placeholder="Përsërit fjalëkalimin" required minlength="8" />
							<div class="error-msg" id="confirmPasswordErrorMsg"></div>
						</div>
					</div>
					<div class="second-part">
						<div><label for="phone">Numri i telefonit</label>
							<input type="tel" id="phone" name="phone" placeholder="Shkruaj numrin e telefonit"
								required />
							<div class="error-msg" id="phoneErrorMsg"></div>
						</div>
						<div><label for="address">Adresa</label>
							<input type="text" id="address" name="address" class="address-field"
								placeholder="Rruga, nr., hyrja" required />
							<div class="error-msg" id="addressErrorMsg"></div>
						</div>
						<div><label for="city">Qyteti</label>
							<input type="text" id="city" name="city" placeholder="P.sh. Prishtinë" required />
							<div class="error-msg" id="cityErrorMsg"></div>
						</div>
						<div><label for="zip">Kodi postar</label>
							<input type="text" id="zip" name="zip" placeholder="P.sh. 10000" required />
							<div class="error-msg" id="zipErrorMsg"></div>
						</div>
					</div>
				</div>

				<div class="terms">
					<div>
						<input type="checkbox" id="terms" required />
						<label for="terms">Pranoj <a href="../policies/terms-conditions.html">kushtet</a> dhe <a
								href="../policies/policy.html">politikat e
								privatësisë</a></label>
					</div>
					<div class="error-msg" id="termsErrorMsg"></div>
				</div>

				<button type="submit" class="sign-up">Regjistrohu</button>

				<p class="login">
					Ke një llogari? <a href="./login.html">Kyçu!</a>
				</p>
			</form>

			<div class="divider"><span>OSE</span></div>

			<div class="social-login">
				<button class="social google">
					<i class="fab fa-google"></i><span>Regjistrohu me Google</span>
				</button>
				<button class="social facebook">
					<i class="fab fa-facebook-f"></i><span>Regjistrohu me Facebook</span>
				</button>
				<button class="social apple">
					<i class="fab fa-apple"></i><span>Regjistrohu me Apple</span>
				</button>
			</div>
		</div>
	</div>

	<script src="../../assets/js/signupValidation.js"></script>
</body>

</html>