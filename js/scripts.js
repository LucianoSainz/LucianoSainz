$(document).ready(function () {
  var scrollLink = $(".scroll");

  //Smooth scrolling

  scrollLink.click(function (e) {
    e.preventDefault();
    $("body, html").animate(
      {
        scrollTop: $(this.hash).offset().top,
      },
      2000
    );
  });
});

$(function () {
  $(".galeria .contenedor-imagen").on("click", function () {
    $("#modal").modal;
    var ruta_imagen = $(this).find("img").attr("src");
    $("#imagen-modal").attr("src", ruta_imagen);
  });

  $("#modal").on("click", function () {
    $("#modal").modal("hide");
  });
});
