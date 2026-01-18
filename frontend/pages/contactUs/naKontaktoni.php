<!DOCTYPE html>
<html lang="sq">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Na Kontaktoni - Agrokultura</title>
	<link rel="stylesheet" href="../../assets/css/naKontaktoni.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
	<?php include '../../includes/header.php' ?>

	<div class="page">
		<h1>Na Kontaktoni</h1>
		<p class="subtitle">Jemi këtu për çdo pyetje apo sugjerim që keni</p>

		<div class="contact-wrapper">
			<div class="left-section">
				<h2 class="section-title">Informacione Kontakti</h2>

				<div class="info-group">
					<h3>Qendra e Thirrjeve</h3>
					<p><strong>Individët:</strong> 011 44 14 000</p>
					<p><strong>Entitetet Ligjore:</strong> 011 44 14 010</p>
					<p><strong>Thirrje nga rrjeti mobil:</strong> 066 6 67 67 67</p>
				</div>

				<div class="info-group">
					<h3>Orari i Punës</h3>
					<p><strong>E Hënë - E Premte:</strong> 08:00 - 20:00</p>
					<p><strong>E Shtunë:</strong> 09:00 - 16:00</p>
					<p><strong>E Diel:</strong> Ditë jo-pune</p>
				</div>

				<div class="info-group">
					<h3>Email Adresat</h3>
					<p>
						<a href="mailto:info@agrokultura.com">info@agrokultura.com</a>
					</p>
					<p>
						<a href="mailto:support@agrokultura.com">support@agrokultura.com</a>
					</p>
				</div>
			</div>

			<!-- Pjesa e Djathtë - Forma -->
			<div class="right-section">
				<h2 class="section-title">Dërgoni një Mesazh</h2>

				<form class="contact-form" novalidate>
					<div class="form-row">
						<div class="form-group">
							<label for="name">Emri dhe Mbiemri</label>
							<input type="text" id="name" placeholder="Emri dhe Mbiemri" required />
							<div id="nameErrorMsg" class="errorMsg"></div>
						</div>
						<div class="form-group">
							<label for="phone">Telefoni</label>
							<input type="tel" id="phone" placeholder="Numri i telefonit" required />
							<div id="telErrorMsg" class="errorMsg"></div>
						</div>
					</div>

					<div class="form-group full-width">
						<label for="email">Email</label>
						<input type="email" id="email" placeholder="Adresa email" required />
						<div id="emailErrorMsg" class="errorMsg"></div>
					</div>

					<div class="form-group full-width">
						<label for="contact-option">Opsioni i Kontaktit</label>
						<select id="contact-option" required>
							<option value="">Zgjidhni një opsion kontakti</option>
							<option value="general">Pyetje të Përgjithshme</option>
							<option value="support">Mbështetje Teknike</option>
							<option value="sales">Shitje dhe Porosi</option>
							<option value="partnership">Partneritet</option>
							<option value="other">Të tjera</option>
						</select>
						<div id="contactReasonErrorMsg" class="errorMsg"></div>
					</div>

					<div class="form-group full-width">
						<label for="message">Mesazhi</label>
						<textarea id="message" placeholder="Shkruani mesazhin tuaj këtu..." required></textarea>
						<div id="messageErrorMsg" class="errorMsg"></div>
					</div>

					<!-- <div class="form-group full-width">
            <label>Bashkëngjit Skedarë (opsionale)</label>
            <div class="file-upload">
              <div class="upload-icon">📤</div>
              <p>
                Tërhiqni dhe lëshoni ose <strong>Zgjidhni skedarë</strong>
              </p>
              <p style="font-size: 0.85rem; color: #999">
                JPG ose PDF (max. 10 MB)
              </p>
            </div>
          </div> -->

					<!-- <div class="checkbox-group">
            <input type="checkbox" id="privacy" required />
            <label for="privacy">
              Jam i njohur dhe pajtohem me
              <a href="#">Politikën e Privatësisë</a>. Shikoni më shumë detaje
              në <a href="#">faqen e Politikës së Privatësisë</a>.
            </label>
          </div> -->

					<button type="submit" class="submit-btn">Dërgo Mesazhin</button>
				</form>
			</div>
		</div>

		<!-- Harta -->
		<div class="map-section">
			<h2>Vendndodhja Jonë</h2>
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.7899942091585!2d21.65750801226755!3d42.30434627107801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135458074aca3611%3A0xbad02282e02781ba!2sAGROKULTURA%20EXPORT%20IMPORT!5e0!3m2!1sen!2srs!4v1765912536634!5m2!1sen!2srs"
				allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
	<?php include '../../includes/footer.php' ?>

	<script src="../../assets/js/hamburgerMenuToggler.js"></script>
	<script src="../../assets/js/contatUsValidation.js"></script>
</body>

</html>