const modalWindow = document.querySelector('.modal-window');
const buttonDiscount = document.querySelector('.main__button');
const buttonClose = document.querySelector('.modal-window__close');

buttonDiscount.addEventListener('click', function() {
    modalWindow.classList.remove('hidden');
})

buttonClose.addEventListener('click', function() {
    modalWindow.classList.add('hidden');
})

modalWindow.addEventListener('click', function() {
    modalWindow.classList.add('hidden');
})