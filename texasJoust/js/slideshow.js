var mygallery=new fadeSlideShow({
	wrapperid: "homeSlideshow", //ID of blank DIV on page to house Slideshow
	dimensions: [238, 331], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
            ["img/newSlideshow/BE3E9572.jpg"],
            ["img/newSlideshow/BE3E9629.jpg"],
            ["img/newSlideshow/BE3E9631.jpg"],
            ["img/newSlideshow/LystsFriday-253.jpg"],
            ["img/newSlideshow/LystsFriday-261.jpg"],
            ["img/newSlideshow/LystsFriday-262.jpg"],
            ["img/newSlideshow/LystsFriday-265.jpg"],
            ["img/newSlideshow/LystsFriday-305.jpg"],
            ["img/newSlideshow/LystsFriday-322.jpg"],
            ["img/newSlideshow/LystsFriday-344.jpg"],
            ["img/newSlideshow/LystsFriday-345.jpg"],
            ["img/newSlideshow/LystsFriday-354.jpg"],
            ["img/newSlideshow/LystsFriday-365.jpg"],
            ["img/newSlideshow/LystsFriday-372.jpg"],
            ["img/newSlideshow/LystsFriday-382.jpg"],
            ["img/newSlideshow/LystsFriday-383.jpg"],
            ["img/newSlideshow/LystsFriday-386.jpg"],
            ["img/newSlideshow/LystsSaturday-158.jpg"],
            ["img/newSlideshow/LystsSaturday-163.jpg"],
            ["img/newSlideshow/LystsSaturday-173.jpg"],
            ["img/newSlideshow/LystsSaturday-182.jpg"],
            ["img/newSlideshow/LystsSaturday-183.jpg"],
            ["img/newSlideshow/LystsSaturday-187.jpg"],
            ["img/newSlideshow/LystsSaturday-273.jpg"],
            ["img/newSlideshow/LystsSaturday-299.jpg"],
            ["img/newSlideshow/LystsSaturday-303.jpg"],
            ["img/newSlideshow/LystsSaturday-410.jpg"],
            ["img/newSlideshow/LystsSaturday-419.jpg"],
            ["img/newSlideshow/LystsSaturday-420.jpg"],
            ["img/newSlideshow/LystsSaturday-421.jpg"],
            ["img/newSlideshow/LystsSaturday-458.jpg"],
            ["img/newSlideshow/LystsSaturday-481.jpg"],
            ["img/newSlideshow/LystsSaturday-512.jpg"],
            ["img/newSlideshow/euleReady.jpg"],
            ["img/newSlideshow/lances.jpg"],
            ["img/newSlideshow/luckyMC.jpg"],
            ["img/newSlideshow/shinyHelm.jpg"],
            ["img/newSlideshow/tink.jpg"]
        ],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:true, randomize:true},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})
