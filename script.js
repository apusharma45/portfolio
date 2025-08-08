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
});
