document.querySelectorAll('.animsition-link').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const href = this.getAttribute('href');
  
      const currentPage = document.querySelector('.animsition');
      currentPage.classList.add('page-exit-active');
  
      setTimeout(() => {
        window.location.href = href;
      }, 500); // Animasyon süresi kadar bekle
    });
  });
  