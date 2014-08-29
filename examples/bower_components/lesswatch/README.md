Less Watch
===================

A nodejs script that allows you to watch folders and sub folders for changes and compiles the load.less into the load.css. We did this so we can watch entire directory (with sub folders), but only compile one CSS file. Seems to be working great, will be making updates and clean up the code so there is no hard values inside.

###Prerequisites
Install LESS (http://www.lesscss.org/) and make sure the `lessc` binary is accessible to the script. Installing LESS with the `--global` flag will make the binary accessible to your system.
```
npm install less --global
```

###Usage 
```
node less-watch-compiler.js FOLDER_TO_WATCH FOLDER_TO_OUTPUT
```
###Example 
`"node less-watch-compiler.js less css"` will watch the `./less` folder and compile the LESS CSS files into `./css` when they are added/changed.


