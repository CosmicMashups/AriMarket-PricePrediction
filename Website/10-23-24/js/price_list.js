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