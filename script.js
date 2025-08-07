document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('.admin-btn');
    if (button) {
      button.addEventListener('click', () => {
        window.location.href = 'admin/login.php';
      });
    }
  });