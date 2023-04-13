<!-- 
    Live Code Editor 
    By: Coding Design

    You can do whatever you want with the code. However if you love my content, you can subscribed my YouTube Channel
    🌎link: www.youtube.com/codingdesign
 -->
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Code Editor</title>
    <link rel="stylesheet" href="style.css">
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
    top:20px;
	

	
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
  padding: 10px 20px;
  text-align: center;
  text-decoration: bold;
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
  left:1030px;
  bottom:15px;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);

}

.button1:hover {
  background-color: #003a8c;
  color: white;
}

@media screen and (max-width: 450px) {
   
  #bck{
    margin-left:-470px;
    position: relative;
  }
 
  .html-code{
    top: 20px;
  }
  .button1{
  left:545px;
  bottom:15px;
  }
}
/** Iphone */
@media screen and (max-width: 380px) {
    .html-code{
        margin-top: -35px;
    }

    .html-code{
        margin-top: -35px;
    }
    .css-code{
        margin-top: -35px;
    }

    .button1{
  left:525px;
  bottom:15px;  ;
  }

  h1{
    font-size: 1rem;
  }

}

@media screen and (max-height: 900px) {
    .button1{
    margin-left:-460px;
    margin-top: 40px;
    position: relative;
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


    <div class="code-editor">
	
        <div class="code">
		<a href="learn.php"><img id="img1" src="images/Blue BG Logo.png" alt=""></a>
		
		<h1 id="bck"><a href="learn.php">◄ Back to Tutorial</a></h1>
            <div class="html-code">
                <h1><img src="images/html_logo.png" alt="">HTML</h1>
                <textarea></textarea>
            </div>
            <div class="css-code">
                <h1><img src="images/css_logo.png" alt="">CSS</h1>
                <textarea></textarea>
            </div>
            <div class="js-code">
                <h1><img src="images/js_logo.png" alt="">JAVASCRIPT</h1>
                <textarea spellcheck="false"></textarea>
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

function run() {
    // Storing data in Local Storage
    localStorage.setItem('html_code', html_code.value);
    localStorage.setItem('css_code', css_code.value);
    localStorage.setItem('js_code', js_code.value);

    // Executing HTML, CSS & JS code
    result.contentDocument.body.innerHTML = `<style>${localStorage.css_code}</style>` + localStorage.html_code;
    result.contentWindow.eval(localStorage.js_code);
}



// Accessing data stored in Local Storage. To make it more advanced you could check if there is any data stored in Local Storage.
html_code.value = localStorage.html_code;
css_code.value = localStorage.css_code;
js_code.value = localStorage.js_code;
</script>
</html>