let element = document.getElementById("jumbotron");
      let opacity = 0;
      function fade() {
         if (opacity >= 1) {
            return;
         }
         opacity += 0.01;
         element.style.opacity = opacity;
         requestAnimationFrame(fade);
      }
      requestAnimationFrame(fade);