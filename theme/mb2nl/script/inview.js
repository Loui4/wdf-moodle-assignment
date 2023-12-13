/**
 * author Remy Sharp
 * url http://remysharp.com/2009/01/26/element-in-view-event-plugin/
 * fork https://github.com/zuk/jquery.inview
 */var factory;(factory=function(t){var e,i,n,o=[],l=document,a=window,f=l.documentElement;function h(){if(o.length){var n,h,r,d=0,c=t.map(o,function(t){var e=t.data.selector,i=t.$element;return e?i.find(e):i});for(e=e||(!(r={height:a.innerHeight,width:a.innerWidth}).height&&((n=l.compatMode)||!t.support.boxModel)&&(r={height:(h="CSS1Compat"===n?f:l.body).clientHeight,width:h.clientWidth}),r),i=i||{top:a.pageYOffset||f.scrollTop||l.body.scrollTop,left:a.pageXOffset||f.scrollLeft||l.body.scrollLeft};d<o.length;d++)if(t.contains(f,c[d][0])){var s=t(c[d]),g={height:s[0].offsetHeight,width:s[0].offsetWidth},p=s.offset(),u=s.data("inview");if(!i||!e)return;p.top+g.height>i.top&&p.top<i.top+e.height&&p.left+g.width>i.left&&p.left<i.left+e.width?u||s.data("inview",!0).trigger("inview",[!0]):u&&s.data("inview",!1).trigger("inview",[!1])}}}t.event.special.inview={add:function(e){o.push({data:e,$element:t(this),element:this}),!n&&o.length&&(n=setInterval(h,250))},remove:function(t){for(var e=0;e<o.length;e++){var i=o[e];if(i.element===this&&i.data.guid===t.guid){o.splice(e,1);break}}o.length||(clearInterval(n),n=null)}},t(a).on("scroll resize scrollstop",function(){e=i=null}),!f.addEventListener&&f.attachEvent&&f.attachEvent("onfocusin",function(){i=null})})(jQuery);
