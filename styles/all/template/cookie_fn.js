;(function($, document)
{
	'use strict';

	$(document).ready(function ()
	{
		var cookieName		= phpbbCookieName + '_ca';
    	var cookieAccept	= getCookie(cookieName);

    	if (cookieAccept != true)
		{
			$('.cookieAcceptBox').addClass(cookieClass);
        	$('.cookieAcceptBox').html(cookieText + '<a href="' + cookiePage + '">' + cookieLink + '</a> <a href="#">' + acceptText + '</a>');

			// Set the css elements from the variables
			$('.cookieAcceptBox').css({
				'background-color': cookieBoxBgColour,
				'color': cookieBoxTxtColour,
				'border': cookieBoxBdWidth + 'px solid' + cookieBoxBdColour
			});

			$('.cookieAcceptBox a').css('color', cookieBoxHrefColour);

        	$('.cookieAcceptBox').fadeIn(300);
        	$('.cookieAcceptBox a').click(function ()
			{
				if ($(this).is('[href*=#]'))
				{
            		$(".cookieAcceptBox").fadeOut(300);
            		setCookie(cookieName);
				}
				location.reload(true);
        	})
    	}

		//Set the custom css colours when on the Cookie Page
		if (cookieCustomPage == true)
		{
			$('#page-body').css({'background-color': cookiePageBgColour, 'color': cookiePageTxtColour, 'padding': '5px'});
			$('h3').css('color', cookiePageTxtColour);
		}
	});

	function setCookie(cookieName)
	{
		'use strict';

		var expire		= '';
        var expireDate	= new Date();
		var expireTime	= 60 * 60 *24 * 365 * 1000; // Set default to one year

		if (cookieExpires == false)
		{
			expireTime = expireTime * 10; // Set to ten years
		}

        expireDate.setTime(expireDate.getTime() + expireTime);
        expire = '; expires=' + expireDate.toGMTString();

    	document.cookie = cookieName + '=1' + expire + '; path=/';

		return null;
	}

	function getCookie(cookieName)
	{
		'use strict';

    	var name	= cookieName + "=";
    	var chunk	= document.cookie.split(";");

    	for (var i = 0; i < chunk.length; i++)
		{
        	var element = chunk[i];
        	while (element.charAt(0) == " ")
			{
        		element = element.substring(1, element.length);
			}
        	if (element.indexOf(name) == 0) {
        		return element.substring(name.length, element.length);
			}
    	}
    	return null;
	}

})(jQuery, document);
