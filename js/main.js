let ready = $(document).ready(function() {
    $('.header').height($(window).height());

    $(".navbar a").click(function () {
        $("body,html").animate({
            scrollTop: $("#" + $(this).data('value')).offset().top
        }, 1000)

    })

    $('span[id="Send"]').click(function () {
        const result = confirm('Вы действительно хотите отправить данные?');
        if (result) {
            $('#result').text('Вы дали согласие на отправку данных');
            // document.querySelector('#result').textContent = 'Вы дали согласие на отправку данных';
            document.location.reload();
        } else {
            document.querySelector('#result').textContent = 'ну и не надо';
        }
    })
    $('a[id="linkOne"]').click(function(){
        window.open('https://coderoad.ru/');
    });
    $('a[id="linkTwo"]').click(function(){
        window.open('https://github.com/dmlc');
    });
    $('a[id="linkThree"]').click(function(){
        window.open('https://coderoad.ru/6483638/%D0%9E%D1%82%D0%BA%D1%80%D1%8B%D1%82%D0%B8%D0%B5-%D0%BD%D0%BE%D0%B2%D0%BE%D0%B9-%D0%B2%D0%BA%D0%BB%D0%B0%D0%B4%D0%BA%D0%B8-%D0%B2-JS');
    });

})
