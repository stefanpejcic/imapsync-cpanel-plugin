$(document).ready(function() {
  $('#boton-parcial').click(function(e) {
    e.preventDefault();
    var emailOrg = $('[name="email"]').val();
    var passwordOrg = $('[name="passwordOrg"]').val();
    var imapOrg = $('[name="url"]').val();
    var emailDst = $('[name="selector-dominios"]').val();
    var passwordDst = $('[name="passwordDst"]').val();
    var imapDst = window.location.hostname;

    var formData = {
      emailOrg: emailOrg,
      passwordOrg: passwordOrg,
      imapOrg: imapOrg,
      emailDst: emailDst,
      passwordDst: passwordDst,
      imapDst: imapDst
    };

    $.ajax({
      type: 'POST',
      url: 'imap.php',
      data: formData,
      success: function(response) {
        $('pre').text(response);
      },
      error: function(xhr, status, error) {
        $('pre').text(error);
      }
    });
  });
});

