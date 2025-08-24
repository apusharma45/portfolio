let boxes = document.querySelectorAll(".progress-box");

load_bars = () => {
  boxes.forEach(box => {
    let line = box.querySelector(".line");
    let increasing_percentage = box.querySelector(".increasing-percentage");
    let total_percentage = box.querySelector(".total-percentage");
    let p = 0;
    let my_interval = setInterval(() => {
      p++;
      line.style.width = p + "%";
      increasing_percentage.innerHTML = p + "%";
      if (increasing_percentage.innerHTML == total_percentage.innerHTML) {
        clearInterval(my_interval);
      }
    }, 25);

  });
}

document.addEventListener('DOMContentLoaded', () => {
  const typed = new Typed('#typed', {
    strings: ['Aspiring Web Developer'],
    typeSpeed: 50,
    backSpeed: 25,
    loop: false,
    showCursor: true,
    cursorChar: '|',
    onComplete: (self) => {
      self.cursor.remove();
    }
  });
  
  setTimeout(() => {
    load_bars();
  }, 1000);
});


const contactBtn = document.getElementById("contact-btn");
const contactForm = document.getElementById("contact-form");

contactBtn.addEventListener("click", () => {
  if (contactForm.style.display === "flex") {
    contactForm.style.display = "none";
    contactForm.setAttribute("aria-hidden", "true");
  } else {
    contactForm.style.display = "flex";
    contactForm.setAttribute("aria-hidden", "false");
  }
});



