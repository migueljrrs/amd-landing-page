$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Custom
      $("#navbarNav").removeClass("show");
      var heightHeader = $("#navbar").outerHeight();

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top - heightHeader
      }, 800);
    } // End if
  });
});

function formActions(){
  async function handleSubmit(e){
    e.preventDefault();

    document.getElementById("feedback").innerHTML = "";

    // Load
    document.getElementById("formSubmit").setAttribute("disabled", "true");
    document.getElementById("formLoad").style.display = "inline-block";
    
    try {
      var data = {
        name: document.getElementById("formName").value || "",
        email: document.getElementById("formEmail").value || "",
        cel: document.getElementById("formCel").value || "",
        message: document.getElementById("formMessage").value
      }

      // await fetch("http://localhost:5001/agenda-nails-6aeff/us-central1/sendContact", {
      await fetch("https://us-central1-agenda-nails-6aeff.cloudfunctions.net/sendContact", {
          method: "POST",
          body: JSON.stringify(data)
      });

      document.getElementById("feedback").innerHTML = "<div class='alert alert-success' role='alert'>Contato enviado com sucesso. Em breve nossa equipe entrará em contato com você.</div>";
    } catch (error) {
      document.getElementById("feedback").innerHTML = "<div class='alert alert-danger' role='alert'>Ocorreu um erro ao tentar enviar o formulário. Tente novamente.</div>";
    }

    // Load
    document.getElementById("formSubmit").removeAttribute("disabled");
    document.getElementById("formLoad").style.display = "none";

    // Anchor
    var heightHeader = $("#navbar").outerHeight();
    
    $('html, body').animate({
      scrollTop: $("#form").offset().top - (heightHeader + 20)
    }, 800);
  }
  
  var form = document.getElementById('form');
  form.addEventListener('submit', handleSubmit);
}

window.onload = formActions;
