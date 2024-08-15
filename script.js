document.querySelectorAll('.menu-link').forEach(link => {
  link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetPage = e.target.getAttribute('href');

      document.body.classList.add('page-transition');

      setTimeout(() => {
          window.location.href = targetPage;
      }, 600); // CSS animasyonu ile eşleşen süre
  });
});
