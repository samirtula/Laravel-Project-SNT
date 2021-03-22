document.addEventListener('DOMContentLoaded', function () {
    /*Проверям на пустые поля и соответствие регулярному выражению полей формы, а также соответствие пароля и повтора пароля*/
    const form = document.getElementById('authorization');
    form.addEventListener('submit', function (e) {
        if (formValidate(form)) e.preventDefault();

        /* Обрываем логику если есть путые поля */

        function formValidate(form) {
            let error = 0;
            let formReq = document.querySelectorAll('.request');

            for (let i = 0; i < formReq.length; i++) {
                const input = formReq[i];
                formRemoveError(input);
                if (input.classList.contains('auth_email')) {
                    if (emailTest(input)) {
                        formAddError(input);
                        error++;
                    }
                } else if (input.classList.contains('auth_password')) {
                    let val = document.querySelector('.auth_password').value;
                    if (val.length < 6) {
                        formAddError(input);
                        error++;
                    }
                } else {
                    if (input.value === '') {
                        formAddError(input);
                        error++;
                    }
                }
            }
            return error;
        }

        function formAddError(input) {
            input.classList.add('error');
        }

        function formRemoveError(input) {
            input.classList.remove('error');
        }

        function emailTest(input) {
            return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
        }
    });
});
