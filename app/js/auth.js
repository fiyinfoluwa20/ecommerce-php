(function ($) {
   "use strict";
   var AU = {
        Upload: function () {
            AU.Loader();
            AU.ZOOM();
            AU.toogle();
            AU.showup();
        },

        Loader: function () {
            $.ajaxSetup({
                cache: false,
                dataType: 'json',
                complete: function () {
                    
                }
            });
        },
        A: function A(str) {
            return encodeURIComponent(str).
                replace(/['()]/g, escape).
                replace(/\*/g, '%2A').
                replace(/%(?:7C|60|5E)/g, unescape);
        },
        ZOOM: function (){
            $('#flop').on("submit", function (e) {
                e.preventDefault();
                let a = new FormData(this),
                 b = ""
                const c = jQuery(this).attr('action');
                 a.forEach(function (k, v) {
                    b = b +  encodeURIComponent(v)+"="+encodeURIComponent(k)+"&";
                 });
                 b = b.substring(0, b.length-1).trim();
                $.ajax({
                    url: c,
                    type: 'POST',
                    data: b + "&flop"
                }).done( function (d) {
                    var e = document.getElementById('yei');
                    if (d.length > 0) {
                        let f = [];
                        d.forEach(g => {
                            switch(g.s) {
                                case 'a':
                                    $(e).show();
                                    window.scrollTo(0, 300);
                                    document.getElementById('hxz').className = 'pb-3';
                                    const h = document.createElement('li');
                                    e.className =  g.t + ' pl-3 pb-2 pt-2';
                                    h.append(document.createTextNode(g.m));
                                    f.push(h);
                                break;
                                case 'b':
                                    $(e).hide();
                                    window.location.href = g.m;
                                break;
                                case 'c':
                                    $(e).hide();
                                    Swal.fire({
                                        html: g.m,
                                        icon: g.t,
                                        showCancelButton: false,
                                        closeOnConfirm: false
                                    });
                                break;
                            }
                             
                        });
                        $(e).html(f);
                    }

                });
                return false;
            });

            $("#floi").on('submit', function (e) {
                e.preventDefault();
                let a = new FormData(this),
                b = "";
                a.forEach(function (k, v) {
                    b = b + AU.A(v)+"="+AU.A(k)+"&";
                });
                const z = this.querySelector('action');
                b = b.substring(0, b.length-1);
                $.ajax({
                    url: z,
                    type: 'POST',
                    data: b + "&floi"
                }).done( function (i) {
                    var c = document.getElementById('sss');
                    if (i.length > 0) {
                        let d = [];
                        i.forEach(a => {
                            switch(a.s) {
                                case 'a':
                                    $(c).show();
                                    window.scrollTo(0, 300);
                                    document.getElementById('hzzz').className = 'pb-3';
                                    const e = document.createElement('li');
                                    c.className =  a.t + ' pl-3 pb-2 pt-2';
                                    e.append(document.createTextNode(a.m));
                                    d.push(e);
                                break;
                                case 'b':
                                    $(c).hide();
                                    window.location.href = a.m;
                                break;
                                case 'c':
                                    $('#authmodal').modal('hide');
                                    var f = document.getElementById('profile');
                                    f.textContent = a.n;
                                    Swal.fire({
                                        html: a.m,
                                        icon: a.t,
                                        showCancelButton: false,
                                        closeOnConfirm: false,
                                        showClass: {
                                                    popup: a.p
                                                }
                                    });
                                break;
                            }
                             
                        });
                        $(c).html(d);
                    }
                });
                return false;
            });

            $('#inV').on('submit', function (e) {
                e.preventDefault();
                let a = new FormData(this),
                b = ""
                a.forEach(function (k, v) {
                    b = b + AU.A(v)+"="+AU.A(k)+"&";
                });
                let t = this;
                b = b.substring(0, b.length-1);
                $.post('checkout', b + '&Inv', function (c) {
                    var d = document.getElementById('InV');
                    if (c.length > 0) {
                        let e = [];
                        c.forEach(f => {
                            switch(f.s) {
                                case 'a':
                                    $(d).show();
                                    window.scrollTo(0, 300);
                                    document.getElementById('INV').className = 'mb-3';
                                    const g = document.createElement('li');
                                    d.className =  f.t + ' pl-3 pb-2 pt-2';
                                    g.append(document.createTextNode(f.m));
                                    e.push(g);
                                break;
                                case 'b':
                                    $(d).hide();
                                    Swal.fire({
                                        html: f.m,
                                        icon: f.t,
                                        showCancelButton: false,
                                        closeOnConfirm: false,
                                        showClass: {
                                                    popup: f.p
                                                }
                                    });
                                break;
                                case 'c':
                                    $('.pre-loader').addClass('visible');
                                    $('.pre-loader').fadeIn();
                                    $('.pre-loader').fadeOut(2000);
                                    $(d).hide();
                                    window.location.href = f.m;
                                break;
                                case 'd':
                                    $('#authmodal').modal('show');
                                break;
                            }
                             
                        });
                        $(d).html(e);
                    }

                });
                return false;
            });
            

            $("#Deu").submit(function (e) {
                e.preventDefault();
                    let a = new FormData(this),
                     b = "";
                    a.forEach(function (k, v) {
                        b = b +  encodeURIComponent(v)+"="+encodeURIComponent(k)+"&";
                    });
                    b = b.substring(0, b.length-1).trim();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: b + "&Deu"
                    }).done ( function (s) {
                        var c = document.getElementById('zzg');
                        if (s.length > 0) {
                            let f = [];
                            s.forEach(d => {
                                switch(d.style) {
                                    case 'a':
                                        $(c).show();
                                        window.scrollTo(0, 100);
                                        document.getElementById('hxlz').className = 'pb-4';
                                        const e = document.createElement('li');
                                        c.className =  d.type + ' pl-3 pb-2 pt-2';
                                        e.append(document.createTextNode(d.message));
                                        f.push(e);
                                    break;
                                    case 'b':
                                        $(c).hide();
                                        Swal.fire({
                                            html: d.message,
                                            icon: d.type,
                                            text: "You are not authorised",
                                            showCancelButton: false,
                                            closeOnConfirm: false,
                                            showClass: {
                                                        popup: d.pattern
                                                    }
                                        });
                                    break;
                                    case 'c':
                                        $(c).hide();
                                        window.location.reload(true);
                                    break;
                                }
                                 
                            });
                            $(c).html(f);
                        }

                    });
                return false;
            });
            $('#invoice_state').on('change', function (e) {
                e.preventDefault();
                $.post('checkout', {ssd: this.value}, function (a) {
                    let g = document.getElementById('town_invoice1'),
                     e = [];
                    e.push(document.createElement('option'));
                    a.forEach(c => {
                        const d = document.createElement('option');
                        d.value = c;
                        d.textContent = c;
                        e.push(d);
                    });
                    $(g).html(e);
                })
            });
            $('#state_shipping1').on('change', function (e) {
                e.preventDefault();
                $.post('checkout', {ssd: this.value}, function (a) {
                    let f = document.getElementById('town_shipping1'),
                     e = [];
                    e.push(document.createElement('option'));
                    a.forEach(c => {
                        const d = document.createElement('option');
                        d.value = c;
                        d.textContent = c;
                        e.push(d);
                    });
                    $(f).html(e);
                })
            });

            $('input[name="usergetaddress"]').on('change', function (e) {
                e.preventDefault();
                var a = $(this).attr('id');
                const v1 = document.getElementById('firstname_invoice1');
                const v2 = document.getElementById('lastname_invoice1');
                const v3 = document.getElementById('email_invoice1');
                const v4 = document.getElementById('country_invoice1');
                const v5 = document.getElementById('town_invoice1');
                const v6 = document.getElementById('invoice_state');
                const v7 = document.getElementById('telephone_invoice1');
                const v9 = document.getElementById('company_invoice1');
                const v01 = document.getElementById('address_invoice1');
                const s1 = document.getElementById('firstname_shipping1');
                const s2 = document.getElementById('lastname_shipping1');
                const s3 = document.getElementById('email_shipping1');
                const s4 = document.getElementById('country_shipping1');
                const s5 = document.getElementById('town_shipping1');
                const s6 = document.getElementById('state_shipping1');
                const s7 = document.getElementById('telephone_shipping1');
                const s9 = document.getElementById('company_shipping1');
                const s01 = document.getElementById('address_shipping1');

                var ADD = $.ajax({
                    url: 'checkout',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {iad: a}
                });
                ADD.done( function (i) {
                    if (i !== ' ') {
                        v1.value = i.firstname_invoice;
                        v2.value = i.lastname_invoice;
                        v3.value = i.email_invoice;
                        v4.value = i.country_invoice;
                        v5.value = i.town_invoice;
                        v6.value = i.state_invoice;
                        v7.value = i.telephone_invoice;
                        v9.value = i.company_invoice === 'empty' ? '' : i.company_invoice;
                        v01.value = i.address_invoice;
                        if(i.inputcount > 0) {
                            $('#shippingAddress').collapse('show');
                            $('#customSwitch1').prop('checked', true);
                            s1.value = i.firstname_shipping === 'empty' ? '' : i.firstname_shipping ;
                            s2.value = i.lastname_shipping === 'empty' ? '' : i.lastname_shipping;
                            s3.value = i.email_shipping === 'empty' ? '' : i.email_shipping;
                            s4.value = i.country_shipping === 'empty' ? '' : i.country_shipping;
                            s5.value = i.town_shipping === 'empty' ? '' : i.town_shipping;
                            s6.value = i.state_shipping === 'empty' ? '' : i.state_shipping;
                            s7.value = i.telephone_shipping === 'empty' ? '' : i.telephone_shipping;
                            s9.value = i.company_shipping === 'empty' ? '' : i.company_shipping;
                            s01.value = i.address_shipping === 'empty' ? '' : i.address_shipping;
                        } else {
                            $('#customSwitch1').prop('checked', false);
                            $('#shippingAddress').collapse('hide');
                        }

                    }
                });
                return false;
            });

            $('#edInv').submit(function (e) {
                e.preventDefault();
                var d = $(this).serialize();
                var ed = $(this).attr('action');
                if (d.first_name === '' || d.last_name === '' || d.email === ''  || 
                    d.country === '' || d.state === '' || d.town === '' || d.phone_number === '' || 
                    d.zip_code === '' || d.company === '' || d.address) {
                    return false;
                }
                $('.loadingg').fadeIn();
                $.ajax({
                    url: ed,
                    type: 'POST',
                    dataType: 'JSON',
                    data: d + '&InVed'
                }).done(function (f){
                    var di = document.getElementById('EdInV');
                    if (f.length > 0) {
                        var div = "<div class='pl-3 pb-2 pt-2' role='alert'>";
                        f.forEach(h => {
                            switch(h.style) {
                                case 'dollwi':
                                    $(di).show();
                                    $('.loadingg').fadeOut(0);
                                    document.getElementById('DInV').className = 'mb-3';
                                    div += '<li>' + h.message + '</li>';
                                    di.className = h.type;
                                break;
                                case 'modal':
                                    $(di).hide();
                                    $('.loadingg').fadeOut(300);
                                    Swal.fire({
                                        text: h.message,
                                        icon: h.type, 
                                        showConfirmButton: false,
                                        showCancelButton: false
                                    });
                                break;
                                case 'success':
                                    $(di).hide();
                                    $('.loadingg').fadeOut(5000);
                                    setInterval( function () {
                                        window.location.reload(true);
                                    }, 5000);
                                break;
                            }
                             
                        });
                        div += '</div>';
                        $(di).html(div);
                    }
                            
                });

                return false;
            });

            $('#Connt').submit(function (e){
                var d = $(this).serialize();
                $.ajax({
                    url: 'contact',
                    type: 'post',
                    dataType: 'JSON',
                    data: d + '&ContactForm'
                }).done( function (a) {
                    var di = document.getElementById('vmv');
                    if (a.length > 0) {
                        var div = "<div class='pl-3 pb-2 pt-2' role='alert'>";
                        a.forEach(h => {
                            switch(h.style){
                                case 'dollwi':
                                    $(di).show();
                                    window.scrollTo(0, 300);
                                    document.getElementById('Lo').className = 'pb-4';
                                    div += '<li>' + h.message + '</li>';
                                    di.className =  h.type;
                                break;
                                case 'Owell':
                                    $(di).hide();
                                    window.location.href = 'mailto:'+h.email+'?subject='+h.subject+'&body='+h.message;
                                break;
                            }
                        });
                        div += '</div>';
                        di.innerHTML =  div;
                    }
                });
                return false;
            });


        },
        toogle: function () {
            for (let a = document.querySelectorAll(".password-toggle"), b = function(E) {
                let c = a[E].querySelector(".form-control"),
                d = a[E].querySelector(".password-toggle-btn");
                    d.addEventListener("click", function(e) {
                    if (typeof e.target.type !== undefined) {
                        "checkbox" === e.target.type && (e.target.checked ? c.type = "text" : c.type = "password")
                    }
                    }, !1)
            }, i = 0; i < a.length; i++)
            b(i);
        },
        showup: function () {
            let a = document.getElementById('gen'), 
             b =  document.getElementById('rst-pw'), 
             c = document.getElementById('clipboard'), 
             d = document.getElementById('sign-up-psw'),  
             e = document.getElementById('generator');
             if (!a || !b || !c || !d || !e) {
                return;
             }
            d.addEventListener('focus', () => {
                e.className = 'input-group form-group py-2 visible gen';
            });
            c.addEventListener('click', () => {
                let t = document.createElement('textarea'),
                q = b.textContent;
                if(!q || !q.match(/^[A-Za-z0-9]+$/)) { return false; }
                t.value = this.A(q);
                d.value = this.A(q);
                document.body.appendChild(t);
                t.select();
                document.execCommand('copy');
                t.remove();
                Swal.fire({
                    text: "Copied",
                    icon: 'success',
                    showConfirmButton: false,
                    showCancelButton: false,
                    closeOnConfirm: false,
                    closeOnCancel: false
                });
            });  
            a.addEventListener('click', () => {
                b.textContent = AU.generatePassword();
            });
        },

        generatePassword: function () {
            let a = '';
            const b = 13;
            for(let i=0; i<b; i++) {
                    a += this.getRandomLower() + this.getRandomUpper() + this.getRandomNumber();
            }
            return a.slice(0, b);
        },
        getRandomLower: function () {
            return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
        },
        getRandomUpper: function () {
            return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
        },
        getRandomNumber: function () {
            return +String.fromCharCode(Math.floor(Math.random() * 10) + 48);
        }

    };

   $(document).ready(function () {
        AU.Upload();
    });

})(jQuery);