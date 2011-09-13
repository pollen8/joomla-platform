<<<<<<< HEAD
var JCaption=new Class({initialize:function(b){this.selector=b;var a=$$(b);a.each(function(c){this.createCaption(c)},this)},createCaption:function(c){var b=document.createTextNode(c.title);var a=document.createElement("div");var e=document.createElement("p");var d=c.getAttribute("width");var f=c.getAttribute("align");if(!d){d=c.width}if(!f){f=c.getStyle("float")}if(!f){f=c.style.styleFloat}if(f==""||!f){f="none"}e.appendChild(b);e.className=this.selector.replace(".","_");c.parentNode.insertBefore(a,c);a.appendChild(c);if(c.title!=""){a.appendChild(e)}a.className=this.selector.replace(".","_");a.className=a.className+" "+f;a.setAttribute("style","float:"+f);a.style.width=d+"px"}});document.caption=null;window.addEvent("load",function(){var a=new JCaption("img.caption");document.caption=a});
=======
/*
		GNU General Public License version 2 or later; see LICENSE.txt
*/
var JCaption=new Class({initialize:function(a){this.selector=a;$$(a).each(function(a){this.createCaption(a)},this)},createCaption:function(a){var f=document.createTextNode(a.title),c=document.createElement("div"),d=document.createElement("p"),e=a.getAttribute("width"),b=a.getAttribute("align");if(!e)e=a.width;b||(b=a.getStyle("float"));if(!b)b=a.style.styleFloat;if(b==""||!b)b="none";d.appendChild(f);d.className=this.selector.replace(".","_");a.parentNode.insertBefore(c,a);c.appendChild(a);a.title!=
""&&c.appendChild(d);c.className=this.selector.replace(".","_");c.className=c.className+" "+b;c.setAttribute("style","float:"+b);c.style.width=e+"px"}});
>>>>>>> upstream/master
