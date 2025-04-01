const dataB = JSON.parse(dataBase);
const productGrid = document.querySelector('.productGrid');

function gridRealize(array) {
    productGrid.innerHTML = '';
    array.forEach(element => {
        const productCard = document.createElement('div');
        productCard.classList.add('productCard');

        const productImg = document.createElement('img');
        productImg.classList.add('productCard__img');
        productImg.src = element.picture;

        const description = document.createElement('div');
        description.classList.add('description');

        const descriptionHeading = document.createElement('p');
        descriptionHeading.classList.add('description__heading');
        descriptionHeading.textContent = element.name;

        const descriptionText = document.createElement('p');
        descriptionText.classList.add('description__text');
        descriptionText.textContent = element.description;

        const descriptionPrice = document.createElement('p');
        descriptionPrice.classList.add('description__price');
        descriptionPrice.textContent = `$${element.price}`;

        description.appendChild(descriptionHeading);
        description.appendChild(descriptionText);
        description.appendChild(descriptionPrice);

        productCard.appendChild(productImg);
        productCard.appendChild(description);

        productGrid.appendChild(productCard);
    });
}

gridRealize(dataB);