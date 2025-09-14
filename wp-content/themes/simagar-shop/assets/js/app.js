jQuery(document).ready(function (){
    $('#btn-auth, #close-modal').click(function (e) { 
        e.preventDefault();
        $('.login-modal').toggleClass('show');
    });
});