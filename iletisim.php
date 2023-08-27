<script type="text/javascript">
	$(document).on('submit', '.ajax_form', function(event){
		event.preventDefault();
		var formData  = new FormData($(this)[0]);
		$.ajax({
			url:  $(this).attr('action'),
			type: $(this).attr('method'),
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		}).done(function(result){
			if ($.trim(result) == "hata"){
				Swal.fire({
					title: "Hata",
					text: "Bir hata oluştur",
					confirmButtonText: "Tamam",
					confirmButtonColor: "#ce3232",
					timer: 2000,
					timerProgressBar: true
				})
			}else if ($.trim(result) == "ok"){
				Swal.fire({
					title: "Başarılı",
					text: "Mesajınız başarıyla gönderildi",
					confirmButtonText: "Tamam",
					confirmButtonColor: "#ce3232",
					timer: 3000,
					timerProgressBar: true
				}).then((result) => {
					$('.buttons').prop('disabled', true)
				})
			}
		}).fail(function(data){
			console.log(data.responseText);
			alert("Hata!");
		})
	});
</script>

<section id="contact" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<h2>İletişime geçelim</h2>
					<span class="line-bar">...</span>
				</div>
			</div>

			<div class="col-md-8 col-sm-8">

				<!-- CONTACT FORM HERE -->
				<form action="islem.php" class="ajax_form" method="POST" enctype="multipart/form-data">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="İsim soyisim*" name="isim" required oninvalid="this.setCustomValidity('İsim ve Soyisim boş bırakılamaz')" oninput="this.setCustomValidity('')">
					</div>

					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" placeholder="Mail adresi*" name="mailadresi" required oninvalid="this.setCustomValidity('Mail adresi boş bırakılamaz')" oninput="this.setCustomValidity('')">
					</div>

					<div class="col-md-6 col-sm-6">
						<input type="tel" class="form-control" placeholder="Telefon numarası" name="telefon">
					</div>

					<div class="col-md-6 col-sm-6">
						<select class="form-control" name="konu" required oninvalid="this.setCustomValidity('Konu boş bırakılamaz')" oninput="this.setCustomValidity('')">
							<option>İstek proje</option>
							<option>Yazılım sorunu danışma</option>
							<option>Başka</option>
						</select>
					</div>
					<input type="hidden" name="mailGonder" value="ok">

					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" minlength="5" rows="6" placeholder="İletiniz*" name="ileti" required oninvalid="this.setCustomValidity('Mesaj içeriği boş bırakılamaz')" oninput="this.setCustomValidity('')"></textarea>
					</div>

					<div class="col-md-4 col-sm-12">
						<button class="form-control buttons" type="submit">Gönder</button>
					</div>

				</form>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="google-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d16171.067844958381!2d32.46881550788827!3d37.868980157551015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shtml%20google%20haritalar%20ekleme!5e0!3m2!1str!2str!4v1693064429149!5m2!1str!2str" allowfullscreen></iframe>
				</div>
			</div>

		</div>
	</div>
</section>