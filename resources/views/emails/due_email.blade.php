<html>
<head>
    <title>email</title>
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
        .main-panel{
            width:1000px;
            margin:0 auto;
        }
        .block-header-pdf{
            display:flex;
            justify-content: space-between;
            margin: 40px 0px;
        }
        .block-header-pdf .brand-logo-mini{
            width:25px;
        }
        .block-header-pdf .brand-logo-mini img{
            width:45px;
        }
        .pdf-heading{
            text-align:center;
        }
        .pdf-heading h4{
            font-size:30px;
            margin:0
        }
        .pdf-email{
            display:flex;
        }
        .pdf-email div{
            display:flex;
        }
        .pdf-email div h6{
            font-size:18px
        }
        .pdf-email div h6,p{
            margin:0
        }
        .email-block p{
            margin-bottom:10px;
        }
        .email-signature{

            width:30%;

            margin: 20px 0;

        }
        .email-signature img{

            width:100%;

        }
        .disclaimer{
            font-size:16px;
            font-style:italic;
            margin-top:20px;
            font-weight:light;
        }
        .disclaimer-brief{
            font-size:12px;
            font-style:italic;
            font-weight:light;
            line-height:20px;
        }
    </style>
</head>
<body>
<div class="main-panel">
    <div class="email-block">
        <h4>Dear {{$setting->admission->user->name}},</h4>
        <h4>Greetings!</h4>
        <p>Your fee payment date has been exceeded so we would like to request you to make your payment to continue your class and access resources. Thank You!</p>
        <h4>Best Regards,</h4>
        <p>Sagina Prajapati</p>
        <p>Administrative Services Officer</p>
        <div class="email-signature">
            <img src="{{url('images/email_signature.png')}}" alt="es">
        </div>
        <p class="disclaimer">Disclaimer:</p>
        <p class="disclaimer-brief">Any unauthorized use or disclosure of this email is strictly prohibited and may be unlawful. The views and opinions expressed in this email message are of the individual sender except where the sender is acting on the specific authority of ExtraTech Pty Ltd by nature of the employees' functions & responsibility/authority. If you have received this email in error, please advise the sender by reply email and destroy all copies of the original message (including attachments, if any), if you are not the intended recipient of this communication.</p>
    </div>
</div>
</body>
</html>
