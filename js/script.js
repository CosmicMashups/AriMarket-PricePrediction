const searchInput = document.getElementById('search-input');
const searchButton = document.getElementById('search-button');   


searchButton.addEventListener('click', () => {
  const searchTerm = searchInput.value;   

  // Perform your search logic here, e.g., using AJAX to fetch data
  console.log('Search term:', searchTerm);
});



const priceList = document.querySelector('.price-list');

priceList.addEventListener('click', (event) => {
  const target = event.target;
  if (target.tagName === 'LI') {
    const activeItem = priceList.querySelector('.active');
    if (activeItem && activeItem !== target) {
      activeItem.classList.remove('active');
    }
    target.classList.toggle('active');
  }
});