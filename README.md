# padList2htmlList
A php script that transform a Framapad list into html/css list.

# Getting Started
In `index.php`, replace the variable `$padUrl` by the url of your pad:  
`$padUrl = "https://lite6.framapad.org/p/JcA306Aere";`

# Pad syntax
So far, here are the option available:  
  `###############################################` -> Delete everything before  
  `--------------------text here--------------------` -> If centered in the page and "code" style = first level menu / if left aligned and bold style = second level menu / if no style = hide content  
  `%%%%%%%%%%` -> associate content with first level menu  
  `**********`  -> associate with second level menu  

  Italic style, bold style and urls can be associated with particular style
  
# Live demo
Se [http://interstices.io/repertoire/](http://interstices.io/repertoire/) for a list or ressources about alternatives, autonomy, politic, etc build in a Framapad.

# Styling
padList2htmlList uses [Stylus](http://learnboost.github.io/stylus/) to compile CSS.
