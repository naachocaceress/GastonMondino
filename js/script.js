
// window.addEventListener('scroll', function() {
//     let header = document.getElementById('header');
//     let boca = this.document.getElementById("wave")
//     let scrollPosition = window.scrollY
//     let scrollPositionboca = boca.offsetTop
//     if (scrollPosition >= scrollPositionboca) { // Cambia el valor según cuánto quieras que se desplace antes de cambiar el color
//       header.style.backgroundColor = "rgba(128, 128, 128, 0.096)";
//     } else {
//       header.style.backgroundColor = "whitesmoke"; // Cambia de nuevo al color original
//     }
//   });

window.addEventListener('scroll', function() {
  var header = document.querySelector('header');
  if (window.scrollY > 0) {
    header.style.borderBottom = "3px solid black"; // Agrega un borde inferior cuando el scroll es mayor que 0
  } else {
    header.style.borderBottom = 'none'; // Quita el borde inferior si el scroll es 0
  }
});

  
  