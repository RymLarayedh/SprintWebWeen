var App = {
    carouselAction: function () {
        var i = {}, n = jQuery(".index");
        if (jQuery('.section-owlcarousel-full').length) {
            var owl = jQuery('.section-owlcarousel-full');
            owl.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
            });
            jQuery(".icon-next").click(function () {
                owl.trigger('next.owl.carousel');
            });
            jQuery(".icon-prev").click(function () {
                owl.trigger('prev.owl.carousel');
            });

        }
        if (jQuery('.block-nos-brochures .list-zone').length) {
            var owlZone = jQuery('.block-nos-brochures .list-zone');
            owlZone.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
            jQuery(".icon-next").click(function () {
                owlZone.trigger('next.owl.carousel');
            });
            jQuery(".icon-prev").click(function () {
                owlZone.trigger('prev.owl.carousel');
            });
        }
        if (jQuery('.section-nos-brochures').length) {
            var carousel = jQuery('.section-nos-brochures .owlcarousel-content').owlCarousel({
            center: false, items: 1, loop: true, nav: !0, navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'], merge: !0, margin: 20, dots: !1, autoWidth: true, responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
            jQuery(".next").click(function () {
                carousel.trigger('next.owl.carousel');
            });
            jQuery(".prev").click(function () {
                carousel.trigger('prev.owl.carousel');
            });
        }
        if (jQuery('.block-nos-brochures').length) {
            var carousel = jQuery('.block-nos-brochures .owlcarousel-content').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
            jQuery(".block-nos-brochures .next").click(function () {
                carousel.trigger('next.owl.carousel');
            });
            jQuery(".block-nos-brochures .prev").click(function () {
                carousel.trigger('prev.owl.carousel');
            });
        }
        if (jQuery('.block-owl-slide').length) {
            var owlcarousel = jQuery('.block-owl-slide .owlcarousel-content').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
            jQuery(".block-owl-slide .owl-next").click(function () {
                owlcarousel.trigger('next.owl.carousel');
            });
            jQuery(".block-owl-slide .owl-prev").click(function () {
                owlcarousel.trigger('prev.owl.carousel');
            });
        }
        if (n.find(".section-owlcarousel-full").length &&
                n.find(".section-owlcarousel-full").owlCarousel({
            center: !0, items: 1, loop: !1, dots: !0, nav: !0, navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'], margin: 0}
        ),
                n.find(".section-vos-envies").length
                && n.find(".section-vos-envies .owlcarousel-content").owlCarousel({
            center: false, items: 1, loop: true, nav: !0, navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'], merge: !0, margin: 20, dots: !1, autoWidth: true, responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        }),
                n.find(".section-team").length) {
            var i = 5, o = !0;
            n.find(".section-team .owlcarousel-content").owlCarousel({
                items: i, loop: true, nav: !0, navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'], merge: o, margin: 0, dots: !1, center: !1
            });
            var $owlstage = n.find(".section-team .owlcarousel-content .owl-stage");
            $owlstage.width(Math.ceil($owlstage.width()));
        }
        if (n.find(".section-nos-conseillers").length) {
            var e = n.find(".section-nos-conseillers .owlcarousel-content");
            e.owlCarousel({center: !0, items: 1, loop: !0, nav: !0, navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'], margin: 0}).on("change.owl.carousel", function (i) {
                var o = i.page.index;
                n.find(".section-owlcarousel-item .navigation a").removeClass("active"), $(n.find(".section-owlcarousel-item .navigation a")[o]).addClass("active")
            });
        }
        if (n.find(".section-decouvrez-aussi .mobile").length) {
            //////console.log(n.find(".section-decouvrez-aussi .mobile").length + " kakaka");
            var e = n.find(".section-decouvrez-aussi .mobile .owlcarousel-content");
            e.owlCarousel({
                center: !0,
                items: 1,
                loop: !0,
                nav: !0,
                dots: !0,
                navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
                margin: 0,
                touchDrag: true,
                mouseDrag: true
            }).on("change.owl.carousel", function (i) {
                var o = i.page.index;
                n.find(".section-owlcarousel-item .navigation a").removeClass("active"), $(n.find(".section-owlcarousel-item .navigation a")[o]).addClass("active")
            });
        }
        if (n.find(".section-decouvrez-aussi").length) {
            //////console.log(n.find(".section-decouvrez-aussi .mobile").length + "ssss");
            var e = n.find(".section-decouvrez-aussi .owlcarousel-content");
            e.owlCarousel({
                center: !1,
                items: 5,
                loop: !0,
                nav: !0,
                dots: !1,
                navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
                margin: 20,
                autoWidth: true,
            }).on("change.owl.carousel", function (i) {
                var o = i.page.index;
                n.find(".section-owlcarousel-item .navigation a").removeClass("active"), $(n.find(".section-owlcarousel-item .navigation a")[o]).addClass("active")
            });
        }


        jQuery(".section-owlcarousel-item .navigation a").click(function (i) {
            i.preventDefault(), n.find(".section-owlcarousel-item .navigation a").removeClass("active"), $(this).addClass("active");
            var o = parseInt($(this).attr("data-id")) - 1;
            e.trigger("to.owl.carousel", o);
        });
        n.find(".section-team .owlcarousel-content").owlCarousel({
            center: !0,
            items: i,
            loop: !0,
            nav: !0,
            navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
            merge: o,
            margin: 10,
            dots: !1
        });
        n.find(".block-slider-day").length && n.find(".block-slider-day .owlcarousel-full").owlCarousel({
            center: !1,
            loop: !1,
            dots: !1,
            nav: !0,
            autoWidth: !0,
            navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
            margin: 1,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 3
                },
                768: {
                    items: 5
                },
                992: {
                    items: 7
                }
            }
        });
        n.find(".block-silder-pointer-address").length && n.find(".block-silder-pointer-address").owlCarousel({
            center: !0,
            items: 1,
            loop: !0,
            dots: !1,
            nav: !0,
            navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
            margin: 0
        });
        n.find(".section-block-service").length && n.find(".section-block-service .owlcarousel-content").owlCarousel({
            center: !0,
            items: 1,
            loop: !0,
            dots: !0,
            nav: !0,
            navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
            margin: 0
        });
        n.find(".slider-decouvrez-aussi").length && n.find(".slider-decouvrez-aussi .owlcarousel-content").owlCarousel({
            center: !1,
            loop: !0,
            dots: !1,
            nav: !1,
            navText: ['<i class="icon icon-prev"></i>', '<i class="icon icon-next"></i>'],
            margin: 20,
            autoWidth: true,
        });
    },
    initCarousels: function() {
        if ($(".owlcarousel-content").length) {
            $(".owlcarousel-content").each(function(){
                App.checkCarouselItems($(this));
            });
        }
        if ($(".block-slider-day").length) {
            App.checkCarouselDaysItems();
        }
    },
    checkCarouselItems: function(carousel) {
        carousel.on('initialized.owl.carousel resized.owl.carousel', function(event) {
            var count = 0;
            var elm = $(this);
            var carWidth = elm.width();
            var itemWidth = elm.find(".owl-item").width();
            if (carWidth / itemWidth < event.item.count) {
                elm.find(".owl-controls").show();
            } else {
                elm.find(".owl-controls").hide();
            }
        });
    },
    checkCarouselDaysItems: function() {
        var carousel = $('.block-slider-day .owlcarousel-full');
        carousel.on('initialized.owl.carousel resized.owl.carousel', function(event) {
            var count = 0;
            var elm = $(this);
            var carWidth = elm.width();
            var itemWidth = elm.find(".owl-item").width();
            if (carWidth / itemWidth < event.item.count) {
                elm.find(".owl-controls").show();
            } else {
                elm.find(".owl-controls").hide();
            }
        });
        carousel.on('changed.owl.carousel', function(event) {
            var firstItem = carousel.find('.owl-stage .owl-item').eq(0);
            var lastItem = carousel.find('.owl-stage .owl-item').eq(event.item.count-1);

            if (firstItem.hasClass('active')) {
                carousel.find('.owl-prev').addClass('off');
            } else {
                carousel.find('.owl-prev').removeClass('off');
            }

            if (lastItem.hasClass('active')) {
                carousel.find('.owl-next').addClass('off');
            } else {
                carousel.find('.owl-next').removeClass('off');
            }
        });
    },
    scrollTop: function () {
        jQuery(".gotop a").click(function (n) {
            n.preventDefault();
            jQuery("html, body").animate({scrollTop: 0}, 800);
        });
    },
    popupBrochure: function () {
//        text_user_bk1 = 'Connectez vous pour commander votre brochure';
//        text_user_bk2 = 'créer votre compte pour commander votre brochure';
        if (jQuery('.modal-success').length > 0) {
            jQuery('.modal-success').modal('show');
            jQuery('.modal-success').on('shown.bs.modal', function () {
                //form brochure submited!!!
//                dataLayer.push({"event": "formulaire"
//                    , "nomFormulaire": "Commandes de brochures"
//                    , "etatFormulaire": "confirmation"
//                    , "nomBrochure": jQuery('.modal-success').data('title')
//                    , "destinationDevis": ""
//                });
                setTimeout(function () {
                    jQuery('.modal-success').modal('hide');
                }, 5000);
            });
        }
        ;
        var itemClick = 0;
        jQuery('body').on('click', '.toggle-brochure', function () {
            var version = jQuery(this).data('version');
            var action = jQuery(this).data('action');       
            var userName =  $(this).attr('data-user');
            
            if (userName) {
                App.populateModalBrochure(userName, "Merci de vérifier vos informations de livraison");
            }
            
            version = (version !== undefined) ? '.' + version : ".vdefault";
            action = (action !== undefined) ? '.' + action : ".adefault";

            if (!jQuery(this).hasClass('modal-users')) {
                jQuery('#main').addClass('main-brochure');
//            ////console.log(this);
                var item = jQuery(this).data('item');
                var version = jQuery(this).data('version');
                var action = jQuery(this).data('action');
                version = (version !== undefined) ? '.' + version : ".vdefault";
//            ////console.log(action);
                if (action === undefined) {
                    jQuery('#mobile-create-new').data('item', item);
                }

                action = (action !== undefined) ? '.' + action : ".adefault";
                itemClick = item;
                var imgPath = jQuery('.item-' + item).find('.block-img img').attr('src');
                var title = jQuery('.item-' + item).find('.title').eq(0).text();
                jQuery('.modal-brochure.brochure').find('.modal-title').empty().append(title);
                //form brochure open!! 


                dataLayer.push({"event": "formulaire"
                    , "nomFormulaire": "Commandes de brochures"
                    , "etatFormulaire": "affichage"
                    , "nomBrochure": title
                    , "destinationDevis": ""
                });

                //adding for google seo!!


                jQuery('.modal-brochure.brochure').find('.modal-img').attr('src', imgPath);
                jQuery('.modal-brochure.brochure' + version + action).fadeIn();
//                jQuery('.modal-brochure.brochure' + version + action).css('visibility','visible');
                jQuery('.brochure-submit .brochure').val(item);
                jQuery('html,body').animate({scrollTop: 100}, 800);

            } else {
                //user popup
                dataLayer.push({"event": "formulaire"
                    , "nomFormulaire": "Inscriptions espace perso"
                    , "etatFormulaire": "affichage"
                    , "nomBrochure": ""
                    , "destinationDevis": ""
                });

                jQuery('body').addClass('main-brochure');
                if($('.link-mon-compote').hasClass('close-brochure')) {
                    jQuery('body').removeClass('modal-open');
                    jQuery('.modal-brochure').fadeOut(100, function () {
                        jQuery('.modal-brochure.modal-users').data('event', 0);
                        $('.link-mon-compote').removeClass('close-brochure');
                    });
                    jQuery('.brochure-submit .brochure').val(0);
                }
                else {
                    $('.link-mon-compote').addClass('close-brochure');
                    jQuery('.modal-brochure.modal-users.user-dispatch' + version + action).fadeIn(100, function () {
                        if (jQuery('.modal-brochure.modal-users').data('event')) {
                            text_user_bk1 = 'Connectez vous pour commander votre brochure';
                            text_user_bk2 = 'créer votre compte pour commander votre brochure';
                            jQuery('.title-change-1').text('Connectez-vous pour vous inscrire à un évenement');
                            jQuery('.title-change-2').text('créer votre compte vous inscrire à un évenement');
                        }
                        //jQuery("#form_pay_chosen").css("width","100%");
    //                    jQuery('.title-change-1').text('Connectez-vous pour vous inscrire à un évenement');
    //                    jQuery('.title-change-2').text('créer votre compte vous inscrire à un évenement');
                    });
                }
                //jQuery(".chosen-select").chosen({width: "100%"});


            }
            $(".collapsed.dl-active").trigger("click");

        });
        jQuery('.close-brochure').bind('click', function () {
            jQuery('body').removeClass('modal-open');
            jQuery('.modal-brochure').fadeOut(300, function () {

//                if (typeof (text_user_bk1) !== 'undefined' || text_user_bk1 != '') {
//                    jQuery('.title-change-1').text(text_user_bk1);
//                }
//                if (typeof (text_user_bk2) !== 'undefined' || text_user_bk2 != '') {
//                    jQuery('.title-change-2').text(text_user_bk2);
//                }
                jQuery('.modal-brochure.modal-users').data('event', 0);
            });
            jQuery('.brochure-submit .brochure').val(0);
        });
        if (jQuery('#_submit').length > 0) {
            jQuery('form').on('submit', function (e) {
                //seo for login form submit 


                var $_this = this;
                if (jQuery(this).attr("action") === '/login_check' && jQuery(this).find('#username').val() != "" && jQuery(this).find('#password').val() != "") {
                    e.preventDefault();
                    e.stopPropagation();
                    var credentials = {
                        user: jQuery(this).find('#username').val(),
                        password: jQuery(this).find('#password').val()
                    };
                    var action = jQuery(this).data('action');
                    App.ajaxLogin(credentials, function (data) {
                        if (data.success) {
                             jQuery($_this).find('input[name="form[brochure]"]').val(itemClick);
                            jQuery($_this).find('input[name="form[client]"]').val(data.detail.id);
                            jQuery($_this).attr("action", jQuery($_this).find('input[name="form[brochure]"]').attr('data-routing'));
                            var $setReload = jQuery('#event-type').val();
                            if ($setReload == 1) {
                                location.reload();
                            } else {
                                var action = jQuery('.link-mon-compote').data('action');
                                if (action == 'favorite') {
                                    var voyage = jQuery('.link-mon-compote').data('voyage');
                                    var url = jQuery('.favorite').data('url');
                                    App.ajfa({'user': data.detail.id, 'voyage': voyage, url: url});
                                } else {
                                    App.populateModalBrochure(credentials.user, "Vous etes connecté, merci de verifier vos informations");                                   
                                    //jQuery($_this).submit();
                                }

                            }
                        } else {
                            if (data.message == 'Bad credentials.')
                            {
                                swal("Erreur de connexion", "L'adresse e-mail et le mot de passe saisis ne correspondent pas.", 'warning');
                            } else if(data.message == 'User account is disabled.') {
                                swal("Erreur", "Votre compte n'est pas activé. Afin de finaliser la création de votre espace personnel, nous vous remercions de cliquer sur le lien présent dans l'email de confirmation.", 'warning');
                            }
                            else {
                                swal("Erreur", data.message, 'warning');
                            }
                        }
                    });
                } else {
                    jQuery(e).submit();
                }
            });
        }
        ;
        if (jQuery('#dLabel').length > 0) {
            jQuery('#dLabel').on('click', function () {
                jQuery('#dLabel').dropdown('show');
            });
        }

    },
    
    populateModalBrochure: function (email, message) {
        jQuery.ajax({
            url: "getuserinfo.html",
            data: {
                email: email,
            },
            type: 'post',
            success: function (response) {
                if (!response.errors) {
                    $.each(response.data, function (key, value) {
                        if (key == "gender" || key == "newsletter") {
                            $('input[name= "form[' + key + ']"]', $(".modal-form form")).each(function () {
                                if ($(this).attr('value') == value) {
                                    $(this).attr("checked", value);
                                }
                            });
                        } else if (key == "pay") {
                            $("option", $(".modal-form form select[name= 'form[pay]']")).each(function () {
                                if (this.value == value) {
                                    this.selected = true;
                                }
                            });
                        } else if (key == "email") {
                            $('input[name= "form[email]"]', $(".modal-form form")).val(value);
                            $('input[name= "form[confirm_email]"]', $(".modal-form form")).val(value);
                        } else {
                            $('input[name= "form[' + key + ']"]', $(".modal-form form")).val(value);
                        }
                    });
                    $('#brochureorderlogin').hide();
                    $('#brochureorderlogin').prev("div.title").hide();     
                    $(".modal-form div.title span").text(message);
                } else {

                }
            }
        });
    },    
    validateEmail: function (email) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(email);
    },
    newsletterAction: function () {
        var $status = true;
        jQuery('.newsletter-form .field-submit').on('click', function () {
            var $email = jQuery('.newsletter-form .field-email').val(),
                    $url = jQuery('#newsleter-url').attr('data-url');
            if ($email) {
                if (App.validateEmail($email) && $status) {
                    jQuery.ajax({
                        type: "POST",
                        url: $url,
                        data: {email: $email},
                        beforeSend: function () {
                            $status = false;
                        },
                        success: function (data) {
                            var $json = jQuery.parseJSON(data);
                            if ($json.code == 200) {

                                dataLayer.push({"event": "formulaire"
                                    , "nomFormulaire": "Inscriptions newsletter"
                                    , "etatFormulaire": "confirmation"
                                    , "nomBrochure": ''
                                    , "destinationDevis": ""
                                });

                                swal("Les ateliers du voyage", $json.message, 'success');
                            } else if ($json.code == 201) {
                                swal("Attention", $json.message, 'warning');
                            } else if ($json.code == 202) {
                                swal("Attention", $json.message, 'warning');
                            }
                            $status = true;
                        }
                    });
                } else {
                    swal("Attention", "L'adresse e-mail n'est pas valide.", 'warning');
                }

            } else {
                swal("Attention", "Veuillez entrer votre adresse e-mail", 'warning');
            }
            return false;
        });
    },
    googleMap: function () {
        var geocoder;
        var map;
        function initialize() {
            var $lat = jQuery('#latitude').val(),
                    $lng = jQuery('#longitude').val();
            if ($lat && $lng) {
                var latlng = new google.maps.LatLng($lat, $lng);
                var mapOptions = {
                    zoom: 4,
                    center: latlng,
                    scrollwheel: false,
                    draggable: GmapDraggable()
                }
            } else {
                geocoder = new google.maps.Geocoder();
                var country = jQuery('#address').val();
                geocoder.geocode({'address': country}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                    }
                });
                var mapOptions = {
                    zoom: 4,
                    scrollwheel: false,
                    draggable: GmapDraggable()
                }
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    },
    scrollBar: function () {
        if (jQuery('.perfect-scrollbar').length) {
            jQuery('.perfect-scrollbar').perfectScrollbar();
        }
    },
    pageVoyage: function () {
        jQuery('.select-step').on('click', function () {
            if (!jQuery(this).hasClass('active')) {
                var currentActive = jQuery(this).parents('.block-slider-day').find('.select-step.active');
                jQuery(this).parents('.block-slider-day').find('.select-step').removeClass('active');
                jQuery(this).addClass('active');
                var $getId = jQuery(this).find('a').data('item');
                jQuery(this).parents('.tour-detail-day').find('.block-detail-day').hide();
                jQuery(this).parents('.tour-detail-day').find('#' + $getId).fadeIn();
                App.changeMarker($getId);
            }
        });
    },
    eventCalendar: function () {
        if (jQuery(".event-calendar").length) {
            var url = jQuery('.event-calendar').data('url');
            var calendar = jQuery(".event-calendar").calendar({
                tmpl_path: "/bundles/template/bootstrap-calendar/tmpls/",
                language: 'fr-FR',
                events_source: url + "?type=0",
                modal: "#events-modal",
                modal_type: "template",
                modal_title: function (e) {
                    return e.title;
                },
                onAfterEventsLoad: function (events) {
                    if (!events) {
                        return;
                    }
                    var list = $('#eventlist');
                    list.html('');


                    $.each(events, function (key, val) {
                        $(document.createElement('li'))
                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                .appendTo(list);
                    });
                },
                onAfterViewLoad: function (view) {
                    jQuery('#main').removeClass('loading-root');
                    jQuery('.inner-circles-loader').addClass('hidden');
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                },
                classes: {
                    months: {
                        general: 'label'
                    }
                }

            });
//            ////console.log(jQuery('#events-modal'));
            jQuery(document).on('show.bs.modal', '#events-modal', function () {
                dataLayer.push({"event": "formulaire"
                    , "nomFormulaire": "Inscriptions événements"
                    , "etatFormulaire": "affichage"
                    , "nomBrochure": ""
                    , "destinationDevis": ""
                });

            });
            jQuery('.btn-subcriber').on('click', function () {
                jQuery('.modal-brochure.modal-users').data('event', 1);
            });
            jQuery('.btn-group button[data-calendar-view]').each(function () {
                var $this = jQuery(this);
                $this.click(function () {
                    $this.parent().find('button').removeClass('active');
                    $this.addClass('active');
                    calendar.view($this.data('calendar-view'));

                });
            });
            jQuery('.btn-group button[data-calendar-nav]').each(function () {
                var $this = jQuery(this);
                $this.click(function () {
                    $this.parent().find('button').removeClass('active');
                    $this.addClass('active');

                    calendar.navigate($this.data('calendar-nav'));
                });
            });
            jQuery('#loginModal').on('show.bs.modal', function () {
                jQuery('#events-modal').modal("hide");
            });
            jQuery('#form_submit').on('click', function (e) {
                jQuery('#main').addClass('loading-root');
                jQuery('.inner-circles-loader').removeClass('hidden');
                e.preventDefault();
                e.stopPropagation();
                var type = jQuery('option:selected', '#form_category').val();
                var month = jQuery('option:selected', '#form_date').val();
                var date = new Date();
                var fromdate = new Date(date.getFullYear(), month, 1);
                calendar.setOptions({
                    events_source: url + "?type=" + type,
                    day: fromdate.getFullYear() + '-' + ((fromdate.getMonth() < 10) ? '0' + fromdate.getMonth() : fromdate.getMonth()) + '-01'
                });
                calendar.view();
                return;
                var text = jQuery('#form_search').val();
                var type = jQuery('option:selected', '#form_category').val();
                var month = jQuery('option:selected', '#form_date').val();

                var date = new Date();
                //console.log(date.getFullYear());
                var fromdate = new Date(date.getFullYear(), month - 1, 1);

                var enddate = new Date(date.getFullYear(), fromdate.getMonth() + 1, 0);

                //console.log(enddate);

                jQuery.ajax({
                    url: url + "?from=" + Math.floor(fromdate.getTime()) + "&to=" + Math.floor(enddate.getTime()) + "&ut_offset=-420",
                    type: 'post',
                    dataType: 'json',
                    data: {search: false},
                    success: function (data, textStatus, jqXHR) {
                        if (data.result) {
                            calendar = jQuery(".event-calendar").calendar({
                                tmpl_path: "/bundles/template/bootstrap-calendar/tmpls/",
                                language: 'fr-FR',
                                events_source: url,
                                modal: "#events-modal",
                                modal_type: "template",
                                modal_title: function (e) {
                                    return e.title;
                                },
                                onAfterEventsLoad: function (events) {
                                    if (!events) {
                                        return;
                                    }
                                    var list = $('#eventlist');
                                    list.html('');

                                    $.each(events, function (key, val) {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                    });
                                },
                                onAfterViewLoad: function (view) {

                                    $('.page-header h3').text(this.getTitle());
                                    $('.btn-group button').removeClass('active');
                                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                                },
                                classes: {
                                    months: {
                                        general: 'label'
                                    }
                                }
                            });
                        }


                    }
                });
            });
        }
    },
    contactConseiller: function () {

        jQuery('.conseiller').on('click', function () {
            var $name = jQuery(this).attr('data-name'),
                    $redirect = jQuery(this).attr('data-redirect'),
                    $id = jQuery(this).attr('data-conseiller');
            jQuery('#contactModal').find('.modal-title b').text($name);
            jQuery('#contactModal').find('#form_conseiller').val($id);
            jQuery('#contactModal').find('#form_redirect').val($redirect);
            jQuery('#contactModal').modal('show');

        });

        jQuery("#contactModal").on('submit', 'form', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var data = jQuery(this).serializeArray();
            var url = jQuery(this).data('url');
            dataLayer.push({"event": "formulaire"
                , "nomFormulaire": "Contact conseiller"
                , "etatFormulaire": "confirmation"
                , "nomBrochure": ""
                , "destinationDevis": ""
            });
            jQuery.ajax({
                url: url,
                data: data,
                dataType: 'json',
                type: 'post',
                success: function (data, textStatus, jqXHR) {
                    if (data) {
                        jQuery("#contactModal").modal('hide');
                    } else {
                        jQuery("#contactModal").modal('hide');
                    }
                }
            });

        });
        jQuery("#contactModal").on('show.bs.modal', function () {

            dataLayer.push({"event": "formulaire"
                , "nomFormulaire": "Contact conseiller"
                , "etatFormulaire": "affichage"
                , "nomBrochure": ""
                , "destinationDevis": ""
            });
            ////console.log(dataLayer);
        });
    },
    datetimePicker: function () {
        if (jQuery('.timepicker').length) {
            jQuery('.timepicker').datetimepicker({
                format: 'H:m'
            });
        }
        if (jQuery('.datepicker').length) {
            jQuery('.datepicker').datetimepicker({
                format: "DD/MM/YYYY",
                locale: moment.locale('fr-FR')
            });
        }
    },
    chosenSelect: function () {
        jQuery(".chosen-select").chosen();
        jQuery(".chosen-select").chosen().change(function (e) {
            var obj = jQuery("option:selected", this);
            var url = jQuery(obj).attr('value');
            jQuery('#pays-dest-select').attr('action', url);
            jQuery('#pays-dest-select').submit();
        });
    },
    turnBack: function (args) {
        if (jQuery('#registered').length > 0) {
            jQuery('#registered').on('hidden.bs.modal', function (e) {
                setTimeout(function () {
                    window.location = args;
                }, 3000);
            });
        }

    },
    collapseMenuMobile: function () {
//        if (jQuery('#btn-toogle-mobile').length > 0) {
//            jQuery('#btn-toogle-mobile').on('click', function () {
//
//            });
//        }
//        jQuery(document).on('click', '.page-wrapper', function () {
//            jQuery('#menu-nav-mobile.collapse').collapse('hide');
//        });
//        jQuery('#menu-nav-mobile .collapse').on('hidden.bs.collapse', function () {
//            ////console.log(this);
//        });

        $menu = jQuery('#dl-menu').dlmenu();

    },
    collapseVoyage: function () {
        $('#tour-mobile .collapse').on('hide.bs.collapse', function () {
            var id = jQuery(this).attr('id');
            jQuery('#heading-' + id).removeClass('focus');
            jQuery('#heading-' + id + ' div.carets i').removeClass('fa-caret-down');
            jQuery('#heading-' + id + ' div.carets i').addClass('fa-caret-right');
        });
        $('#tour-mobile .collapse').on('show.bs.collapse', function () {
            var id = jQuery(this).attr('id');
            jQuery('#heading-' + id).addClass('focus');
            jQuery('#heading-' + id + ' div.carets i').addClass('fa-caret-down');
            jQuery('#heading-' + id + ' div.carets i').removeClass('fa-caret-right');
        });
    },
    pupopContacter: function () {
        if (jQuery('.conseiller').length > 0) {
            jQuery('.conseiller').on('click', function (e) {
                jQuery('#contactModal').show();
            });
        }
    },
    ajaxLogin: function (credentials, callback) {
        dataLayer.push({"event": "formulaire"
            , "nomFormulaire": "Inscriptions espace perso"
            , "etatFormulaire": "confirmation"
            , "nomBrochure": ""
            , "destinationDevis": ""
        });
        jQuery.ajax({
            url: '/login_check',
            data: {
                _username: credentials.user,
                _password: credentials.password,
                detail: (credentials.detail) ? '1' : '0'
            },
            type: 'post',
            success: callback
        });
    },
    radiusImage: function () {
        if (jQuery('.section-team .section-owlcarousel-item .item img').length) {
            var width = jQuery('.section-team .section-owlcarousel-item .item img').width();
            jQuery('.section-team .section-owlcarousel-item .item img').css({
                'height': width + 'px'
            });
        }
    },
    plusdeResult: function () {
        jQuery('.plusderesult').on('click', function () {
            var $_this = jQuery(this);
            var type = jQuery(this).data('type');
            var meta = jQuery('.metasearch').val();
            jQuery.ajax({
                url: '/searchs/plus',
                type: 'post',
                data: {type: type, meta: meta, offset: jQuery(this).parent().parent().find('.media').length},
                success: function (data, textStatus, jqXHR) {
                    if (data) {
                        $_this.parent().before(data);
                    }
                }
            });
        });
    },
    sticky: function () {
        var stickyNavTop = 420;//jQuery('#main').find('div:first-child').height();
        jQuery('.section-download-devis-right').css('top', stickyNavTop);


        var stickyNav = function (e) {
            //////console.log(e);
            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                jQuery('.section-download-devis-right').removeClass('sticky');
                jQuery('.section-download-devis-right').css('top', 0);

            } else {
                jQuery('.section-download-devis-right').addClass('sticky');
                jQuery('.section-download-devis-right').css('top', (stickyNavTop - scrollTop)).animate();
                if (scrollTop <= 0) {
                    // ////console.log(scrollTop);
                    jQuery('.section-download-devis-right').css('top', stickyNavTop);
                }
            }

        };

        //stickyNav();

        jQuery(window).scroll(function (e) {
            stickyNav(e);
        });
    }
    ,
    carousel: function () {
        if (jQuery('#header-home').length > 0) {
            jQuery("#header-home").owlCarousel({
                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

                        // "singleItem:true" is a shortcut for:
                        // items : 1, 
                        // itemsDesktop : false,
                        // itemsDesktopSmall : false,
                        // itemsTablet: false,
                        // itemsMobile : false

            });
        }
    },
    webcall: function () {
        window.open('http://saas.voxreflex.com/popup/popup.php?lid=1041&key=7957f3c9c3dd93b26426c4fd8b2d522e&popup=1', 'VoxReflex', 'toolbar=0,status=0,width=540,height=340');
        //return false;
    },
//    detechWith: function () {
//        window.addEventListener('resize', function (e) {
//            ////console.log(jQuery(window).width());
//        });
//    },
    favorite: function () {
        jQuery('.favorite').on('click', function (e) {
            e.preventDefault();
            var id = jQuery(this).data('id');
            var url = jQuery(this).data('url');
            var favori = jQuery(this).data('favori');
            var user = jQuery('.link-mon-compote').data('user');
            if (!user) {
                $('html, body').animate({
                   scrollTop: 0
                }, 200);
                jQuery('.link-mon-compote').click();
                jQuery('.link-mon-compote').data('action', 'favorite');
                jQuery('.link-mon-compote').data('voyage', id);
            } else if(!favori) {
                jQuery.ajax({
                    url: url,
                    data: {
                        id: id,
                        user: user
                    },
                    type: 'post',
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.success) {
                            jQuery('.favorite').html('<i class="fa fa-star"></i>Dans mes favoris').addClass('added');
                        } else {
                            alert(data.message);
                        }
                    }
                });
            }
        });
    },
    /**
     * what ajfa? 
     * Ajax favoret function
     * @param {type} para
     * @returns {undefined}
     */
    ajfa: function (para) {
        jQuery.ajax({
            url: para.url,
            data: {
                id: para.voyage,
                user: para.user
            },
            type: 'post',
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                if (data.success) {
                    jQuery('.favorite').html('<i class="fa fa-star"></i>Dans mes favoris').addClass('added');
                    $('.link-mon-compote').removeClass('toggle-brochure modal-users close-brochure');
                    console.log(data.user);
                    $('.link-mon-compote').data('user', data.user);
                    $('.link-mon-compote').attr('href', '/espace-perso.html');
                    console.log($('.link-mon-compote').data('user'));
                    $('.user-dispatch').hide();
                    $('html, body').animate({
                        scrollTop: $('.content-tour-info').offset().top
                     }, 200);
                } else {
                    alert(data.message);

                }
            }
        });
    },
    hideControlCarousel: function () {
        if (jQuery('.count-conseiller').length) {
            var $item = jQuery('.count-conseiller .owl-item').length;
            if ($item < 5) {
                jQuery('.count-conseiller').addClass('display-none');
            }
        }
    },
    destination: function () {
        jQuery('ul.sub-parent > li,ul.sub-parent > li > a > div').on('click', function (e) {
            //e.preventDefault();
            var child = jQuery(this).children('.sub-nav');
            if (child.length > 0)
            {
                jQuery('ul.sub-parent > li').find('.sub-nav').removeClass('active');
                jQuery(child[0]).addClass('active');
            }
        });
        jQuery('.navigation > ul> li.menu-black').on('mouseover', ' > a', function () {

            jQuery('ul.sub-parent > li').find('.sub-nav').removeClass('active');

        });
    },
    profile: function () {
        jQuery('#favoris').on('click', '.delete-button', function () {
            var $_this = this;
            var id = jQuery(this).data('id');
            var url = jQuery('.tab-content').data('url');
            var user = jQuery('.link-mon-compote').data('user');
            jQuery.ajax({
                url: url,
                data: {
                    id: id,
                    user: user,
                    type: 1
                },
                type: 'post',
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success) {
                        jQuery($_this).parent().parent().remove();
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            });

        });
    },
    checkSeoGoole: function () {
        ////console.log(dataLayer);
    },
    subscribeEvent: function () {
        jQuery('.subscribe-event').on('click', function () {

            var $_this = jQuery(this),
                    $url = $_this.attr('data-url'),
                    $html = $_this.html(),
                    $id = $_this.parents('.modal').find('#event_id').val();
            jQuery.ajax({
                type: "POST",
                url: $url,
                data: {event: $id},
                beforeSend: function () {
                    //seo tags
                    dataLayer.push({"event": "formulaire"
                        , "nomFormulaire": "Inscriptions événements"
                        , "etatFormulaire": "confirmation"
                        , "nomBrochure": ""
                        , "destinationDevis": ""
                    });

                    $_this.html('<i class="fa fa-cog fa-spin"></i> Chargement...');//<i class="fa fa-envelope-o"></i>Subscribre 
                },
                success: function (data) {
                    var $json = jQuery.parseJSON(data);
                    if ($json.status == 200) {
                        alert($json.message);
                    } else {
                        alert($json.message);
                    }
                },
                complete: function () {
                    $_this.html($html);

                    jQuery('#events-modal').modal('hide');
                    $_this.html('<i class="fa fa-envelope-o"></i>' + "S'inscrire");// 
                    //seo tags
                }
            });
        });

    },
    regenrate: function () {
        var state = 0;
        jQuery('.forgot_password').on('click', function (e) {
            //console.log('sss');
            e.preventDefault();
            e.stopPropagation();
            jQuery('#regenerate-modal').modal('show');
            $('.modal-brochure.modal-users.user-dispatch').hide();
            $('.link-mon-compote.toggle-brochure.modal-users.close-brochure').removeClass('close-brochure');
        });

        var jqxhr = {abort: function (e) {
                if (state == 1) {
                    e.preventDefault();
                    e.stopPropagation();
                }

            }};
        jQuery('#forgot-form').on('submit', function (e) {
            $url = jQuery('#regenerate-modal').data('url');
            $email = jQuery('#forgot-email').val();

            if ($email == undefined || $email == null || $email == '') {

                return;
            }
            jqxhr.abort(e);
            jqxhr = jQuery.ajax({
                url: $url,
                type: 'post',
                dataType: 'json',
                data: {email: $email},
                beforeSend: function (xhr) {
                    jQuery('#forgot-email').attr('readonly', true);
                    jQuery('.btn-submit-ajax').attr('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    jQuery('#regenerate-modal-finished').data('result', data);
                },
                complete: function (jqXHR, textStatus) {
                    jQuery('#regenerate-modal-finished').modal('show');
//                    jQuery('#forgot-email').attr('readonly', false);
//                    jQuery('.btn-submit-ajax').attr('disabled', false);
                    jQuery('#regenerate-modal').modal('hide');
                }
            });


        });
        jQuery('#regenerate-modal').on('show.bs.modal', function () {
            jQuery('#forgot-email').attr('readonly', false);
            jQuery('.btn-submit-ajax').attr('disabled', false);

        });
        jQuery('#regenerate-modal-finished').on('show.bs.modal', function () {
            var data = jQuery('#regenerate-modal-finished').data('result');
            jQuery('.fn-message').text(data.message);
        });
    }
    , deniedImg: function () {
        if (jQuery("img").length) {
            jQuery("img").error(function () {
                //return true;
                jQuery(this).attr('src', '../images/no-photo-horizontal.jpg');
            });
        }
    },
    select2: function () {
        /*if (jQuery('.select2-destination').length > 0) {*/
        var url = jQuery('.form_search_text').data('url');
        jQuery('.select2-destination').select2({
            language: "fr",
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function (params) {

                    return {
                        q: params,
                        type: 0
                    };
                },
                processResults: function (data, page) {
                    if (data) {
                        var result = [];
                        $element = this.$element;
                        jQuery.each(data, function (index, item) {
                            var option = new Option(item.title, item.id, true, true);

                            $element.append(option);
                            result.push({
                                text: item.title,
                                id: item.id
                            });
                        });
                        $element.trigger('change');
                        return {
                            results: result
                        };
                    }
                },
                cache: true,
                results: function (data, page) {
                    var result = [];
                    if (data) {
                        //console.log(data);
                        jQuery.each(data, function (index, item) {
                            result.push({
                                text: item.title,
                                id: item.id
                            });
                        });

                    }
                    return {
                        results: result
                    };
                }
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
//                templateResult: function (data) {
//                    console.log(this);
//                },
//                initSelection: function (element, callback) {
////                    var data = [];
////                    data.push({
////                        id: jQuery(element).data('conseiller'),
////                        text: jQuery(element).data('conseillername')
////                    });
////                    callback(data[0]);
//                }
        });
        /* }*/
    },
    initMarker: function () {

        if (markers.length > 0) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setZIndex(1);
            }
            markers[0].setZIndex(2);
        }
    },
    changeMarker: function (position) {

        var id = position.replace('tour-', '');

        var bounds = new google.maps.LatLngBounds();

        if (markers.length > 0) {

            for (var i = 0; i < markers.length; i++) {
                if (i == (id - 1)) {
                    markers[i].setIcon($icon_active);
                    markers[i].setZIndex(2);
                    bounds.extend(markers[i].getPosition());
                } else {
                    markers[i].setIcon($icon);
                    markers[i].setZIndex(1);
                }
            }

            //map.setZoom(12);
            map.panTo(bounds.getCenter());

        }

    },
    imgError: function () {
        jQuery('img').on("error", function () {
            jQuery(this).unbind('error').attr('src', '');
        });
    },
    pageListeVoyages: function() {
        
        $( "#miu-filters select" ).selectmenu({
            icons: { button: "ui-icon-carat-1-s" }
        });
        $( "#miu-sort" ).selectmenu({
            icons: { button: "ui-icon-carat-1-s" }
        });
        
        // Mise en place du lazy loading
        $("#miu-container img").unveil();
        
    },
    pageListeInspirations: function() {
       
        // Mise en place du lazy loading
        $(".grille-inspirations img").unveil();
        atlvLoadMoreInspirations(16, 4);
        
    },
    pageThematique: function() {
       
        // Mise en place du lazy loading
        $(".grille-inspirations img").unveil();
        atlvLoadMoreInspirations(12, 4);
        
    },
    atlvMixItUp: function() {
        
        // Initialize dropdown menu values
        
        var $_GET = get_url_param(),
            pays = $_GET['pays'],
            budget = $_GET['budget'],
            duree = $_GET['duree'],
            type = $_GET['type'];
        if(pays != null) {
            $('#miu-filter-pays').val(".miu-" + pays);
        }
        
        // Instantiate MixItUp

        $('#miu-container').mixItUp({
            controls: {
              enable: false // we won't be needing these
            },
            selectors: {
                target: '.miu-result'
            },
            callbacks: {
                onMixFail: function() {
                    $('#nbResults').html("0 voyage");
                    $('.row.results-sort').append('<div class="no-result col-sm-12 col-lg-9 col-md-9 col-xs-12">Aucun résultat ne correspond aux filtres sélectionnés. Merci de modifier votre recherche.</div>')
                },
                onMixEnd: function(state){
                    $('.no-result').remove();
                    $('#nbResults').html(state.totalShow + " voyages");
                    atlvLoadMore(state);
                    $("#miu-container img").unveil();
                }
            }
        });
        $('#miu-team-container').mixItUp({
            controls: {
              enable: false // we won't be needing these
            },
            selectors: {
                target: '.miu-result'
            },
            callbacks: {
                onMixFail: function() {
    //              alert('Aucun élément trouvé.');
                },
                onMixEnd: function(state){ 
                    // Masquer les conseillers si aucun filtre n'est sélectionné
                    if($('#miu-filter-pays').find(':selected').val() == "") {
                        $('.team-item').not('.all-conseillers').hide();
                        $('.all-conseillers').show();
                    }
                    else {
                        $('.all-conseillers').hide();
                    }
                }
            }
        });
        
        // Initialize dropdownFilter code

        dropdownFilter1.init($('#miu-filters'), $('#miu-container'));
        
        dropdownFilter2.init($('#miu-filters'), $('#miu-team-container'));

        
        $('#miu-sort').on('selectmenuchange', function() {
            $('.loadMore').show();
            $('.loadMore').removeClass('loadMore');
            $('#miu-container').mixItUp('sort', this.value);
        });
                
    },
    atlvUserEdit: function() {
        $('#btn-user-edit').on("click", function() {
            $('.modal-users.user-edit').fadeIn(300);
        });  
    },
    atlvUserRegister: function() {
        $('#btn-user-register').on("click", function() {
            var email = $('#email').val();
            jQuery.ajax({
                url: "verification.html",
                data: {
                    email: email,
                },
                type: 'post',
                success: function (data) {
                    if (!data.errors) {
                        $('#register-user_email').val(email);
                        $('.modal-users.user-dispatch').fadeOut(300);
                        $('.link-mon-compote.toggle-brochure.modal-users').removeClass('close-brochure');
                        $('.modal-users.user-register').fadeIn(300);
                    } else {
                        swal("Les ateliers du voyage", data.message, 'warning');
                    }
                }
            }); 
        });  
    },
    atlvDevis: function() {
        if ($('#form-mesure').length) {
            var form = $('#form-mesure');
            var validator = form.validate();
            var nbSteps = $('#devis-menu li').length;
            var prev = form.find('.buttons .prev');
            var next = form.find('.buttons .next');
            var submit = form.find('.buttons .btn-success');
            var stepMenu = $('#devis-menu ul li a');

            $('#devis-menu li').eq(0).addClass('on active');
            $('#form-mesure .step-block').eq(0).addClass('active');

            form.find('.field select').each(function(){
                var select = $(this);
                var name = select.find('option:selected').text();

                select.after('<span class="fake-select"></span>');
                select.parent().find('.fake-select').text(name);
                select.change(function(){
                    var option = select.find('option:selected');
                    var fake = select.parent().find('.fake-select');
                    var newname = option.text();
                    var index = option.index();

                    if (index == 0) {
                        fake.removeClass('changed');
                    } else {
                        fake.addClass('changed');
                    }

                    fake.text(newname);
                });
            });

            prev.click(function(e){
                var thisStep = $('#devis-menu li.active');
                var thisStepNb = thisStep.data('step');
                var activeBlock = $('#form-mesure .step-block.active');

                e.preventDefault();
                if (thisStepNb > 1) {
                    activeBlock.removeClass('active');
                    thisStep.removeClass('on').removeClass('active');
                    next.removeClass('off');
                    submit.removeClass('on');

                    $('#form-mesure .step-block').each(function(){
                        if ($(this).data('step') == thisStepNb - 1) {
                            $(this).addClass('active');
                        }
                    });

                    $('#devis-menu li').each(function(){
                        if ($(this).data('step') == thisStepNb - 1) {
                            $(this).addClass('active');
                        }
                    });

                    if (thisStepNb - 1 == 1) {
                        prev.removeClass('on');
                    }
                }
            });

            next.click(function(e){
                var thisStep = $('#devis-menu li.active');
                var thisStepNb = thisStep.data('step');
                var activeBlock = $('#form-mesure .step-block.active');
                var stepValid = true;

                e.preventDefault();
                activeBlock.find('select, input, textarea').each(function(){
                    var elmt = $(this);

                    if (!validator.element(elmt)) {
                        stepValid = false;
                    }
                });
                
                if (stepValid) {
                    var recap = $('#form-mesure .recap');

                    if (thisStepNb < nbSteps) {
                        activeBlock.removeClass('active');
                        thisStep.removeClass('active');

                        $('#form-mesure .step-block').each(function(){
                            if ($(this).data('step') == thisStepNb + 1) {
                                $(this).addClass('active');
                            }
                        });

                        $('#devis-menu li').each(function(){
                            if ($(this).data('step') == thisStepNb + 1) {
                                $(this).addClass('on active');
                            }
                        });

                        if (thisStepNb + 1 == nbSteps) {
                            next.addClass('off');
                            submit.addClass('on');
                        }

                        prev.addClass('on');
                    }

                    switch (thisStepNb) {
                        case 1:
                            recap.find('.destination').text($('#form_destination option:selected').text());
                            recap.find('.datestart').text($('#form_dateDeparture').val());
                            recap.find('.time').text($('#form_timeDeparture option:selected').text());
                            break;

                        case 2:
                            recap.find('.adults').text($('#form_adulte option:selected').text());
                            recap.find('.children').text($('#form_enfant option:selected').text());
                            break;

                        case 3:
                            break;

                        case 4:
                            recap.find('.budget').text($('#form_budget option:selected').text());
                            break;

                        case 5:
                            recap.find('.gender').text($('#form_gender option:selected').text());
                            recap.find('.firstname').text($('#form_firstname').val());
                            recap.find('.lastname').text($('#form_lastname').val());
                            break;

                        case 6:
                            recap.find('.email').text($('#form_email').val());
                            recap.find('.phone').text($('#form_phone').val());
                            break;

                        case 7:
                            recap.find('.address').text($('#form_address').val());
                            recap.find('.zip').text($('#form_codePostal').val());
                            recap.find('.city').text($('#form_city').val());
                            recap.find('.country').text($('#form_pay option:selected').text());
                            break;
                    }
                }
            });

            stepMenu.click(function(e){
                var stepClicked = $(this).parent();
                var stepClickedNb = stepClicked.data('step');
                var thisStep = $('#devis-menu li.active');
                var activeBlock = $('#form-mesure .step-block.active');

                e.preventDefault();
                if (stepClicked.hasClass('on')) {
                    activeBlock.removeClass('active');
                    thisStep.removeClass('active');
                    next.removeClass('off');
                    submit.removeClass('on');

                    $('#form-mesure .step-block').each(function(){
                        if ($(this).data('step') == stepClickedNb) {
                            $(this).addClass('active');
                        }
                    });

                    $('#devis-menu li').each(function(){
                        if ($(this).data('step') > stepClickedNb) {
                            $(this).removeClass('on').removeClass('active');
                        }
                        if ($(this).data('step') == stepClickedNb) {
                            $(this).addClass('active');
                        }
                    });

                    if (stepClickedNb == 1) {
                        prev.removeClass('on');
                    }
                }
            });
        }

        $('#form-mesure .date .datepicker').data("DateTimePicker").destroy();
        $('#form-mesure .date .datepicker').datetimepicker({
            format: "DD/MM/YYYY",
            locale: moment.locale('fr-FR'),
            minDate: new(Date)
        });

        $("#form_destination").on("change", function() {
            tranche1 = $(this).find(':selected').data('tranche1');
            tranche2 = $(this).find(':selected').data('tranche2');
            tranche3 = $(this).find(':selected').data('tranche3');
            $('#form_budget option').eq(0).prop('selected', true);
            $('#form_budget option').eq(1).html(tranche1);
            $('#form_budget option').eq(2).html(tranche2);
            $('#form_budget option').eq(3).html(tranche3);
            $('#form_budget').trigger('change');
        });

        $('#form-mesure .recap-right a.notes').click(function(e){
            e.preventDefault();
            $('#devis-menu ul li').eq(2).find('a').trigger('click');
        });

        function devisCalc(){
            var width = $('#devis-menu .bullet').outerWidth();
            $('#devis-menu .bullet').css('height', width);
        }

        $(window).resize(function(){
            devisCalc();
        });

        devisCalc();
    },
    atlvDemandeContact: function() {
        
        // Messages par défaut selon les sujets
        
        $("#demande-contact :radio[value=0]").attr("checked", true);
        
        $("#demande-contact :radio[value=0]").on("click", function() {
            $('#demande-contact_message').val("Bonjour, je souhaiterais vous rencontrer pour échanger sur mon projet de voyage le...");
        });
        
        $("#demande-contact :radio[value=1]").on("click", function() {
            $('#demande-contact_message').val("Bonjour, je souhaiterais avoir plus d'informations concernant...");
        });
        
        $("#demande-contact :radio[value=2]").on("click", function() {
            $('#demande-contact_message').val("Merci de me rappeler au sujet de...");
        });
        
        // Ouverture popin
        
        $('.btn-demande-contact').on("click", function() {
            if ($('#demande-contact').hasClass('closed')) {
                $('#demande-contact').show();
                $('#demande-contact #etape-1').show();
                $('#demande-contact').removeClass('closed');
            }
        });
        
        // Fermeture popin au click à l'extérieur de la popin
        
        $(document).mouseup(function (e) {
            var container = $("#demande-contact");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && !container.hasClass('closed')) // Container est ouvert
            {
                $('#demande-contact').hide();
                $('#demande-contact .etape').hide();
                $('#demande-contact').addClass('closed');
            }
        });
        
        
        // Navigation dans les étapes
        
        var validator = $('form[name=demande-contact]').validate();
        
        $('#demande-contact #etape-1 .next').on("click", function(e) {
            e.preventDefault();
            stepValid = true;
            $('#etape-1').find('input').each(function(){
                var elmt = $(this);
                if (!validator.element(elmt)) {
                    stepValid = false;
                }
            });
            if(stepValid) {
                $('#demande-contact #etape-1').hide();
                $('#demande-contact #etape-2').show();
            }
        });
        
        $('#demande-contact #etape-2 .prev').on("click", function(e) {
            e.preventDefault();
            $('#demande-contact #etape-1').show();
            $('#demande-contact #etape-2').hide();
        });
        
        $('#demande-contact #etape-3 .fermer').on("click", function(e) {
            e.preventDefault();
            $('#demande-contact').hide();
            $('#demande-contact .etape').hide();
            $('#demande-contact').addClass('closed');
        });
        
        // Soumission de la demande
        
        $('#demande-contact form').on("submit", function(e) {
            e.preventDefault();
            
            var subject = jQuery("input[type='radio'][name='demande-contact[subject]']:checked").val();
            var message = jQuery('#demande-contact_message').val();
            var lastname = jQuery('#demande-contact_lastname').val();
            var email = jQuery('#demande-contact_email').val();
            var phone = jQuery('#demande-contact_phone').val();
            
            if ($('form[name=demande-contact]').valid()) {
                jQuery.ajax({
                    url: "demandecontact.html",
                    data: {
                        subject: subject,
                        message: message,
                        lastname: lastname,
                        email: email,
                        phone: phone,
                    },
                    type: 'post',
                    success: function (data) {
                        console.log(data);
                        if (!data.errors) {
                            $('#demande-contact #etape-2').hide();
                            $('#demande-contact #etape-3').show();
                        } else {
                            alert(data.message);
                        }
                    }
                });
            }
        });  
    },
    atlvNavSearch : function() {
        $('#nav-search-btn').on('click', function() {
            if($('.nav-search').hasClass('closed')) {
                $('.nav-search').show();
                $('.nav-search').removeClass('closed');
                $(this).parent('li').addClass('active');
            } else {
                $('.nav-search').hide();
                $('.nav-search').addClass('closed');
                $(this).parent('li').removeClass('active');
            }
        });
    },
    priceIncludes: function() {
        if ($('#container').hasClass('voyage_page_voyage')) {
            $('#price-includes > span').click(function(){
                $('#popin-price-includes').toggleClass('on');
            });
            $('#popin-price-includes .close').click(function(e){
                e.preventDefault();
                $('#popin-price-includes').removeClass('on');
            });
        }
    },
    compatIE: function() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            $('.section.section-banner-full .item').each(function () {
                var $wrapper = $(this),
                imgUrl = $wrapper.find('img').prop('src');
                if (imgUrl) {
                   $wrapper
                   .css({'backgroundImage': 'url(' + imgUrl + ')', 'background-size' : "cover"})
                   .children('img').css("visibility", "hidden");
                }
            });
        }
    }
};


function atlvLoadMore(state) {
    // On réaffiche le bouton Load more au cas où
    $('#loadMore').show();
    // On remet à zéro les flags .loadMore
    state.$targets.removeClass('loadMore');
    // On initialise la taille de la liste à afficher, la taille des tranches et le nombre d'éléments affichés
    size_list = state.totalShow;
    x = 8;
    totalx = 8;
    // On met le flag .loadMore sur tous les éléments de la liste à afficher
    state.$show.addClass('loadMore');
    // On masque tous les éléments après le 8e et on enlève le flag .loadMore sur ceux qui sont affichés
    // (ne pas utiliser l'objet state.$show car les éléments ne sont pas dans l'ordre !!!!)
    $('.loadMore').slice(x).hide();
    $('.loadMore').slice(0,x).removeClass('loadMore');
    if(x >= size_list){
        $('#loadMore').hide();
    }
    // Au clic, on affiche 8 éléments de plus et on leur enlève le flag .loadMore
    $('#loadMore').unbind("click").click(function () {
        totalx = totalx + x;
        $('.loadMore').slice(0, x).show().removeClass('loadMore');
        if(totalx >= size_list){
            $('#loadMore').hide();
        }
        $("#miu-container img").unveil();
    });
}

function atlvLoadMoreInspirations(initial, tranche) {
    // On définit la liste d'éléments à afficher / masquer
    items = $('.grille-inspirations .item');
    // On initialise la taille de la liste à afficher, la taille des tranches et le nombre d'éléments affichés
    size_list = items.size();
    x = tranche;
    totalx = initial;
    // On affiche le bouton Loadmore s'il y a plus d'éléments que la taille initiale
    if(size_list > initial) {
        $('#loadMore').show();
    }
    // On ajoute la classe loadmore sur tous les éléments de la liste
    items.addClass('loadMore');
    // On masque tous les éléments après le xe et on enlève le flag .loadMore sur ceux qui sont affichés
    $('.loadMore').slice(totalx).hide();
    $('.loadMore').slice(0,totalx).removeClass('loadMore');
    if(x >= size_list){
        $('#loadMore').hide();
    }
    // Au clic, on affiche x éléments de plus et on leur enlève le flag .loadMore
    $('#loadMore').unbind("click").click(function () {
        totalx = totalx + x;
        $('.loadMore').slice(0, x).show().removeClass('loadMore');
        if(totalx >= size_list){
            $('#loadMore').hide();
        }
//        $('.grille-inspirations img').unveil();
    });
}



var dropdownFilter1 = {

  // Declare any variables we will need as properties of the object

    $filters: null,
    $reset: null,
    groups: [],
    outputArray: [],
    outputString: '',

    // The "init" method will run on document ready and cache any jQuery objects we will need.

    init: function(myfilters, mycontainer) {
        var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "dropdownFilter" object so that we can share methods and properties between all parts of the object.

        self.$filters = myfilters;
//        self.$reset = $('#Reset');
        self.$container = mycontainer;

        self.$filters.find('fieldset').each(function() {
            self.groups.push({
                $dropdown: $(this).find('select'),
                active: ''
            });
        });
        
        self.bindHandlers();
    },

    // The "bindHandlers" method will listen for whenever a select is changed. 

    bindHandlers: function() {
        var self = this;

        // Handle select change
        self.parseFilters();
        
        self.$filters.on('selectmenuchange', 'select', function(e, ui) {
            e.preventDefault();
            self.parseFilters();
        });
        
//        console.log(self.$filters.find(':selected').val());
//        
//        if(self.$filters.find(':selected').val() != "") {
//            console.log('parse');
//            self.parseFilters();
//        }
        
        // Handle reset click

//        self.$reset.on('click', function(e) {
//          e.preventDefault();
//
//          self.$filters.find('select').val('');
//
//          self.parseFilters();
//        });
    },

    // The parseFilters method pulls the value of each active select option

    parseFilters: function() {
        var self = this;

        // loop through each filter group and grap the value from each one.
        for (var i = 0, group; group = self.groups[i]; i++) {
            group.active = group.$dropdown.val();
        }

        self.concatenate();
    },

    // The "concatenate" method will crawl through each group, concatenating filters as desired:

    concatenate: function() {
        var self = this;

        self.outputString = ''; // Reset output string

        for (var i = 0, group; group = self.groups[i]; i++) {
            self.outputString += group.active;
        }

        // If the output string is empty, show all rather than none:

        !self.outputString.length && (self.outputString = 'all');

        console.log(self.outputString); 

        // ^ we can check the console here to take a look at the filter string that is produced

        // Send the output string to MixItUp via the 'filter' method:

        if (self.$container.mixItUp('isLoaded')) {
            self.$container.mixItUp('filter', self.outputString);
        }
    }
};

var dropdownFilter2 = {

  // Declare any variables we will need as properties of the object

    $filters: null,
    $reset: null,
    groups: [],
    outputArray: [],
    outputString: '',

    // The "init" method will run on document ready and cache any jQuery objects we will need.

    init: function(myfilters, mycontainer) {
        var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "dropdownFilter" object so that we can share methods and properties between all parts of the object.

        self.$filters = myfilters;
//        self.$reset = $('#Reset');
        self.$container = mycontainer;

        self.$filters.find('fieldset').each(function() {
            self.groups.push({
                $dropdown: $(this).find('select'),
                active: ''
            });
        });
        
        self.bindHandlers();
    },

    // The "bindHandlers" method will listen for whenever a select is changed. 

    bindHandlers: function() {
        var self = this;

        self.parseFilters();

        // Handle select change

        self.$filters.on('selectmenuchange', 'select', function(e, ui) {
            e.preventDefault();
            self.parseFilters();
        });

        // Handle reset click

//        self.$reset.on('click', function(e) {
//          e.preventDefault();
//
//          self.$filters.find('select').val('');
//
//          self.parseFilters();
//        });
    },

    // The parseFilters method pulls the value of each active select option

    parseFilters: function() {
        var self = this;

        // loop through each filter group and grap the value from each one.

        for (var i = 0, group; group = self.groups[i]; i++) {
            group.active = group.$dropdown.val();
        }

        self.concatenate();
    },

    // The "concatenate" method will crawl through each group, concatenating filters as desired:

    concatenate: function() {
        var self = this;

        self.outputString = ''; // Reset output string

        for (var i = 0, group; group = self.groups[i]; i++) {
            self.outputString += group.active;
        }

        // If the output string is empty, show all rather than none:

        !self.outputString.length && (self.outputString = 'all');

//        console.log(self.outputString); 

        // ^ we can check the console here to take a look at the filter string that is produced

        // Send the output string to MixItUp via the 'filter' method:

        if (self.$container.mixItUp('isLoaded')) {
            self.$container.mixItUp('filter', self.outputString);
        }
    },
};

function GmapDraggable()
{
    var isMobile = false; //initiate as false
    // device detection
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4)))
        isMobile = true;

    if (isMobile) {
        return false;
    }
    return true;
}

function get_url_param(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace( 
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
            return vars[param] ? vars[param] : null;	
    }
    return vars;
}

jQuery(document).ready(function () {
    App.initCarousels();
    App.carouselAction();
    App.scrollTop();
    App.eventCalendar();
    App.popupBrochure();
    App.newsletterAction();
    App.scrollBar();
    App.pageVoyage();
    App.contactConseiller();
    App.datetimePicker();
    App.chosenSelect();
    App.collapseVoyage();
    App.collapseMenuMobile();
    //App.radiusImage();
    App.plusdeResult();
    App.sticky();
    //App.carousel();
    //App.detechWith();
    App.favorite();
    App.hideControlCarousel();
    App.destination();
    App.profile();
    //App.checkSeoGoole();
    App.subscribeEvent();
    App.regenrate();
    AutoComplete();
    //App.select2();
    App.imgError();
    App.deniedImg();
    App.atlvUserRegister();
    App.atlvDemandeContact();
    App.atlvNavSearch();
    App.priceIncludes();
    App.compatIE();
    
    jQuery('form').each(function () {
        formId = jQuery(this).attr('id');
        if (jQuery(this).attr('id') == undefined) {
            formId = 'rnd' + Math.floor(Math.random() * 1000000000);
            jQuery(this).attr('id', formId);
        }
        $("#" + formId).validate();
    });
    
    if($('#container').hasClass('voyage_page_liste')) {
        App.atlvMixItUp();
        App.pageListeVoyages();
    }
    
    if($('#container').hasClass('voyage_mesure') || $('#container').hasClass('voyage_mesure_voyage')) {
        App.atlvDevis();
    }
    
    if($('#container').hasClass('voyage_espace_perso')) {
        App.atlvUserEdit();
    }
    
    if($('#container').hasClass('voyage_inspirations')) {
        App.pageListeInspirations();
    }
    
    if($('#container').hasClass('voyage_page_thematique')) {
        App.pageThematique();
    }
});
