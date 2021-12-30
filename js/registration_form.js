(function () {
    $(document).ready(function () {
        $('#sign-up-btn').click(function () {
            $('#registration-form').modal({show: true});
        });

        $('#sign-in-btn').click(function () {
            $('#authorization-form').modal({show: true});
        });

        $('#register-btn').click(function () {
            let name = document.getElementById('name').value;
            let password = document.getElementById('pwd').value;
            let repeat_password = document.getElementById('repeat_pwd').value;
            let email = document.getElementById("e-mail").value;
            let role_el = document.getElementById("roles");
            let role_val = role_el.options[role_el.selectedIndex].text;
            let user_data = null;

            if (password !== repeat_password) {
                alert('Password and Repeat password must be equal');
            } else {
                //let password_hash
                user_data = {
                    'name': name,
                    'password': password,
                    'email': email,
                    'role': role_val
                }
            }
            RegisterUser(user_data);
        });

    });

    function RegisterUser(user_data)
    {
        $.ajax({
            type: 'POST',
            url: 'register_user',
            data: ({'user_data': user_data}),
            success: function () {
                CloseRegistrationForm();
                alert('User is registered!');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert('Error! Some problems with registration');
            }

        });
    }

    function CloseRegistrationForm()
    {
        $('#close-btn').click();
    }

})();
