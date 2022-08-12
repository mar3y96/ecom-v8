<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>verification message</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        /*start message*/
        .message {
            max-width: 550px;
            margin: auto
        }

        .message .brand-logo {
            border-bottom: 1px solid #dedede;
        }

        .message .brand-logo img {
            background-color: #E1A10C;
            padding: 10px;
            margin: 10px auto;
            display: block;
            border-radius: 4px;

        }

        .message .message-body {
            padding: 30px;
        }

        .message .message-body h2 {
            font-size: 27px;
            color: #484848;
        }

        .message .message-body h3,
        .message .message-body p {
            color: #3e3e3e;
            font-weight: 500;
            font-size: 15px;
            margin: 18px 0;
        }

        .message .message-body p a {
            color: #3e3e3e;
        }

        .message .message-body button {
            display: block;
            margin: 38px auto;
            color: #fff;
            background-color: #111D37;
            font-size: 20px;
            font-weight: 500;
            border-radius: 28px;
        }
        .message .message-body button a {
            font-size: 20px;
            font-weight: 500;
            padding: 10px 63px;
        }

        .btn:focus {
            box-shadow: none
        }

        .message .message-body p:last-of-type {
            margin: 30px 0
        }

        .message .message-body .need-help {
            margin: 46px 0 0px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 24px;
        }

        .message .message-body .need-help h5 {
            font-weight: 500;
            color: #a0a0a0;
        }

        .message .message-body .need-help span {
            display: block;
            font-weight: 400;
            color: #a9a9a9;
        }

        .message .message-footer p {
            color: #a9a9a9;
        }

        .message .message-footer .fab {
            color: #fff;
            background-color: red;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 21px;
            line-height: 49px;
            margin-left: 11px;
        }

        .message .message-footer a .fa-facebook-f {
            background-color: #3b5998
        }

        .message .message-footer a .fa-twitter {
            background-color: #1da1f2;
        }

        /*end message*/

    
    </style>
</head>

<body>
	<section class="message">
		<div class="container">
			<div class="brand-logo">
				<img src="http://boxstoreseg.com/site/image/logo.png" alt="logo" >
			</div>
			<div class="message-body">
				<h2 class="text-capitalize">hi ,{{ $email }}!</h2>
				<h3>We have a new product for you</h3>
                <h3>You can see it here</h3>
                <button style="padding: 0%" class="btn"><a  class="btn" style="text-decoration: none; color: inherit; width: 100%" href="{{ url('product', [$product]) }}">see product</a></button>
                    
				<p>You can cancel your product follow-up from <a href="{{ url('subscribe/cancel', [$email]) }}">here</a></p>
				
			</div>
			<div class="message-footer text-center">
				<p>@boxstore limited  {{ settings()->address_en }}</p>
				<p class="social-media">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
				</p>
			</div>
		</div>
	</section>
</body>

</html>
