document.addEventListener('DOMContentLoaded', function () {
    /*Проверям на пустые поля и соответствие регулярному выражению полей формы, а также соответствие пароля и повтора пароля*/
    const form = document.querySelectorAll('.forms');
    console.log(form)
    form.forEach(function (element) {
        element.addEventListener('submit', function (e) {
            if (formValidate(element)) e.preventDefault();

            /* Обрываем логику если есть путые поля */

            function formValidate(element) {
                let error = 0;
                let formReq = element.querySelectorAll('.req');

                for (let i = 0; i < formReq.length; i++) {
                    const input = formReq[i];
                    formRemoveError(input);
                    if (input.classList.contains('email')) {
                        if (emailTest(input)) {
                            formAddError(input);
                            error++;
                        }

                    } else if (input.classList.contains('tel')) {
                        if (numTest(input)) {
                            formAddError(input);
                            error++;
                        }
                    } else if (input.classList.contains('password')) {
                        let val = document.querySelector('.password').value;
                        if (val.length < 6) {
                            formAddError(input);
                            error++;
                        }
                    } else if (input.classList.contains('confirm')) {
                        let val = document.querySelector('.confirm').value;
                        let passVal = document.querySelector('.password').value;
                        if (val !== passVal || val === '') {
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

            function numTest(input) {
                return !/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test(input.value);
            }

        })
    })
});
