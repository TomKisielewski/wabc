
		jQuery(document).ready(function(){
                var $tksdSelector = jQuery('#TKfootercontent');
								var $tksdSelector2 = jQuery('#TKcontent');
		var $step=0;
                var $collection=[];
								var $collection2=[];
                $collection=jQuery($tksdSelector).find('.tk-block');
								$collection2=jQuery($tksdSelector2).find('.tk-block');
                console.log($collection);
								console.log($collection2);
                jQuery($collection).each(function(i,e){
                    $step= i;
                    jQuery(e).addClass("footer-anim-" + $step);

                    console.log($step);
                    console.log($tksdSelector);

                });
								jQuery($collection2).each(function(i,e){
                    $step= i;
                    jQuery(e).addClass("top-anim-" + $step);

                    console.log($step);
                    console.log($tksdSelector2);

                });

                });
