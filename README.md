<h1>Enclave - LESS Framework</h1>
<p>
A MIXIN framework built with LESS. 
</p>
<p>
You will need <a href="http://nodejs.org/">Node</a> and <a href="http://lesscss.org/">LESS</a> to compile Enclave. Enclave is composed of all mixins, so the compiled version in the dist folder is just for example purposes. You will need to import the enclave.less into your main less file that you compile for your project.
</p>
<h2>Screen Width Sizes Currently Supported</h2>
<ul>
<li>240</li>
<li>320</li>
<li>360</li>
<li>480</li>
<li>533</li>
<li>568</li>
<li>600</li>
<li>603</li>
<li>640</li>
<li>768</li>
<li>800</li>
<li>853</li>
<li>900</li>
<li>966</li>
<li>1024</li>
<li>1050</li>
<li>1080</li>
<li>1200</li>
<li>1280</li>
<li>1366</li>
<li>1440</li>
<li>1600</li>
<li>1680</li>
<li>1920</li>
</ul>

<h3>
How to install with <a href="http://bower.io/">Bower</a>
</h3>

<code>
bower install antfuentes87/enclave
</code>

<h3>
How to compile with LESSWatch
</h3>

<p>
I forked <a href="https://github.com/jonycheung/Dead-Simple-LESS-Watch-Compiler">jonycheung/Dead-Simple-LESS-Watch-Compiler</a> and modified it so it could compile out to a single file.
This way you can have one main less file that has imports of all the other less files. So when you go compile that main less file with all the imports, it creates one CSS file from all
your LESS files. A example of this would be to import Enclave and Bootstrap into one main LESS file. Then use my modified LESS compiler to produce one compressed CSS file.
</p>

<p>
Install <a href="https://github.com/antfuentes87/lesswatch">antfuentes87/lesswatch</a> by using bower.
</p>

<code>
bower install antfuentes87/lesswatch
</code>

<p>
Then run lesswatch with node to watch whatever directory you want and compile out to whatever CSS file you want.
</p>

<code>
npm PATH_TO_LESSWATCH/lwc.js INPUT_FOLDER OUTPUT_FOLDER INPUT_FILE OUTPUT_FILE
</code>

<strong>
Example
</strong>

<code>
npm bower_components/lesswatch/lwc.js LESS CSS main.less main.css
</code>