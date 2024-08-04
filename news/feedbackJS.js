function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

$('#contactForm').on('submit', function(event) {
    event.preventDefault();
    
    let isValid = true;

    const fields = [
        { id: 'fullName', errorMessage: 'Пожалуйста, введите ваше ФИО.' },
        { id: 'address', errorMessage: 'Пожалуйста, введите ваш адрес.' },
        { id: 'phone', errorMessage: 'Пожалуйста, введите корректный номер телефона.' },
        { id: 'email', errorMessage: 'Пожалуйста, введите корректный e-mail.' },
    ];

    fields.forEach((field) => {
        const input = $('#' + field.id);
        const errorSpan = $('#error' + capitalizeFirstLetter(field.id));
        
        if (!input.val()) {
            errorSpan.text(field.errorMessage);
            errorSpan.show();
            input.addClass('error');
            isValid = false;
        } else {
            errorSpan.text('');
            errorSpan.hide();
            input.removeClass('error');
        }
    });

    if (isValid) {
        const formData = $(this).serialize(); 

        $.ajax({
            url: 'feedbackPHP.php', 
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#feedbackTable').html(response); 
                $('#contactForm')[0].reset(); 
            },
            error: function() {
                alert('Ошибка при отправке данных. Попробуйте еще раз.');
            }
        });
    }
});