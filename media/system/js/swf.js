<<<<<<< HEAD
Swiff.Uploader=new Class({Extends:Swiff,Implements:Events,options:{path:"Swiff.Uploader.swf",target:null,zIndex:9999,height:30,width:100,callBacks:null,params:{wMode:"opaque",menu:"false",allowScriptAccess:"always"},typeFilter:null,multiple:true,queued:true,verbose:false,url:null,method:null,data:null,mergeData:true,fieldName:null,fileSizeMin:1,fileSizeMax:null,allowDuplicates:false,timeLimit:(Browser.Platform.linux)?0:30,buttonImage:null,policyFile:null,fileListMax:0,fileListSizeMax:0,instantStart:false,appendCookieData:false,fileClass:null},initialize:function(b){this.addEvent("load",this.initializeSwiff,true).addEvent("select",this.processFiles,true).addEvent("complete",this.update,true).addEvent("fileRemove",function(d){this.fileList.erase(d)}.bind(this),true);this.setOptions(b);if(this.options.callBacks){Hash.each(this.options.callBacks,function(e,d){this.addEvent(d,e)},this)}this.options.callBacks={fireCallback:this.fireCallback.bind(this)};var c=this.options.path;if(!c.contains("?")){c+="?noCache="+$time()}this.options.container=this.box=new Element("span",{"class":"swiff-uploader-box"}).inject($(this.options.container)||document.body);this.target=$(this.options.target);if(this.target){var a=window.getScroll();this.box.setStyles({position:"absolute",visibility:"visible",zIndex:this.options.zIndex,overflow:"hidden",height:1,width:1,top:a.y,left:a.x});this.parent(c,{params:{wMode:"transparent"},height:"100%",width:"100%"});this.target.addEvent("mouseenter",this.reposition.bind(this,[]));this.addEvents({buttonEnter:this.targetRelay.bind(this,["mouseenter"]),buttonLeave:this.targetRelay.bind(this,["mouseleave"]),buttonDown:this.targetRelay.bind(this,["mousedown"]),buttonDisable:this.targetRelay.bind(this,["disable"])});this.reposition();window.addEvent("resize",this.reposition.bind(this,[]))}else{this.parent(c)}this.inject(this.box);this.fileList=[];this.size=this.uploading=this.bytesLoaded=this.percentLoaded=0;if(Browser.Plugins.Flash.version<9){this.fireEvent("fail",["flash"])}else{this.verifyLoad.delay(1000,this)}},verifyLoad:function(){if(this.loaded){return}if(!this.object.parentNode){this.fireEvent("fail",["disabled"])}else{if(this.object.style.display=="none"){this.fireEvent("fail",["hidden"])}else{if(!this.object.offsetWidth){this.fireEvent("fail",["empty"])}}}},fireCallback:function(b,a){if(b.substr(0,4)=="file"){if(a.length>1){this.update(a[1])}var e=a[0];var c=this.findFile(e.id);this.fireEvent(b,c||e,5);if(c){var d=b.replace(/^file([A-Z])/,function(g,f){return f.toLowerCase()});c.update(e).fireEvent(d,[e],10)}}else{this.fireEvent(b,a,5)}},update:function(a){$extend(this,a);this.fireEvent("queue",[this],10);return this},findFile:function(b){for(var a=0;a<this.fileList.length;a++){if(this.fileList[a].id==b){return this.fileList[a]}}return null},initializeSwiff:function(){this.remote("initialize",{width:this.options.width,height:this.options.height,typeFilter:this.options.typeFilter,multiple:this.options.multiple,queued:this.options.queued,url:this.options.url,method:this.options.method,data:this.options.data,mergeData:this.options.mergeData,fieldName:this.options.fieldName,verbose:this.options.verbose,fileSizeMin:this.options.fileSizeMin,fileSizeMax:this.options.fileSizeMax,allowDuplicates:this.options.allowDuplicates,timeLimit:this.options.timeLimit,buttonImage:this.options.buttonImage,policyFile:this.options.policyFile});this.loaded=true;this.appendCookieData()},targetRelay:function(a){if(this.target){this.target.fireEvent(a)}},reposition:function(a){a=a||(this.target&&this.target.offsetHeight)?this.target.getCoordinates(this.box.getOffsetParent()):{top:window.getScrollTop(),left:0,width:40,height:40};this.box.setStyles(a);this.fireEvent("reposition",[a,this.box,this.target])},setOptions:function(a){if(a){if(a.url){a.url=Swiff.Uploader.qualifyPath(a.url)}if(a.buttonImage){a.buttonImage=Swiff.Uploader.qualifyPath(a.buttonImage)}this.parent(a);if(this.loaded){this.remote("setOptions",a)}}return this},setEnabled:function(a){this.remote("setEnabled",a)},start:function(){this.fireEvent("beforeStart");this.remote("start")},stop:function(){this.fireEvent("beforeStop");this.remote("stop")},remove:function(){this.fireEvent("beforeRemove");this.remote("remove")},fileStart:function(a){this.remote("fileStart",a.id)},fileStop:function(a){this.remote("fileStop",a.id)},fileRemove:function(a){this.remote("fileRemove",a.id)},fileRequeue:function(a){this.remote("fileRequeue",a.id)},appendCookieData:function(){var a=this.options.appendCookieData;if(!a){return}var c={};document.cookie.split(/;\s*/).each(function(d){d=d.split("=");if(d.length==2){c[decodeURIComponent(d[0])]=decodeURIComponent(d[1])}});var b=this.options.data||{};if($type(a)=="string"){b[a]=c}else{$extend(b,c)}this.setOptions({data:b})},processFiles:function(f,d,a){var c=this.options.fileClass||Swiff.Uploader.File;var b=[],e=[];if(f){f.each(function(h){var g=new c(this,h);if(!g.validate()){g.remove.delay(10,g);b.push(g)}else{this.size+=h.size;this.fileList.push(g);e.push(g);g.render()}},this);this.fireEvent("selectSuccess",[e],10)}if(d||b.length){b.extend((d)?d.map(function(g){return new c(this,g)},this):[]).each(function(g){g.invalidate().render()});this.fireEvent("selectFail",[b],10)}this.update(a);if(this.options.instantStart&&e.length){this.start()}}});$extend(Swiff.Uploader,{STATUS_QUEUED:0,STATUS_RUNNING:1,STATUS_ERROR:2,STATUS_COMPLETE:3,STATUS_STOPPED:4,log:function(){if(window.console&&console.info){console.info.apply(console,arguments)}},unitLabels:{b:[{min:1,unit:"B"},{min:1024,unit:"kB"},{min:1048576,unit:"MB"},{min:1073741824,unit:"GB"}],s:[{min:1,unit:"s"},{min:60,unit:"m"},{min:3600,unit:"h"},{min:86400,unit:"d"}]},formatUnit:function(a,h,b){var f=Swiff.Uploader.unitLabels[(h=="bps")?"b":h];var c=(h=="bps")?"/s":"";var e,d=f.length,j;if(a<1){return"0 "+f[0].unit+c}if(h=="s"){var g=[];for(e=d-1;e>=0;e--){j=Math.floor(a/f[e].min);if(j){g.push(j+" "+f[e].unit);a-=j*f[e].min;if(!a){break}}}return(b===false)?g:g.join(b||", ")}for(e=d-1;e>=0;e--){j=f[e].min;if(a>=j){break}}return(a/j).toFixed(1)+" "+f[e].unit+c}});Swiff.Uploader.qualifyPath=(function(){var a;return function(b){(a||(a=new Element("a"))).href=b;return a.href}})();Swiff.Uploader.File=new Class({Implements:Events,initialize:function(b,a){this.base=b;this.update(a)},update:function(a){return $extend(this,a)},validate:function(){var a=this.base.options;if(a.fileListMax&&this.base.fileList.length>=a.fileListMax){this.validationError="fileListMax";return false}if(a.fileListSizeMax&&(this.base.size+this.size)>a.fileListSizeMax){this.validationError="fileListSizeMax";return false}return true},invalidate:function(){this.invalid=true;this.base.fireEvent("fileInvalid",this,10);return this.fireEvent("invalid",this,10)},render:function(){return this},setOptions:function(a){if(a){if(a.url){a.url=Swiff.Uploader.qualifyPath(a.url)}this.base.remote("fileSetOptions",this.id,a);this.options=$merge(this.options,a)}return this},start:function(){this.base.fileStart(this);return this},stop:function(){this.base.fileStop(this);return this},remove:function(){this.base.fileRemove(this);return this},requeue:function(){this.base.fileRequeue(this)}});
=======
Swiff.Uploader=new Class({Extends:Swiff,Implements:Events,options:{path:"Swiff.Uploader.swf",target:null,zIndex:9999,callBacks:null,params:{wMode:"opaque",menu:"false",allowScriptAccess:"always"},typeFilter:null,multiple:!0,queued:!0,verbose:!1,height:30,width:100,passStatus:null,url:null,method:null,data:null,mergeData:!0,fieldName:null,fileSizeMin:1,fileSizeMax:null,allowDuplicates:!1,timeLimit:Browser.Platform.linux?0:30,policyFile:null,buttonImage:null,fileListMax:0,fileListSizeMax:0,instantStart:!1,
appendCookieData:!1,fileClass:null},initialize:function(a){this.addEvent("load",this.initializeSwiff,!0).addEvent("select",this.processFiles,!0).addEvent("complete",this.update,!0).addEvent("fileRemove",function(a){this.fileList.erase(a)}.bind(this),!0);this.setOptions(a);this.options.callBacks&&Hash.each(this.options.callBacks,function(a,b){this.addEvent(b,a)},this);this.options.callBacks={fireCallback:this.fireCallback.bind(this)};a=this.options.path;a.contains("?")||(a+="?noCache="+$time());this.options.container=
this.box=(new Element("span",{"class":"swiff-uploader-box"})).inject($(this.options.container)||document.body);if(this.target=$(this.options.target)){var b=window.getScroll();this.box.setStyles({position:"absolute",visibility:"visible",zIndex:this.options.zIndex,overflow:"hidden",height:1,width:1,top:b.y,left:b.x});this.parent(a,{params:{wMode:"transparent"},height:"100%",width:"100%"});this.target.addEvent("mouseenter",this.reposition.bind(this,[]));this.addEvents({buttonEnter:this.targetRelay.bind(this,
["mouseenter"]),buttonLeave:this.targetRelay.bind(this,["mouseleave"]),buttonDown:this.targetRelay.bind(this,["mousedown"]),buttonDisable:this.targetRelay.bind(this,["disable"])});this.reposition();window.addEvent("resize",this.reposition.bind(this,[]))}else this.parent(a);this.inject(this.box);this.fileList=[];this.size=this.uploading=this.bytesLoaded=this.percentLoaded=0;Browser.Plugins.Flash.version<9?this.fireEvent("fail",["flash"]):this.verifyLoad.delay(1E3,this)},verifyLoad:function(){this.loaded||
(this.object.parentNode?this.object.style.display=="none"?this.fireEvent("fail",["hidden"]):this.object.offsetWidth||this.fireEvent("fail",["empty"]):this.fireEvent("fail",["disabled"]))},fireCallback:function(a,b){if(a.substr(0,4)=="file"){b.length>1&&this.update(b[1]);var e=b[0],d=this.findFile(e.id);this.fireEvent(a,d||e,5);if(d){var f=a.replace(/^file([A-Z])/,function(a,b){return b.toLowerCase()});d.update(e).fireEvent(f,[e],10)}}else this.fireEvent(a,b,5)},update:function(a){$extend(this,a);
this.fireEvent("queue",[this],10);return this},findFile:function(a){for(var b=0;b<this.fileList.length;b++)if(this.fileList[b].id==a)return this.fileList[b];return null},initializeSwiff:function(){this.remote("xInitialize",{typeFilter:this.options.typeFilter,multiple:this.options.multiple,queued:this.options.queued,verbose:this.options.verbose,width:this.options.width,height:this.options.height,passStatus:this.options.passStatus,url:this.options.url,method:this.options.method,data:this.options.data,
mergeData:this.options.mergeData,fieldName:this.options.fieldName,fileSizeMin:this.options.fileSizeMin,fileSizeMax:this.options.fileSizeMax,allowDuplicates:this.options.allowDuplicates,timeLimit:this.options.timeLimit,policyFile:this.options.policyFile,buttonImage:this.options.buttonImage});this.loaded=!0;this.appendCookieData()},targetRelay:function(a){this.target&&this.target.fireEvent(a)},reposition:function(a){a=a||this.target&&this.target.offsetHeight?this.target.getCoordinates(this.box.getOffsetParent()):
{top:window.getScrollTop(),left:0,width:40,height:40};this.box.setStyles(a);this.fireEvent("reposition",[a,this.box,this.target])},setOptions:function(a){if(a){if(a.url)a.url=Swiff.Uploader.qualifyPath(a.url);if(a.buttonImage)a.buttonImage=Swiff.Uploader.qualifyPath(a.buttonImage);this.parent(a);this.loaded&&this.remote("xSetOptions",a)}return this},setEnabled:function(a){this.remote("xSetEnabled",a)},start:function(){this.fireEvent("beforeStart");this.remote("xStart")},stop:function(){this.fireEvent("beforeStop");
this.remote("xStop")},remove:function(){this.fireEvent("beforeRemove");this.remote("xRemove")},fileStart:function(a){this.remote("xFileStart",a.id)},fileStop:function(a){this.remote("xFileStop",a.id)},fileRemove:function(a){this.remote("xFileRemove",a.id)},fileRequeue:function(a){this.remote("xFileRequeue",a.id)},appendCookieData:function(){var a=this.options.appendCookieData;if(a){var b={};document.cookie.split(/;\s*/).each(function(a){a=a.split("=");a.length==2&&(b[decodeURIComponent(a[0])]=decodeURIComponent(a[1]))});
var e=this.options.data||{};$type(a)=="string"?e[a]=b:$extend(e,b);this.setOptions({data:e})}},processFiles:function(a,b,e){var d=this.options.fileClass||Swiff.Uploader.File,f=[],c=[];a&&(a.each(function(a){var b=new d(this,a);b.validate()?(this.size+=a.size,this.fileList.push(b),c.push(b),b.render()):(b.remove.delay(10,b),f.push(b))},this),this.fireEvent("selectSuccess",[c],10));if(b||f.length)f.extend(b?b.map(function(a){return new d(this,a)},this):[]).each(function(a){a.invalidate().render()}),
this.fireEvent("selectFail",[f],10);this.update(e);this.options.instantStart&&c.length&&this.start()}});
$extend(Swiff.Uploader,{STATUS_QUEUED:0,STATUS_RUNNING:1,STATUS_ERROR:2,STATUS_COMPLETE:3,STATUS_STOPPED:4,log:function(){window.console&&console.info&&console.info.apply(console,arguments)},unitLabels:{b:[{min:1,unit:"B"},{min:1024,unit:"kB"},{min:1048576,unit:"MB"},{min:1073741824,unit:"GB"}],s:[{min:1,unit:"s"},{min:60,unit:"m"},{min:3600,unit:"h"},{min:86400,unit:"d"}]},formatUnit:function(a,b,e){var d=Swiff.Uploader.unitLabels[b=="bps"?"b":b],f=b=="bps"?"/s":"",c;c=d.length;var g;if(a<1)return"0 "+
d[0].unit+f;if(b=="s"){f=[];for(c-=1;c>=0;c--)if(g=Math.floor(a/d[c].min))if(f.push(g+" "+d[c].unit),a-=g*d[c].min,!a)break;return e===!1?f:f.join(e||", ")}for(c-=1;c>=0;c--)if(g=d[c].min,a>=g)break;return(a/g).toFixed(1)+" "+d[c].unit+f}});Swiff.Uploader.qualifyPath=function(){var a;return function(b){(a||(a=new Element("a"))).href=b;return a.href}}();
Swiff.Uploader.File=new Class({Implements:Events,initialize:function(a,b){this.base=a;this.update(b)},update:function(a){return $extend(this,a)},validate:function(){var a=this.base.options;if(a.fileListMax&&this.base.fileList.length>=a.fileListMax)return this.validationError="fileListMax",!1;if(a.fileListSizeMax&&this.base.size+this.size>a.fileListSizeMax)return this.validationError="fileListSizeMax",!1;return!0},invalidate:function(){this.invalid=!0;this.base.fireEvent("fileInvalid",this,10);return this.fireEvent("invalid",
this,10)},render:function(){return this},setOptions:function(a){if(a){if(a.url)a.url=Swiff.Uploader.qualifyPath(a.url);this.base.remote("xFileSetOptions",this.id,a);this.options=$merge(this.options,a)}return this},start:function(){this.base.fileStart(this);return this},stop:function(){this.base.fileStop(this);return this},remove:function(){this.base.fileRemove(this);return this},requeue:function(){this.base.fileRequeue(this)}});
>>>>>>> upstream/master
