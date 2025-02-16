document.addEventListener('DOMContentLoaded', function () {
  // Inicijalizacija EmailJS-a sa tvojim USER ID
  emailjs.init('TVOJ_USER_ID'); // Zameni sa svojim User ID iz EmailJS

  const form = document.getElementById('contact-form');
  const statusMessage = document.getElementById('status');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    // Bootstrap validacija
    if (!form.checkValidity()) {
      event.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    // Slanje putem EmailJS
    emailjs.sendForm('TVOJ_SERVICE_ID', 'TVOJ_TEMPLATE_ID', form).then(
      function () {
        statusMessage.innerHTML = "<span class='text-success'>Poruka uspešno poslata!</span>";
        form.reset();
        form.classList.remove('was-validated');
      },
      function (error) {
        statusMessage.innerHTML = "<span class='text-danger'>Greška pri slanju. Pokušajte ponovo.</span>";
      }
    );
  });
});
