<?php
$flag = $_POST["flag"];
$key = $_GET["key"];

if ($flag) {
    $key = md5(trim($flag));
    header("Location: badge.php?key=$key");
}
if (!$key) {
    header("Location: index.php?error=No Key");
}

$solve = 0;
$points = 0;

if ($key) {
    $data = [
        "f90b2bf3f08ee628c09505ff309018ed" => ["solve" => 0, "points"=>1],
        "3f12301d8715a1371d2d776d25ea6ab6" => ["solve" => 1, "points"=>100],
        "948b1eb046c96865a05808660ee99e10" => ["solve" => 2, "points"=>200],
        "4a2932632b3eb256e44cf9b0728911b4" => ["solve" => 3, "points"=>300],
        "f1d6ca5572e0c012239bcf4a8f797be1" => ["solve" => 4, "points"=>400],
        "080b5d5fcaf13167d2e7e8871fdc8ded" => ["solve" => 5, "points"=>500],
        "c366d63edd4a35c9f8bea89e57401fef" => ["solve" => 6, "points"=>600],
        "9fac6046540f4972c60f458b94aacb1d" => ["solve" => 7, "points"=>700],
        "da781419d6bf02d0a580e48414b9cbde" => ["solve" => 8, "points"=>800],
        "973ded4b2381c28af6c24d3d670303c6" => ["solve" => 9, "points"=>900],
        "ba15475608ea3f8313825eec5dceac06" => ["solve" => 10, "points"=>1000],
        "3542630bd0bb5141d94e4b40930bd69d" => ["solve" => 11, "points"=>1100],
        "af3424cd215a6459494ae07eab33cb35" => ["solve" => 12, "points"=>1200],
        "24e9ce8f146f70b4189f1d2532a75208" => ["solve" => 13, "points"=>1300],
        "dd04640480d764ab09eea047cde749cd" => ["solve" => 14, "points"=>1400],
        "9c6afd807a15973b962cf3aee3dbe836" => ["solve" => 15, "points"=>1500],
        "246397ca184f8b03ac8fecf50ee1051e" => ["solve" => 16, "points"=>1600],
        "8717d728f2de96beb8123c0cca28a728" => ["solve" => 17, "points"=>1700],
        "be40bcd25e7487440a64b13cd32049b2" => ["solve" => 18, "points"=>1800],
        "d80f13d1ab714f7864c2a9ef56c5f767" => ["solve" => 19, "points"=>1900],
        "c1f93b6ee2e1cd25ea02f9a78c364b12" => ["solve" => 20, "points"=>2000],
        "a4afd1fffb0b662d849a6907767f0625" => ["solve" => 21, "points"=>2100],
        "6c0810c1568645bcf58da67a1db6e3e7" => ["solve" => 22, "points"=>2200],
        "497784f7a3314f8aa5b8464432e30bbe" => ["solve" => 23, "points"=>2300],
        "b915cb528c4b3d6fc4644f73ba8b829d" => ["solve" => 24, "points"=>2400]
    ];

    $entry = $data[$key];
    $solve = $entry["solve"];
    $points = $entry["points"];
}
?>

<html lang="">
    <head>
        <meta property="og:title" content="Solved challenge <?= $solve ?> from Advent of CTF!" />
        <meta property="og:description" content="I have solved day <?= $solve ?> of Advent of CTF" />
        <meta property="og:image" content="https://badges.adventofctf.com/badges/<?= $key ?>.png" />
        <meta property="og:image:width" content="700" />
        <meta property="og:image:height" content="360" />
        <meta property="og:url" content="https://badges.adventofctf.com/badge.php?key=<?= $key ?>&share=1" />
        <meta property="og:type" content="game.achievement" />
        <meta property="game:points" content="<?= $points ?>" />
        <meta property="article:author" content="Advent of CTF" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@adventofctf">
        <meta name="twitter:creator" content="@credmp">
        <meta name="twitter:title" content="Challenge <?= $solve ?> solved!">
        <meta name="twitter:description" content="I have solved day <?= $solve ?> of Advent of CTF. It was worth <?= $points ?> points. Come join the fun at https://www.adventofctf.com">
        <meta name="twitter:image" content="https://badges.adventofctf.com/badges/<?= $key ?>.png">

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF Badge</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
         .tooltip {
             position: relative;
             display: inline-block;
         }

         .tooltip .tooltiptext {
             visibility: hidden;
             width: 140px;
             background-color: #555;
             color: #fff;
             text-align: center;
             border-radius: 6px;
             padding: 5px;
             position: absolute;
             z-index: 1;
             bottom: 150%;
             left: 50%;
             margin-left: -75px;
             opacity: 0;
             transition: opacity 0.3s;
         }

         .tooltip .tooltiptext::after {
             content: "";
             position: absolute;
             top: 100%;
             left: 50%;
             margin-left: -5px;
             border-width: 5px;
             border-style: solid;
             border-color: #555 transparent transparent transparent;
         }

         .tooltip:hover .tooltiptext {
             visibility: visible;
             opacity: 1;
         }
        </style>
    </head>
    <body>
        <div class="jumbotron bg-transparent mb-0 radius-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">Badge</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 mx-auto">

                <div class="card">
                    <img class="card-img-top" src="/badges/<?= $key ?>.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">You solved challenge <?= $solve ?>!</h4>
                        <?php
                        if (!$_GET["share"]) {
                        ?>
                            <p class="card-text">Congratulations, you earned it. Be sure to share this badge on social media! There is nothing like boasting about finishing a challenge before your friends did!</p>
                            <a href="https://twitter.com/intent/tweet?text=I just solved challenge <?= $solve ?> on Advent of CTF @adventofctf&url=https%3A%2F%2Fbadges%2Eadventofctf%2Ecom%2Fbadge%2Ephp%3Fkey%3D<?= $key ?>%26share=1&hashtags=ctf,advent,hack" class="btn btn-info" target=_blank><span class="fab fa-twitter mr-2"></span> Share on twitter</a>
                            <a class="btn btn-primary" onclick="myCopy()" onmouseout="outFunc()"><span class="far fa-copy mr-2"></span> <span class="tooltiptext" id="myTooltip">Copy share URL</span></a>

                        <?php
                        } else {
                        ?>
                            <p class="card-text">There is nothing like boasting about finishing a challenge before your friends did!</p>
                            <a href="https://www.adventofctf.com" class="btn btn-warning"><span class="fas fa-play mr-2"></span> Join the fun, play the Advent of CTF</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
         function myCopy() {
             /* Get the text field */
             var theText = "https://badges.adventofctf.com/badge.php?key=<?=$key?>&share=1" ;
             var hiddenCopy = document.createElement('div');
             //set the innerHTML of the div
             hiddenCopy.innerHTML = theText;
             //set the position to be absolute and off the screen
             hiddenCopy.style.position = 'absolute';
             hiddenCopy.style.left = '-9999px';

             //check and see if the user had a text selection range
             var currentRange;
             if(document.getSelection().rangeCount > 0)
             {
                 //the user has a text selection range, store it
                 currentRange = document.getSelection().getRangeAt(0);
                 //remove the current selection
                 window.getSelection().removeRange(currentRange);
             }
             else
             {
                 //they didn't have anything selected
                 currentRange = false;
             }

             //append the div to the body
             document.body.appendChild(hiddenCopy);
             //create a selection range
             var CopyRange = document.createRange();
             //set the copy range to be the hidden div
             CopyRange.selectNode(hiddenCopy);
             //add the copy range
             window.getSelection().addRange(CopyRange);

             //since not all browsers support this, use a try block
             try
             {
                 //copy the text
                 document.execCommand('copy');
                 var tooltip = document.getElementById("myTooltip");
                 tooltip.innerHTML = "Badge URL copied";
             }
             catch(err)
             {
                 window.alert("Your Browser Doesn't support this! Error : " + err);
             }
             //remove the selection range (Chrome throws a warning if we don't.)
             window.getSelection().removeRange(CopyRange);
             //remove the hidden div
             document.body.removeChild(hiddenCopy);

             //return the old selection range
             if(currentRange)
             {
                 window.getSelection().addRange(currentRange);
             }
         }
         function outFunc() {
             var tooltip = document.getElementById("myTooltip");
             tooltip.innerHTML = "Copy share URL";
         }
        </script>
    </body>
</html>
