<!-- 
    Live Code Editor 
    By: Coding Design

    You can do whatever you want with the code. However if you love my content, you can subscribed my YouTube Channel
    🌎link: www.youtube.com/codingdesign
 -->
<?php
    include 'code_samples.php'; //file that contains all the code samples

    // LEARN HTML
    if (isset($_GET['learn_html'])){
        //Each sample in the tutorial have input value and that value is its variable's index in the array below
        // array of variables of samples

        // Assign the input value to variable id
        $id = $_GET['learn_html'];

        // html tutorial samples
        $arr_html= array($html0, $html1, $html2, $html3, $html4, $html5, $html6, $html7, $html8, $html9, $html10, $html11);
    }

    // LEARN CSS
    if (isset($_GET['learn_css'])){
        $id = $_GET['learn_css'];

        $arr_html = array($html_css0, $html_css1, $html_css2, $html_css3, $html_css4, $html_css5, $html_css6, $html_css7, $html_css8, $html_css9, $html_css10, $html_css11, $html_css12, $html_css13, $html_css14, $html_css15, $html_css16, $html_css17, $html_css18, $html_css19);
        $arr_css = array($css0, $css1, $css2, $css3, $css4, $css5, $css6, $css7, $css8, $css9, $css10, $css11, $css12, $css13, $css14, $css15, $css16, $css17, $css18, $css19);
    }

    if (isset($_GET['learn_js'])){
        $id = $_GET['learn_js'];

        $arr_html = array($html_js0, $html_js1, $html_js2, $html_js3, $html_js4, $html_js5, $html_js6, $html_js7, $html_js8, $html_js9, $html_js10, $html_js11, $html_js12, $html_js13, $html_js14, $html_js15, $html_js16, $html_js17, $html_js18, $html_js19, $html_js20);
        $arr_js_css = array($js_css3, $js_css3, $js_css3, $js_css3, $js_css4, $js_css5, $js_css6, $js_css7, $js_css8, $js_css9, $js_css10, $js_css11, $js_css12, $js_css13, $js_css14, $js_css15, $js_css16, $js_css17, $js_css18, $js_css19, $js_css20);
        $arr_js = array($js0, $js1, $js2, $js3, $js4, $js5, $js6, $js7, $js8, $js9, $js10, $js11, $js12, $js13, $js14, $js15, $js16, $js17, $js18, $js19, $js20);
    }
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Code Editor</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
</head>

<style>
        :root {
        --dark-blue: #003a8c;
        --blue: #3b6ca4;
        --light-blue: rgb(74, 225, 255);
        --pink: rgb(255, 40, 113);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
    
        
        font-family: Consolas;
        background-image: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(70,196,252,1) 100%);

            display: flex;
            justify-content: center;
            align-items: center;
        }

    .code-editor {
        
        width: 100vw;
        height: 100vh;
        display: grid;
        grid-template-columns: 50% 50%;
        background-color: #fff;
    overflow: hidden;
    resize: horizontal;
        
    }


        
        



        .code {
            display: grid;

            grid-template-rows: repeat(10, 2fr);
            overflow-y: auto;
            
            background-color: var(--dark-blue);
            padding: 1rem;
            
            
            
        }

    h1 {
        font: 500 1.1rem sans-serif;
        font-weight: bold;
        margin-top: 50px;
        color: #fff;
        

            
        }

        h1 > img {
            width: 1.3rem;
            margin-right: 1rem;
            
            vertical-align: middle;
            
        }

    .code textarea {
        width: 100%;
        margin-top:20px;
        height: calc(11rem - 3rem);
        background-color: var(--blue);
        color: white;
        border: none;
        padding: 1rem;
        resize: vertical;
        font-size:16px;
        border:solid 1px #7595BF;
        margin: 0 auto;
        
        

            
        }

        .code textarea::-webkit-scrollbar {
            width: .4rem;
        }
        .code textarea::-webkit-scrollbar-thumb {
            background-color: var(--pink);
            border-radius: .4rem;
        }

        #result {
            width: 100%;
            height: 100%;
            border: none;
        }

        a {

            color: #fff;
        
        }


        #img{
            margin-left:20px;
            
        }


        html-code{
            margin-top:-50px;
        }



    .html-code{
        margin-top: -45px;
    }

    .css-code{
        margin-top: -40px;
    }

    .js-code{
        margin-top: -35px;
    }

    #img1{
        width:120px;
        margin-top:-10px;
        
    }


    #bck{
        font-family: sans-serif;
        color: white;
        font-weight: bold;
        font-size: 1rem;
        margin-top:-50px;
        margin-left:480px;
        padding: 0 10px 0 0;
        margin: 0 auto;
    position: absolute;
        left:480px;
    }

    .button {
    border: none;
    color: white;
    padding: 5px 20px;
    text-align: center;
    display: inline-block;
    font-size: 15px;
    font-family:  sans-serif;
    transition-duration: 0.4s;
    cursor: pointer;
    
    }

    .button1 {
    background-color: white; 
    color: #003a8c; 
    border: 2px solid white;
    position: absolute;
    margin: 0 auto;
    bottom: 0px;
    left:1010px;
    

    }

    .button1:hover {
    background-color: #003a8c;
    color: white;
    }



    /** SCREENS */

    /** Iphone */

    @media only screen and (max-width: 375px) {
    
    #bck{
        margin-left:-480px;
        position: relative;
    }
    

    .code textarea {
        padding: 0;
    }


    .button1{
    margin-left: -910px;
    margin-bottom: 45px;
    position: absolute;
    }

    .html-code{
            margin-top: -30px;
        }
    }

    @media only screen and (min-width: 384px) and (max-height: 854px)  {
    
        #bck{
        margin-left:-480px;
        position: relative;
    }

    .button1{
    margin-left: -905px;
    margin-bottom: 215px;
    position: absolute;
    }
    
        
    }
    
    @media only screen and (min-width: 412px) and (max-height: 732px) {
    
    #bck{
        margin-left:-480px;
        position: relative;
    }
    
    
    .code textarea {
        padding: 0;
    }
    
    
    .button1{
        margin-left: -895px;
    margin-bottom: 110px;
    }
    }

    @media only screen and (min-width: 1920px) and (max-height: 1080px) {
        .button1{
        margin-left:-160px;
        margin-top: 10px;
        position: relative;
    }

    #bck{
        margin-left:320px;
        position: absolute;
    }

    h1{
        font-size: 1rem;
    }

    .html-code{
            margin-top: -35px;
        }
        .css-code{
            margin-top: -35px;
        }
    }

</style>

<body>

    <!-- Code Editor -->
    <div class="code-editor">
        <div class="code">
		<a href="learn.php"><img id="img1" src="images/Blue BG Logo.png" alt=""></a>
		
		<h1 id="bck"><a href="learn.php">◄ Back to Tutorial</a></h1>
            <div class="html-code">
                <h1><img src="images/html_logo.png" alt="">HTML</h1>
                <textarea><?php
                            if(isset($_GET['learn_html']) || isset($_GET['learn_css']) || isset($_GET['learn_js'])){
                                echo "$arr_html[$id]"; // selecting user's chosen variable in array
                            }?></textarea>
            </div>
            <div class="css-code">
                <h1><img src="images/css_logo.png" alt="">CSS</h1>
                <textarea><?php
                            if (isset($_GET['learn_css'])){
                                echo $arr_css[$id];
                            }
                            
                            if (isset($_GET['learn_js'])){
                                echo $arr_js_css[$id];
                            }?></textarea>
            </div>
            <div class="js-code">
                <h1><img src="images/js_logo.png" alt="">JAVASCRIPT</h1>
                <textarea spellcheck="false"><?php
                                                if(isset($_GET['learn_js'])){
                                                    echo $arr_js[$id];
                                                } 
                                            ?></textarea>
                <button class="button button1"  onclick="run()"><b>Run</b></button>

            </div>
        </div>
        <iframe id="result"></iframe>
    </div>
	

    <script src="script.js"></script>
</body>
<script>
    const html_code = document.querySelector('.html-code textarea');
    const css_code = document.querySelector('.css-code textarea');
    const js_code = document.querySelector('.js-code textarea');
    const result = document.querySelector('#result');

    // Run code editor
    function run() {
        /*
        // Storing data in Local Storage
        localStorage.setItem('html_code', html_code.value);
        localStorage.setItem('css_code', css_code.value);
        localStorage.setItem('js_code', js_code.value);
        */

        // Executing HTML, CSS & JS code
        result.contentDocument.body.innerHTML = `<style>${css_code.value}</style>` + html_code.value;
        result.contentWindow.eval(js_code.value);
    }

    // Checking if user is typing anything in input field
    html_code.onkeyup = () => run();
    css_code.onkeyup = () => run();
    js_code.onkeyup = () => run();


    // Accessing data stored in Local Storage. To make it more advanced you could check if there is any data stored in Local Storage.
    //html_code.value = localStorage.html_code;
    //css_code.value = localStorage.css_code;
    //js_code.value = localStorage.js_code;
</script>
</html>