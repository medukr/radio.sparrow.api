<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body {
            font-size: 16px;
            font-family: sans-serif;
        }

        .container{
            border: 1px solid red;
            max-width: 1200px;
            margin: auto;
        }

        .header{
            background: darkslategrey;
            box-sizing: border-box;
            color: white;
            text-align: center;
        }

        .content{
            border: 1px solid orange;
        }
        .footer {
            border: 1px solid blueviolet;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
           <h1 class="text"><?= $message ?></h1>
        </div>
        <nav class="navbar">
            <p>menu?</p>
        </nav>
        <main class="content">
            <p>Content</p>
        </main>
        <footer class="footer">
          <p>Footer</p>
        </footer>
    </div>
</body>
</html>