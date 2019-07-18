<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="/css/style.css"> <!-- Resource style -->
    <script src="/js/modernizr.js"></script> <!-- Modernizr -->
</head>
<body>
<title>Radio.Sparrow.API</title>
<main>
    <div class="cd-image-block">
        <ul class="cd-images-list">
            <li class="is-selected">
                <a href="#0">
                    <h2>Hello, this is Radio.Sparrow.API</h2>
                </a>
            </li>

            <li>
                <a href="#0">
                    <h2>Categories</h2>
                </a>
            </li>

            <li>
                <a href="#0">
                    <h2>Countries</h2>
                </a>
            </li>

            <li>
                <a href="#0">
                    <h2>Stations</h2>
                </a>
            </li>
        </ul> <!-- .cd-images-list -->
    </div> <!-- .cd-image-block -->

    <div class="cd-content-block">
        <ul>
            <li class="is-selected">
                <div>
                    <h2>Usegade</h2>

                    <p style="font-weight: bold">
                        Curl: http://get.radio.sparrow.in.ua/{tag}/{action}?{get_params}&{pagination}&token=[your_token]
                    </p>

                    <p style="font-weight: bold">
                        Required get parameter token=[your_token]
                    </p>

                    <p>You can use <span style="font-weight: bold">85ba37970e24fb1017669c536535211695f5805c27ec640f2028527d573892bd</span>
                        as token
                    </p>
                    <p>
                        <span style="font-weight: bold">Pagination:</span> optional
                    </p>

                    <p>Pagination params: <span style="font-weight: bold">page</span>, <span style="font-weight: bold">per_page</span>
                    </p>

                    <p><span style="font-weight: bold">Default pagination:</span> page = 0, per_page = 20</p>


                    <p><span style="font-weight: bold">Response</span> - JSON</p>


                </div>
            </li>

            <li>
                <div>
                    <h2>Get categories</h2>

                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/{action}?{get_params}&token=[your_token]
                    </p>


                    <h3><span style="font-weight: bold">All</span> categories:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Primary</span> categories:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/primary?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3>Stations from category <span style="font-weight: bold">id</span>:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/stations?id={category_id}&token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>
                </div>
            </li>

            <li>
                <div>
                    <h2>Get Countries</h2>

                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/countries?token=[your_token]
                    </p>


                    <h3><span style="font-weight: bold">All</span> countries:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/countries?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        <pre>
[
    {
        "name": "Andorra",
        "country_code": "AD",
        "region": "Europe",
        "subregion": "Southern Europe"
    },
    {
        "name": "United Arab Emirates",
        "country_code": "AE",
        "region": "Asia",
        "subregion": "Western Asia"
    },
    ...
]
                        </pre>
                    </p>
                </div>
            </li>
            <li>
                <div>
                    <h2>Get Stations</h2>

                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/stations/{action}?{get_params}&token=[your_token]
                    </p>


                    <h3><span style="font-weight: bold">All</span> stations:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/stations?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Popular</span> stations:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/popular?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Similar</span> stations:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/similar?id={station_id}&token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Recent</span> stations:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/recent?token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Specific</span> stations:</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/specific?id={station_id}&token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Song history</span></h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/song_history?id={station_id}&token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>


                    <h3><span style="font-weight: bold">Search</span> stations</h3>
                    <p>
                        <span style="font-weight: bold">Curl:</span>
                        http://get.radio.sparrow.in.ua/categories/song_history?seqarch={query}&token=[your_token]
                    </p>
                    <p>
                        <span style="font-weight: bold">Response:</span>
                        JSON
                    </p>
                </div>
            </li>

        </ul>

        <button class="cd-close">Close</button>
    </div> <!-- .cd-content-block -->

    <ul class="block-navigation">
        <li>
            <button class="cd-prev inactive">&larr; Prev</button>
        </li>
        <li>
            <button class="cd-next">Next &rarr;</button>
        </li>
    </ul> <!-- .block-navigation -->
</main>    <!-- .cd-main -->

<script src="/js/jquery-2.1.4.js"></script>
<script src="/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>