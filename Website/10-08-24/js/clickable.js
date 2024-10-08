document.querySelectorAll('.clickable-item').forEach(function (item) {
    item.addEventListener('click', function () {
      // Toggle the 'active' class on the clicked <li>
      this.classList.toggle('active');
  
      // Toggle the visibility of the <ul> with class 'details'
      const details = this.querySelector('.details');
      if (details.style.display === 'block') {
        details.style.display = 'none';
      } else {
        details.style.display = 'block';
      }
    });
  });