jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        
        $('.nested-category').hide();
    
        
        $('.toggle-category').on('click', function (e) {
            e.preventDefault(); 
    
            
            const targetId = $(this).data('target'); 
            const $target = $('#' + targetId); 
    
            
            if ($target.is(':visible')) {
                $target.slideUp('normal', function () {
                    
                    $(this).siblings('.toggle-category').find('i')
                        .removeClass('fa-minus')
                        .addClass('fa-plus');
                });
            } else {
                $target.slideDown('normal', function () {
                    
                    $(this).siblings('.toggle-category').find('i')
                        .removeClass('fa-plus')
                        .addClass('fa-minus');
                });
            }
        });
    });
    $('form#profiles button[type="submit"]').hide();
    
    $('form#profiles select').change(function () {
        
        if ($(this).val() == 0) {
            
            $('#checkout').trigger('reset');
            return;
        }
        var data = new FormData($('form#profiles')[0]);
        $.ajax({
            url: '/basket/profile',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                if (data.profile === undefined) {
                    console.log('data undefined');
                }
                $('input[name="name"]').val(data.profile.name);
                $('input[name="email"]').val(data.profile.email);
                $('input[name="phone"]').val(data.profile.phone);
                $('input[name="address"]').val(data.profile.address);
                $('textarea[name="comment"]').val(data.profile.comment);
            },
            error: function (reject) {
                alert(reject.responseJSON.error);
            }
        });
    });
    $('form.add-to-basket').submit(function (e) {
        
        e.preventDefault();
        
        var $form = $(this);
        var data = new FormData($form[0]);
        $.ajax({
            url: $form.attr('action'),
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'HTML',
        });
    });
    $(document).ready(function () {
        
        $('.product-images-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        });
    
        
        $('.product-images-slider img').on('click', function () {
            const imageSrc = $(this).data('image'); 
            $('#imageModal img').attr('src', imageSrc); 
            $('#imageModal').modal('show'); 
        });
    });
    $(document).ready(function () {
        
        $('.product-images-slider').slick({
            dots: true, 
            infinite: true, 
            speed: 300, 
            slidesToShow: 1, 
            adaptiveHeight: true, 
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>', 
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>', 
        });

        
        $('.product-images-slider img').on('click', function () {
            const imageSrc = $(this).data('image'); 
            $('#modalImage').attr('src', imageSrc); 
            $('#imageModal').modal('show'); 
        });
    });
});

