$("#login-form").on('submit',function (e){
    e.preventDefault();
    window.axios.post(this.closest("#login-form").getAttribute('action'),$(this).serialize()).then(r => {
        if(r.data.status === "success"){
            $(".alert").show().html('Успешно!!');
            setTimeout(function (){
                window.location.reload();
            },2500);
        } else {
            $(".alert").show().html(r.data.msg);
        }
    }).catch(e => console.log(e.data.msg));
});

$(".auth-variant").on('click',function (e){
    e.preventDefault();
    $(".auth-variant").removeClass('active');
    $(this).addClass('active');
    $(".auth-button").html( this.hasAttribute('reg') ? "Зарегистрироваться" : "Войти");
    $('.modal-footer label').toggleClass('hidden');
    $(this.closest("#login-form")).attr('action', this.hasAttribute('reg') ? "/reg" : "/auth")
})
$(".link-catalog").on('click',function (e){
    e.preventDefault();
    const prod = $(this).data('product');
    window.axios.post('/add_order',{
        product:prod
    });
})
$("#order-form").on('submit',function (e){
    e.preventDefault();
    const comment = $("#comment-area").val();
    window.axios.post('/set_comment_order',{
        comment:comment
    }).then(r => {
        if(r.data.status === 'success'){
            $(".alert-danger").hide();
            $(".alert-success").show();
        } else {
            $(".alert-success").hide();
            $(".alert-danger").show();
        }
    })
});
