function findExplicitParentElement (element, searchedClassName) {
    while ((element = element.parentElement) && !element.classList.contains(searchedClassName));
    return element;
}