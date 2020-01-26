jQuery(document).ready(function($){
	//copyright JGA 2013 under MIT License
	var monster={set:function(e,t,n,r){var i=new Date,s="",o=typeof t,u="";r=r||"/",n&&(i.setTime(i.getTime()+n*24*60*60*1e3),s="; expires="+i.toGMTString());if(o==="object"&&o!=="undefined"){if(!("JSON"in window))throw"Bummer, your browser doesn't support JSON parsing.";u=JSON.stringify({v:t})}else u=escape(t);document.cookie=e+"="+u+s+"; path="+r},get:function(e){var t=e+"=",n=document.cookie.split(";"),r="",i="",s={};for(var o=0;o<n.length;o++){var u=n[o];while(u.charAt(0)==" ")u=u.substring(1,u.length);if(u.indexOf(t)===0){r=u.substring(t.length,u.length),i=r.substring(0,1);if(i=="{"){s=JSON.parse(r);if("v"in s)return s.v}return r=="undefined"?undefined:unescape(r)}}return null},remove:function(e){this.set(e,"",-1)},increment:function(e,t){var n=this.get(e)||0;this.set(e,parseInt(n,10)+1,t)},decrement:function(e,t){var n=this.get(e)||0;this.set(e,parseInt(n,10)-1,t)}};

	if (monster.get('cookieinfo') === 'true') {
		return false;
	}

	$('.content').prepend('<div id="cookieinfo" class="cookie-alert"><p>Ta strona wykorzystuje pliki cookies.</p><a href="//dev.przywory.eu/polityka-prywatnosci#Cookies">Więcej informacji.</a><button>OK</button></div>');


	$("#cookieinfo button").on("click", function() {

		monster.set('cookieinfo', 'true', 365);
		$('#cookieinfo').remove();

	});

	return true;
});