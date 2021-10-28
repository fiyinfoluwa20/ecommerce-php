(function (t) {
    "use strict";

    var load = {
        loader: function () {
            load.Llup();
            load.scrollbar();
            load.CC();
            load.Imple();
            load.Qreq();
            load.Qty();
            load.delC();
            load.WPIOK();
            load.clickk();
        },

        Llup: function () {
            $.ajaxSetup({
                cache: false,
                dataType: "JSON",
                complete: function () {
                    $('.loadin').fadeOut(100);
                    $('.loadingg').fadeOut(20);
                    $('#tt').toast('show');

                }
            });
        },
        A: function A(str) {
            return encodeURIComponent(str).
                replace(/['()]/g, escape).
                replace(/\*/g, '%2A').
                replace(/%(?:7C|60|5E)/g, unescape);
        },
        scrollbar: function () {
            document.addEventListener('mousemove', () => {
                var n = document.getElementById('rmv'),
                 b = document.getElementById('mCSB_1_scrollbar_vertical'),
                 t = $('#logs').innerHeight(),
                 z = 'mCSB_scrollTools',
                 c = 'custom-scrollbar sidebar-cart-product-wrapper',
                 x = window.matchMedia("(max-width: 992px)");
                if (x.matches) {
                    if (t > 346) {
                        if (!$(n).hasClass(c)) {
                            n.className = c;
                        }
                        if (!$(b).hasClass(z)) {
                            $(b).addClass(z);
                        }
                        $(".custom-scrollbar").mCustomScrollbar({
                            scrollInertia: 200,
                            theme:"dark-thin",
                            autoExpandScrollbar: true,
                            advanced: { autoExpandHorizontalScroll: true }
                        });
                    }
                    if (t <= 346) {
                        if ($(n).hasClass(c)) {
                            $(n).removeClass(c);
                        }
                        if ($(b).hasClass(z)) {
                            $(b).removeClass(z);
                        }
                    }
                } else {
                    if (t > 330) {
                        if (!$(n).hasClass(c)) {
                            n.className = c;
                        }
                        if (!$(b).hasClass(z)) {
                            $(b).addClass(z);
                        }
                        $(".custom-scrollbar").mCustomScrollbar({
                            scrollInertia: 200,
                            theme:"dark-thin",
                            autoExpandScrollbar: true,
                            advanced: { autoExpandHorizontalScroll: true }
                        });
                    }
                    if (t <= 346) {
                        if ($(n).hasClass(c)) {
                            $(n).removeClass(c);
                        }
                        if ($(b).hasClass(z)) {
                            $(b).removeClass(z);
                        }
                    }
                }
                let a = document.querySelector('.pay');
                if (a !== null) {
                    a.className += ' disabled pointer-none';
                }
                let u = document.getElementById('floi');
                if (!u) {
                    return
                }
                let
                w = u.querySelector('button'), 
                e = document.getElementById('flop'),
                d = e.querySelector('button[name="flop"]');
                u.addEventListener('input', (A) => {
                    if (A.target.type === "checkbox") {
                        return false;
                    }else if (A.target.value.trim() === '') {
                        w.className += ' disabled pointer-none';
                    } else {
                        w.className = 'btn btn-primary';
                    }
                });
                e.addEventListener('input', (g) => {
                    if (g.target.type === "checkbox") {
                        return false;
                    }else if (g.target.value.trim() === '') {
                        d.className += ' disabled pointer-none';
                    } else {
                        d.className = 'btn btn-primary';
                    }
                });
            });
        },
        Qreq: function() {
            $.post('cart', 'log', function( a ) {
                if (a.length > 0) {
                    var c = [],
                     d = [],
                     h = [],
                     e = document.getElementById('logs'),
                     f = document.getElementById('loggs'),
                     g = document.getElementById('pv')
                    a.forEach( b => {
                        switch(b.status){
                            case "a":
                                $('#eptc').hide();
                                $(e).show();
                                c.push(b.b);
                                d.push(b.c);
                                h.push(b.d);
                            break;
                            case "b":
                                $(e).hide();
                                $('#eptc').show();
                                $('#eptc').html(b.b);
                                d.push(b.c);
                                h.push(b.d);
                                $('.paying').click(function() { return false; });
                            break;
                        }
                        
                    });
                    $(e).html(c);
                    $(f).html(d);
                    $(g).html(h);
                }
            });

            var s = load.param('status');
            if (s === 'error' && s !== undefined) {
                Swal.fire({
                    html: "Something wrong just happened, please ty again", 
                    showConfirmButton: false,
                    timer: 4000,
                    icon: "error",
                    showClass: {
                                popup: 'animate__heartBeat'
                            }
                });
            }
            
            $.post('checkout', 'Smc', function (a) {
                    if (a.length > 0) {
                        var c = [];
                        a.forEach(b => {
                           c.push(b.message);
                        });
                        $('.SomeC').html(c);
                    }
            });

            return false;
        },

        Imple: function () {
            $(document).on('submit', '#WRT', function (e) {
                e.preventDefault();
                let a = new FormData(this);
                var b = "";
                a.forEach(function (k, v) {
                    b = b + load.A(v)+"="+load.A(k)+"&";
                });
                b = b.substring(0, b.length-1);
                let c = $(this).attr('action');
                $.ajax({
                    url: c,
                    type: 'POST',
                    data: b + '&Wrt',
                    success: function (r) {
                        let d = document.getElementById('Rerr');
                        if (r.length > 0) {
                            var g = [];
                            r.forEach(f => {
                                switch(f.s) {
                                    case 'dollwi':
                                        $(d).show();
                                        var e = document.createElement('li');
                                        d.className =  f.t + ' pl-3 pb-2 pt-2';
                                        e.append(document.createTextNode(f.m));
                                        g.push(e);
                                    break;
                                    case 'modal':
                                        $(d).hide();
                                        Swal.fire({
                                            html: f.m, 
                                            showConfirmButton: false,
                                            icon: f.t,
                                            showClass: {
                                                popup: f.p === undefined ? '' : f.p
                                            }
                                        });
                                        if (r.t == "success") {
                                            setInterval( function() {
                                                window.location.reload(true);
                                            }, 1000);
                                        } else {
                                            $('#writeReview').modal('hide');
                                            $('#reviews').modal('hide')
                                        }
                                    break;
                                }
                                    
                            });
                            $(d).html(g);
                        }
                    }
                });
            });
            
            $('#padd').on('submit', function (z) {
                z.preventDefault();
                let a = new FormData(this);
                var b = "";
                a.forEach(function (k, v) {
                    b = b + load.A(v)+"="+load.A(k)+"&";
                });
                b = b.substring(0, b.length-1);
                var c = this.action;
                const d = document.getElementById('alerts');
                const e = document.getElementById('spdd');
                var h = document.createElement('span');
                const f = this.querySelector('[name="sizes"]') || null;
                if (f != null) {
                    if (f.value && f.value.trim() == '') {
                        $(d).hide();
                        $(e).show();
                        h.textContent = 'Select a size';
                        e.className = 'text-danger mb-2';
                        $(e).html(h);
                        return false;
                    }else {
                        if ($('input[name="qty"]').val().trim() > 10) {
                            $(d).hide();
                            $(e).show();
                            h.textContent =  'Quantity must not be more than 10';
                            e.className = 'text-danger mb-2';
                            $(e).html(h);
                            return false;
                        }
                    } 
                }

                $('.pre-loader').addClass('visible');
                $('.pre-loader').fadeIn();
                $.ajax({
                    url: c,
                    method: 'post',
                    data: b + '&padd'
                }).done(function (f) {
                    if (f) {
                        switch(f.style) {
                            case 'a':
                                load.CC();
                                load.Qreq();
                                $(d).show();
                                $(e).hide();
                                $('.pre-loader').fadeOut(5000);
                                window.scrollTo(0, 100);
                                var g = load.as(f);
                                d.className = f.type;
                                $(d).html(g);
                            break;
                            case 'b':
                                $(d).hide();
                                $(e).show();
                                var h = document.createElement('span');
                                h.textContent = f.message;
                                e.className = f.type;
                                $(e).html(h);
                                $('.pre-loader').fadeOut(500);
                            break;
                        }
                    }

                });
                return false;
            });


            $('#cctc').on('click', function (e) {
                e.preventDefault();
                var c = this.querySelector('input').value.trim();
                $.ajax({
                    url: 'index',
                    method: 'POST',
                    data: {cacc: c}
                }).done( function (d) {
                    if (d.length > 0) {
                        d.forEach(a => {
                            switch(a.style) {
                                case 'a':
                                    load.CC();
                                    load.Qreq();
                                    Swal.fire({
                                        text: a.message,
                                        icon: a.type === undefined ? '' : a.type,
                                        showClass: {
                                            popup: a.pattern === undefined ? ' ' : a.pattern
                                        },
                                        showConfirmButton: false
                                    });
                                break;
                                case 'b':
                                    window.location.href = a.message;
                                break;
                            }
                             
                        });
                    }

                });
                return false;
            });
           $(document).on('click', '#shess', function(e) {
                e.preventDefault();
                const a = [this.querySelector('input').value];
                const b = document.querySelector('input[name="qty"]');
                if (b !== null) {
                    a.push(document.querySelector('input[name="qty"]').value);
                }
                $.ajax({
                    url: window.location.href,
                    type: 'POST',
                    data: {wsh: a}
                }).done(function (r) {
                    if (r) {
                        switch (r.style) {
                            case 'm':
                                Swal.fire({
                                    html: r.message, 
                                    showConfirmButton: true,
                                    icon: r.type,
                                    showClass: {
                                            popup: r.pattern === undefined ? '' : r.pattern
                                            }
                                });
                            break;
                        }
                    }
                });

                return false;
            });
        },

        Qty: function (){
            $(document).on('click', '.counter-plus', function (e) {
                e.preventDefault();
                var a = this.querySelector('input').value.trim();
                var b = $(this).prev();
                if (!b.val().trim().match(/^[0-9]+$/)) {
                    alert('invalid input');
                    return false;
                } else if (b.val() >= 10 || !a.match(/^[0-9]+$/)) {
                    return false;
                } else if (b.val() < 1){
                    return false;
                }  else {
                    b.val(parseInt(b.val(), 10) + 1);
                    var c = b.val();
                }
                $('.pre-loader').addClass('visible');
                $('.pre-loader').fadeIn();
                $.post("cart", {qty: c, ict: a}, function( d ) {
                    if(d.style) {
                        switch(d.style) {
                            case 'l':
                                load.CC();
                                load.Qreq();
                            break;
                            case 'm':
                                alert(d.message);
                            break;
                        }    
                        $('.pre-loader').fadeOut(3500);
                    }
                });
                return false;
            });

            $(document).on('change', '.counter-value', function (e) {
                e.preventDefault();
                var a = this.value.trim();
                var b = $(this).attr('id');
                if (!a.match(/^[0-9]+$/)) {
                    alert('invalid input');
                    return false;
                } else if (!b.match(/^[0-9]+$/)) {
                    return false;
                } else if (a > 10) {
                    alert('One product quatity must not be greater than 10, please contact us if you want more');
                    return false;
                } else if (a < 1) {
                    alert('Quatity must not be zero');
                    return false;
                }
                $('.pre-loader').addClass('visible');
                $('.pre-loader').fadeIn();
                $.post('cart', {puit: a, puid: b}, function (d) {
                    if (d.style) {
                        switch(d.style){
                            case 'l':
                                load.CC();
                                load.Qreq();
                            break;
                            case 'm':
                                alert(d.message);
                            break;
                        }
                        $('.pre-loader').fadeOut(3500);
                    }

                });
                return false;
            });

            $(document).on('click', '.counter-minus', function (e) {
                e.preventDefault();
                var a = this.querySelector('input').value.trim();
                var b = $(this).next();
                if (!b.val().trim().match(/^[0-9]+$/)) {
                    alert('invalid input');
                    return false;
                } else if (b.val() >= 10 || !a.match(/^[0-9]+$/)) {
                    return false;
                } else if (b.val() < 2) {
                    return false;
                } else if(b.val() > 10){
                    return false;
                }else {
                    b.val(parseInt(b.val()) - 1);
                    var c = b.val();
                }
                $('.pre-loader').addClass('visible');
                $('.pre-loader').fadeIn();
                $.post("cart", {dty: c, dct: a}, function( a ) {
                     if(a.style) {
                        switch(a.style) {
                            case 'l':
                                load.CC();
                                load.Qreq();
                            break;
                            case 'm':
                                alert(a.message);
                            break;
                        }    
                        $('.pre-loader').fadeOut(3500);
                    }
                });
                return false;
            });
        },

        CC: function () {
            $.post('cart', 'tt', function(a){
                if(a.status){
                    switch (a.status) {
                        case 'a':
                            $('#total').html(a.b);
                            $('#subtotal').html(a.c);
                            $('#count').html(a.d);
                        break;
                        case 'b':
                            $('#total,#subtotal').html(a.d);
                            $('#count').html(a.e);
                            $('.paying').click(function() { return false; });
                        break;
                    }
                }
            });
            return false;
        },

        as:function (z) {
            var a = document.createElement('div');
            var b = document.createAttribute('role');
            b.value = 'alert';
            a.setAttributeNode(b);
            var c = document.createElement('div');
            c.className = 'd-flex align-items-center';
            c.appendChild(document.createElement('span'));
            c.querySelector('span').className = 'text-reset';
            c.querySelector('span').textContent = z.message;
            c.appendChild(document.createElement('br'));
            c.querySelector('br').className = 'd-inline-block d-lg-none';
            c.appendChild(document.createElement('a'));
            c.querySelector('a').href = 'cart';
            c.querySelector('a').className = 'text-reset text-decoration-underline ml-2';
            c.querySelector('a').textContent = ' View Cart';
            var d = document.createElement('button');
            d.className = 'close';
            var e = [];
            e[0] = document.createAttribute('type');
            e[1] = document.createAttribute('aria-label');
            e[2]= document.createAttribute('data-dismiss');
            e[0].value = 'button';
            e[1].value = 'close';
            e[2].value = 'alert';
            e.forEach(f =>{
                d.setAttributeNode(f);
            });
            a.appendChild(c);
            a.appendChild(d);
            return a;
        },
        delC: function (){
            $(document).on('click', '.delC', function (e) {
                    e.preventDefault();
                    var d = $(this).attr('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        closeOnConfirm: true,
                        closeOnCancel: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-danger',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function (isConfirmed) {
                        if (isConfirmed.value) {
                        $('.pre-loader').addClass('visible');
                        $('.pre-loader').fadeIn();
                            $.ajax({
                                url: window.location.href,
                                type: 'POST',
                                data: {del: d, isConfirmed: isConfirmed}
                            }).done(function (g) {
                                switch (g.status) {
                                    case 's':
                                    load.CC();
                                    load.Qreq();
                                    $('.pre-loader').fadeOut(10);
                                    Swal.fire({
                                        title: g.res,
                                        text: g.response,
                                        showConfirmButton: false,
                                        icon: g.type
                                    }); 
                                    break;
                                    case 'e':
                                        load.CC();
                                        load.Qreq();
                                        $('.pre-loader').fadeOut(10);
                                        Swal.fire({
                                            text: g.response,
                                            showConfirmButton: false,
                                            icon: g.type
                                        });
                                    break;
                                }

                            });

                        } else {
                            Swal.fire({
                                title:"Cancelled Successfully", 
                                showConfirmButton: false,
                                icon: "error"
                            });
                        }
                    });
                return false;   
            });

            $('.del_in').on('click', function(e) {
                e.preventDefault();
                var d = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    confirmButtonClass: 'btn-success',
                    cancelButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function (isConfirmed) {
                    if (isConfirmed.value === true) {
                        $('.pre-loader').addClass('visible');
                        $('.pre-loader').fadeIn();
                        var del = jQuery.ajax({
                            url: window.location.href,
                            type: 'POST',
                            data: {del_in: d,Cdu: isConfirmed}
                        });
                        del.done(function (o) {
                            if(o.style === 'modal'){
                                $('.pre-loader').fadeOut(500);
                                Swal.fire({
                                    html: o.message,
                                    showConfirmButton: false,
                                    icon: o.type
                                });
                                setInterval( () => {
                                    window.location.reload(true);
                                }, 1000);
                            }

                        });

                    } else {
                        Swal.fire({
                            title:"Cancelled Successfully", 
                            showConfirmButton: false,
                            icon: "error"
                        });
                    }
                });

                return false;
            });

            $('.W-del').on('click', function (e) {
                e.preventDefault();
                var s = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    confirmButtonClass: 'btn-success',
                    cancelButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function (isConfirmed) {
                    if (isConfirmed.value === true) {
                        $('.pre-loader').addClass('visible');
                        $('.pre-loader').fadeIn();
                        $.ajax({
                            url: window.location.href,
                            type: 'POST',
                            data: {wdel: s,wch: isConfirmed}
                        }).done(function (o) {
                            if(o.style === 'modal'){
                                $('.pre-loader').fadeOut(500);
                                Swal.fire({
                                    html: o.message,
                                    showConfirmButton: false,
                                    icon: o.type
                                });
                                setInterval( () => {
                                    window.location.reload(true);
                                }, 1000);
                            }

                        });

                    } else {
                        Swal.fire({
                            title:"Cancelled Successfully", 
                            showConfirmButton: false,
                            icon: "error"
                        });
                    }
                });
                return false;
            });

        },

        param: function (sParam) {
            
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;
    
                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');
    
                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
            }
                return getUrlParameter(sParam); 

        },

        WPIOK: function () {
            jQuery('.ccwsh').one('click', function (e) {
                e.preventDefault();
                var s = $(this).attr('id');
                $.ajax({
                    url: this.href,
                    type: 'POST',
                    data: {cwsh: s}
                }).done( function (r) {
                    switch (r.style){
                        case "modal":
                        Swal.fire({
                            html: r.message, 
                            showConfirmButton: true,
                            icon: r.type,
                            showClass: {
                                        popup: r.pattern === undefined ? '' : r.pattern
                                    }
                        });
                        break;
                    }
                });
                return false;
            });
        },
        clickk: function (){
            $("#clickk").click(function(e) {
                e.preventDefault();
                $('.pre-loader').addClass('visible');
                $('.pre-loader').fadeIn();
                load.Qreq();
                load.CC();
                $('.pre-loader').fadeOut(3000);
                return false;
            });
        }
    };
    $(document).ready( function () {
        load.loader();
    });
})(jQuery);
