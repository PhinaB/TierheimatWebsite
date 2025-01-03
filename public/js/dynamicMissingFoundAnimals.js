document.addEventListener("DOMContentLoaded", function(){
    checkLoginStatus();
})

function checkLoginStatus(){
    fetch('../public/checkLogin')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn){
                document.getElementById('formContainer').innerHTML = data.form;
                initializeFormEventListeners();
            }
            else{
                document.getElementById('reportContainer').innerHTML= data.report;
            }
        })
        .catch(error =>{
            document.getElementById('errorContainer').textContent = 'Ein Fehler ist aufgetreten';
        });
}