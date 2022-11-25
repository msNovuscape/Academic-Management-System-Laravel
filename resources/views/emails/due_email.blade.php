<html>
<head>
    <style>
        *{
            margin:0;
            font-family: 'Nunito', sans-serif;
        }
        .email-template-sapphire{
            display: flex;
            justify-content: center;
            width:100%;
            height:100%;
            padding: 50px 0px;
            margin:0 auto;
        }
        .template-cover{
            background: #f8f6f6;
            padding:50px 100px;
            height:fit-content;
            border-radius:15px;
            position: relative;
        }
        h4{
            border-bottom: 1px solid #000;
            padding-bottom:20px;
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
        }
        .data{
            margin-top:20px;
        }
        .data p{
            color:#000;
        }
        .thank-you{
            margin-top: 20px;
            color:#fff;
        }
        .thank-you p:nth-child(2){
            margin-top: 15px;
        }
        .logo{
            height: 100% !important;
            width:100% !important;
            margin:0 auto;
        }
        .logo img{
            width:100% !important;
            margin-top: 20px;
        }
        .disclaimer{
            margin-top: 100px !important;
        }
        .disclaimer p{
            font-style: italic;
            font-weight:400;
            font-size:12px;
        }
        .disclaimer p:nth-child(2){
            margin-top:5px;
        }
        @media only screen and (min-width:769px) {
            .template-cover{
                padding:30px !important;
            }
            .disclaimer{
                margin-top: 30px !important;
            }
        }
    </style>
</head>
<body>
<div class="email-template-sapphire">
    <div class="template-cover">
        <h4>Extratech</h4>
        <div class="data">
            <p>Dear <b>{{$setting->admission->user->name}}</b>,</p>
        </div>
        <div class="data">
            <p>Please be advised that you’ve been temporarily removed from the Skype Learning Group as we haven’t received {{config('custom.installment_types')[$setting->batch_installment->installment_type]}} payment update from your side.</p>
        </div>
        <div class="data">
            <p>To be eligible to re-join the group, please update us on the payment status at your earliest convenience.</p>
        </div>
        <div class="data">
            <p>Please take a reference of the previous email for the payment process and details.</p>
        </div>
        <div class="data">
            <p>If you have any queries, please contact us at 02-9171 7742.</p>
        </div>
        <div class="data">
            <p> <strong>Best Regards,</strong> </p>
            <p>Bindu Bhandari</p>
            <p>Administrative Services Officer</p>
        </div>
        <div class="logo">
            <img src="{{url('images/logo-extratech.jpg')}}" alt="extratech">
        </div>
        <div class="disclaimer data">
            <p>
                Disclaimer:
            </p>
            <p>
                Any unauthorized use or disclosure of this email is strictly prohibited and may be unlawful. The views and opinions expressed in this email message are of the individual sender except where the sender is acting on the specific authority of ExtraTech Pty Ltd by nature of the employees' functions & responsibility/authority. If you have received this email in error, please advise the sender by reply email and destroy all copies of the original message (including attachments, if any), if you are not the intended recipient of this communication.
            </p>
        </div>
    </div>
</div>
</body>
</html>
