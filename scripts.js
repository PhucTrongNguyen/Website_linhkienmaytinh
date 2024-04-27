const hamburger = document.querySelector("#toggle-btn")

hamburger.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("expand");
})

function showInsert() {
    document.getElementById('formInsert').style.display="block";
}

$(document).ready(function() {
    $('.buttonUpdate').on('click', 'i', function() {

        var paramValue = $(this).data('id');
        $('.formUpdate').show();
        $('#paramet').val(paramValue);
    })

})

function closeForm() {
    document.getElementById('formInsert').style.display="none";
    document.getElementById('formUpdate').style.display="none";
}