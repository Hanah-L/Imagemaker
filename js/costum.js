// $(document).ready(function() {

	/* jQuerry
	---------------------------*/
	
	//scroll
	let pageHieght=$("body").height();
	let windowHeight=$(window).height();
	
	let scrollLast = 0;

	$(window).scroll(function(){
		let scrollTop=$(this).scrollTop();
		let scrollPercent=Math.round((scrollTop/ (pageHieght - windowHeight))*100)+"%";
		let scrollNow = scrollTop;
		$(".progressBar").css("width", scrollPercent)

		if(scrollNow > scrollLast ){
			$(".js-header").addClass("active");
		}else{
			$(".js-header").removeClass("active");
		}
		scrollLast = scrollNow;
		// console.log(`scrollTop = ${scrollTop}`)

		if(scrollTop<974){
			console.log("case1")
			$(".js-1").siblings().removeClass("active").end().addClass("active")
		}else if(scrollTop<1867){
			$(".js-2").siblings().removeClass("active").end().addClass("active")
		}else if(scrollTop<3360){
			console.log("case3")
			$(".js-3").siblings().removeClass("active").end().addClass("active")
		}else if(scrollTop<5871){
			console.log("case4")
			$(".js-4").siblings().removeClass("active").end().addClass("active")
		}else if(scrollTop<7364){
			console.log("case5")
			$(".js-5").siblings().removeClass("active").end().addClass("active")
		}else{
			console.log("case6")
			$(".js-6").siblings().removeClass("active").end().addClass("active")
		}
	})

	// text
	$(".text").focus(function(){
		$(this).parent().find(".label-text").addClass("isActive")
	})
	$(".text").blur(function(){
		if($(this).val()==0) {
			$(this).parent().find(".label-text").removeClass("isActive")
		}   
	})

	// click
	$(".side-nav li").click(function(){
		$(this).siblings().removeClass("active").end().addClass("active")
	})

	$("#accordion a").click(function(){
		$(".content, a").removeClass("active");
		$(this).addClass("active").next(".content").addClass("active");
	});
	
	/* Plugin WOW initialize
	---------------------------*/
	new WOW().init();

	/* Plugin Fancybox 
	---------------------------*/
	$('[data-fancybox]').fancybox({
		loop : true
	})

	/* Plugin Stellar initialize
	---------------------------*/
	// if(screen.width > 768){
	// 	$(window).stellar();
	// }
	
// });