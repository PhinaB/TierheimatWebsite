function openWeiterlesenField (buttonElement, className) {
    let allFieldsReadMore = document.querySelectorAll('.completeWeiterlesen');
    for (let i = 0; i < allFieldsReadMore.length; i++) {
        allFieldsReadMore[i].classList.add('hidden');
    }

    let allFields = document.querySelectorAll('.'+className);
    for (let i = 0; i < allFields.length; i++) {
        allFields[i].style.opacity = 0.4;
    }

    let thisDiv = findExplicitParentElement(buttonElement, className);
    thisDiv.nextSibling.classList.remove('hidden');

    window.scrollTo({left: 0, top: 0, behavior: 'smooth'});
}

function closeWeiterlesenField (buttonElement, className) {
    let thisDiv = findExplicitParentElement(buttonElement, 'completeWeiterlesen');
    thisDiv.classList.add('hidden');

    let allFields = document.querySelectorAll('.'+className);
    for (let i = 0; i < allFields.length; i++) {
        allFields[i].style.opacity = 1;
    }
}