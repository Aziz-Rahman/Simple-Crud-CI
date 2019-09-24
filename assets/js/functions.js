$(function(){
	// LEFT MENU
	$('#sidebar-menu li ul').slideUp();
    $('#sidebar-menu li').removeClass('active');

    $('#sidebar-menu li').on('click', function() {
        var link = $('a', this).attr('href');

        if(link) { 
            window.location.href = link;
        } else {
            if ($(this).is('.active')) {
                $(this).removeClass('active');
                $('ul', this).slideUp();
            } else {
                $('#sidebar-menu li').removeClass('active');
                $('#sidebar-menu li ul').slideUp();
                
                $(this).addClass('active');
                $('ul', this).slideDown();
            }
        }
    });
    
    $('#menu_toggle').click(function () {
        
        $('table').css({"width": "100%"});
        
        if ($('body').hasClass('nav-md')) {
            $('body').removeClass('nav-md').addClass('nav-sm');
            $('.left_col').removeClass('scroll-view').removeAttr('style');
            $('.my-left-ok').addClass('scroll-view-2');
            $('.sidebar-footer').hide();

            if ($('#sidebar-menu li').hasClass('active')) {
                $('#sidebar-menu li.active').addClass('active-sm').removeClass('active');
            }

            $('.img-responsive').hide();
            $('.img-responsive-2').show();
            $('.img_icon').css({"width": "45px"});
            
        } else {

            $('.img-responsive').show();
            $('.img-responsive-2').hide();
            $('.img_icon').css({"width": "20px"});
            
            $('body').removeClass('nav-sm').addClass('nav-md');
            $('.sidebar-footer').show();

            $('.my-left-ok').removeClass('scroll-view-2');
            $('.my-left-ok').addClass('scroll-view').css({"overflow": "hidden", "outline": "none", "cursor": "-webkit-grab"});

            if ($('#sidebar-menu li').hasClass('active-sm')) {
                $('#sidebar-menu li.active-sm').addClass('active').removeClass('active-sm');
            }
        }
    });

    // Sidebar Menu active class
    var url = window.location;
    $('#sidebar-menu a[href="' + url + '"]').parent('li').addClass('current-page');
    $('#sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');

	/** ******  /LEFT MENU  *********************** **/

    // right_col height flexible
    $(".right_col").css("min-height", $(window).height());
	$(window).resize(function () {
	    $(".right_col").css("min-height", $(window).height());
	});


    
    // $(".scroll-view-2").niceScroll({
    //     touchbehavior: true,
    //     cursorcolor: "rgba(42, 63, 84, 0.35)"
    // });

    // Datepicker
 //    $('.datepicker').datepicker({
	//     format: 'yyyy/mm/dd',
	//     autoclose: true,
	//     // startDate: '-3d'
	// });

    // Select
	// $(".select2_single").select2({
	// 	placeholder: "Select an item",
	// 	allowClear: true
	// });
	// $(".select2_group").select2({});
	// $(".select2_multiple").select2({
	// 	maximumSelectionLength: 2,
	// 	placeholder: "Max peminjaman 2 buku",
	// 	allowClear: true
	// });

	// Table
	$('#my-table').DataTable( {
        "order": [[ 0, "desc" ]]
    });
	// Table2
	$('#my-table-2').DataTable( {
        "order": [[ 0, "asc" ]]
    });

	var em = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	var numb = /^\d+$/; // /^[0-9]+$/;
	var file = /(\.jpg|\.jpeg|\.png)$/i;
	var alphabeth = /^[A-Za-z ]+$/;


	// hide info alert
    $('.info-alert').delay(10000).fadeOut(500);

	// Load functions
    $(window).load(function() {
        $("#preloader").fadeOut("slow");  // Loader pages
    });
	
});