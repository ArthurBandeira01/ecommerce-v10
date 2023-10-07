<p>Dear {{$admin->name}}</p>
<p>
    We are received a request to reset the password for Laravel Ecommerce associeted with {{$admin->email}}.
    You can reset your password clicking the button below:
    <br>
    <a href="{{$actionLink}}" target="_blank" style="color: #fff;display:inline-block;background-color:#22bc66;
    text-decoration:none;border-color:#22bc66;border-style:solid;border-width:5px 10px;border-radius:3px;
    box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box;
    margin-top:15px;margin-bottom:15px;">
        Reset your password
    </a>
    <br>
    <b>NB:</b> This link will valid within 15 minutes
    <br>
    If you did not request for a password reset, please ignore this email.
</p>
