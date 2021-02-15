const cardsWrapper = document.querySelector('.cards'),
    closeFormBtn = document.querySelector('.buy-form__close'),
    formWrapper = document.querySelector('.buy');

closeFormBtn.addEventListener('click', (e) => { // Закрытие формы при клике на "Х"  
    closeForm();
});
formWrapper.addEventListener('click', (e) => { // Закрытие формы при клике на серую область вокруг формы 
    if (e.target.className == 'buy'){
        closeForm();
    }
});Ы
function openForm() { // Открытие формы
    formWrapper.style.display = 'flex';
}
function closeForm() { // Очистка формы и закрытие
    const formInput = formWrapper.querySelector('table').querySelectorAll('input');
    formInput.forEach((input) => {
        input.value = '';
    })
    formWrapper.style.display = 'none';
}