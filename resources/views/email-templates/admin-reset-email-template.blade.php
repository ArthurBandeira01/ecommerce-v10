<p>Dear {{$admin->name}}</p>
<br>
<p>
    Your password on Laravel Ecommerce system was changed successfully.
    Here is your new login credentials:
    <br>
    <b>Login ID: </b>{{$admin->username}} or {{$admin->email}}
    <br>
    <b>Password: </b>{{$new_password}}
</p>
<br>
Please, keep tour credendentials confidential. Your username and password are your own credentials and you should never share them with anybody else.
<p>
    Laravel Ecommerce will not liable for any misuse of your username or password.
</p>
<br>
-------------------------------------------------------------------------
<p>
    This email was automatically sent by Laravel Ecommerce system. Do not reply it.
</p>
