!function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = t || self).Sweetalert2 = e()
}(this, function() {
    "use strict";
    function r(t) {
        return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        }
        : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        }
        )(t)
    }
    function a(t, e) {
        if (!(t instanceof e))
            throw new TypeError("Cannot call a class as a function")
    }
    function o(t, e) {
        for (var n = 0; n < e.length; n++) {
            var o = e[n];
            o.enumerable = o.enumerable || !1,
            o.configurable = !0,
            "value"in o && (o.writable = !0),
            Object.defineProperty(t, o.key, o)
        }
    }
    function s(t, e, n) {
        return e && o(t.prototype, e),
        n && o(t, n),
        t
    }
    function u() {
        return (u = Object.assign || function(t) {
            for (var e = 1; e < arguments.length; e++) {
                var n, o = arguments[e];
                for (n in o)
                    Object.prototype.hasOwnProperty.call(o, n) && (t[n] = o[n])
            }
            return t
        }
        ).apply(this, arguments)
    }
    function c(t) {
        return (c = Object.setPrototypeOf ? Object.getPrototypeOf : function(t) {
            return t.__proto__ || Object.getPrototypeOf(t)
        }
        )(t)
    }
    function l(t, e) {
        return (l = Object.setPrototypeOf || function(t, e) {
            return t.__proto__ = e,
            t
        }
        )(t, e)
    }
    function d() {
        if ("undefined" == typeof Reflect || !Reflect.construct)
            return !1;
        if (Reflect.construct.sham)
            return !1;
        if ("function" == typeof Proxy)
            return !0;
        try {
            return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function() {})),
            !0
        } catch (t) {
            return !1
        }
    }
    function i(t, e, n) {
        return (i = d() ? Reflect.construct : function(t, e, n) {
            var o = [null];
            o.push.apply(o, e);
            o = new (Function.bind.apply(t, o));
            return n && l(o, n.prototype),
            o
        }
        ).apply(null, arguments)
    }
    function p(t, e) {
        return !e || "object" != typeof e && "function" != typeof e ? function(t) {
            if (void 0 === t)
                throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return t
        }(t) : e
    }
    function f(t, e, n) {
        return (f = "undefined" != typeof Reflect && Reflect.get ? Reflect.get : function(t, e, n) {
            t = function(t, e) {
                for (; !Object.prototype.hasOwnProperty.call(t, e) && null !== (t = c(t)); )
                    ;
                return t
            }(t, e);
            if (t) {
                e = Object.getOwnPropertyDescriptor(t, e);
                return e.get ? e.get.call(n) : e.value
            }
        }
        )(t, e, n || t)
    }
    function m(t) {
        return t.charAt(0).toUpperCase() + t.slice(1)
    }
    function h(e) {
        return Object.keys(e).map(function(t) {
            return e[t]
        })
    }
    function g(t) {
        return Array.prototype.slice.call(t)
    }
    function v(t, e) {
        e = '"'.concat(t, '" is deprecated and will be removed in the next major release. Please use "').concat(e, '" instead.'),
        -1 === Y.indexOf(e) && (Y.push(e),
        W(e))
    }
    function b(t) {
        return t && "function" == typeof t.toPromise
    }
    function y(t) {
        return b(t) ? t.toPromise() : Promise.resolve(t)
    }
    function w(t) {
        return t && Promise.resolve(t) === t
    }
    function C(t) {
        return t instanceof Element || "object" === r(t = t) && t.jquery
    }
    function k() {
        return document.body.querySelector(".".concat($.container))
    }
    function e(t) {
        var e = k();
        return e ? e.querySelector(t) : null
    }
    function t(t) {
        return e(".".concat(t))
    }
    function A() {
        return t($.popup)
    }
    function x() {
        return t($.icon)
    }
    function B() {
        return t($.title)
    }
    function P() {
        return t($.content)
    }
    function O() {
        return t($["html-container"])
    }
    function E() {
        return t($.image)
    }
    function n() {
        return t($["progress-steps"])
    }
    function S() {
        return t($["validation-message"])
    }
    function T() {
        return e(".".concat($.actions, " .").concat($.confirm))
    }
    function L() {
        return e(".".concat($.actions, " .").concat($.deny))
    }
    function D() {
        return e(".".concat($.loader))
    }
    function q() {
        return e(".".concat($.actions, " .").concat($.cancel))
    }
    function j() {
        return t($.actions)
    }
    function M() {
        return t($.header)
    }
    function I() {
        return t($.footer)
    }
    function H() {
        return t($["timer-progress-bar"])
    }
    function V() {
        return t($.close)
    }
    function R() {
        var t = g(A().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort(function(t, e) {
            return t = parseInt(t.getAttribute("tabindex")),
            (e = parseInt(e.getAttribute("tabindex"))) < t ? 1 : t < e ? -1 : 0
        })
          , e = g(A().querySelectorAll('\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n')).filter(function(t) {
            return "-1" !== t.getAttribute("tabindex")
        });
        return function(t) {
            for (var e = [], n = 0; n < t.length; n++)
                -1 === e.indexOf(t[n]) && e.push(t[n]);
            return e
        }(t.concat(e)).filter(function(t) {
            return wt(t)
        })
    }
    function N() {
        return !G() && !document.body.classList.contains($["no-backdrop"])
    }
    function U(e, t) {
        e.textContent = "",
        t && (t = (new DOMParser).parseFromString(t, "text/html"),
        g(t.querySelector("head").childNodes).forEach(function(t) {
            e.appendChild(t)
        }),
        g(t.querySelector("body").childNodes).forEach(function(t) {
            e.appendChild(t)
        }))
    }
    function _(t, e) {
        if (e) {
            for (var n = e.split(/\s+/), o = 0; o < n.length; o++)
                if (!t.classList.contains(n[o]))
                    return;
            return 1
        }
    }
    function F(t, e, n) {
        var o, i;
        if (i = e,
        g((o = t).classList).forEach(function(t) {
            -1 === h($).indexOf(t) && -1 === h(X).indexOf(t) && -1 === h(i.showClass).indexOf(t) && o.classList.remove(t)
        }),
        e.customClass && e.customClass[n]) {
            if ("string" != typeof e.customClass[n] && !e.customClass[n].forEach)
                return W("Invalid type of customClass.".concat(n, '! Expected string or iterable object, got "').concat(r(e.customClass[n]), '"'));
            vt(t, e.customClass[n])
        }
    }
    var z = "SweetAlert2:"
      , W = function(t) {
        console.warn("".concat(z, " ").concat("object" === r(t) ? t.join(" ") : t))
    }
      , K = function(t) {
        console.error("".concat(z, " ").concat(t))
    }
      , Y = []
      , Z = function(t) {
        return "function" == typeof t ? t() : t
    }
      , Q = Object.freeze({
        cancel: "cancel",
        backdrop: "backdrop",
        close: "close",
        esc: "esc",
        timer: "timer"
    })
      , J = function(t) {
        var e, n = {};
        for (e in t)
            n[t[e]] = "swal2-" + t[e];
        return n
    }
      , $ = J(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "toast-column", "show", "hide", "close", "title", "header", "content", "html-container", "actions", "confirm", "deny", "cancel", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "input-label", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loader", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error"])
      , X = J(["success", "warning", "info", "question", "error"])
      , G = function() {
        return document.body.classList.contains($["toast-shown"])
    }
      , tt = {
        previousBodyPadding: null
    };
    function et(t, e) {
        if (!e)
            return null;
        switch (e) {
        case "select":
        case "textarea":
        case "file":
            return yt(t, $[e]);
        case "checkbox":
            return t.querySelector(".".concat($.checkbox, " input"));
        case "radio":
            return t.querySelector(".".concat($.radio, " input:checked")) || t.querySelector(".".concat($.radio, " input:first-child"));
        case "range":
            return t.querySelector(".".concat($.range, " input"));
        default:
            return yt(t, $.input)
        }
    }
    function nt(t) {
        var e;
        t.focus(),
        "file" !== t.type && (e = t.value,
        t.value = "",
        t.value = e)
    }
    function ot(t, e, n) {
        t && e && (e = "string" == typeof e ? e.split(/\s+/).filter(Boolean) : e).forEach(function(e) {
            t.forEach ? t.forEach(function(t) {
                n ? t.classList.add(e) : t.classList.remove(e)
            }) : n ? t.classList.add(e) : t.classList.remove(e)
        })
    }
    function it(t, e, n) {
        (n = n === "".concat(parseInt(n)) ? parseInt(n) : n) || 0 === parseInt(n) ? t.style[e] = "number" == typeof n ? "".concat(n, "px") : n : t.style.removeProperty(e)
    }
    function rt(t) {
        var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "flex";
        t.style.display = e
    }
    function at(t) {
        t.style.display = "none"
    }
    function st(t, e, n, o) {
        (e = t.querySelector(e)) && (e.style[n] = o)
    }
    function ut(t, e, n) {
        e ? rt(t, n) : at(t)
    }
    function ct(t) {
        return !!(t.scrollHeight > t.clientHeight)
    }
    function lt(t) {
        var e = window.getComputedStyle(t)
          , t = parseFloat(e.getPropertyValue("animation-duration") || "0")
          , e = parseFloat(e.getPropertyValue("transition-duration") || "0");
        return 0 < t || 0 < e
    }
    function dt(t) {
        var e = 1 < arguments.length && void 0 !== arguments[1] && arguments[1]
          , n = H();
        wt(n) && (e && (n.style.transition = "none",
        n.style.width = "100%"),
        setTimeout(function() {
            n.style.transition = "width ".concat(t / 1e3, "s linear"),
            n.style.width = "0%"
        }, 10))
    }
    function pt() {
        return "undefined" == typeof window || "undefined" == typeof document
    }
    function ft(t) {
        Mn.isVisible() && gt !== t.target.value && Mn.resetValidationMessage(),
        gt = t.target.value
    }
    function mt(t, e) {
        t instanceof HTMLElement ? e.appendChild(t) : "object" === r(t) ? At(t, e) : t && U(e, t)
    }
    function ht(t, e) {
        var n = j()
          , o = D()
          , i = T()
          , r = L()
          , a = q();
        e.showConfirmButton || e.showDenyButton || e.showCancelButton || at(n),
        F(n, e, "actions"),
        Pt(i, "confirm", e),
        Pt(r, "deny", e),
        Pt(a, "cancel", e),
        function(t, e, n, o) {
            if (!o.buttonsStyling)
                return bt([t, e, n], $.styled);
            vt([t, e, n], $.styled),
            o.confirmButtonColor && (t.style.backgroundColor = o.confirmButtonColor);
            o.denyButtonColor && (e.style.backgroundColor = o.denyButtonColor);
            o.cancelButtonColor && (n.style.backgroundColor = o.cancelButtonColor)
        }(i, r, a, e),
        e.reverseButtons && (n.insertBefore(a, o),
        n.insertBefore(r, o),
        n.insertBefore(i, o)),
        U(o, e.loaderHtml),
        F(o, e, "loader")
    }
    var gt, vt = function(t, e) {
        ot(t, e, !0)
    }, bt = function(t, e) {
        ot(t, e, !1)
    }, yt = function(t, e) {
        for (var n = 0; n < t.childNodes.length; n++)
            if (_(t.childNodes[n], e))
                return t.childNodes[n]
    }, wt = function(t) {
        return !(!t || !(t.offsetWidth || t.offsetHeight || t.getClientRects().length))
    }, Ct = '\n <div aria-labelledby="'.concat($.title, '" aria-describedby="').concat($.content, '" class="').concat($.popup, '" tabindex="-1">\n   <div class="').concat($.header, '">\n     <ul class="').concat($["progress-steps"], '"></ul>\n     <div class="').concat($.icon, '"></div>\n     <img class="').concat($.image, '" />\n     <h2 class="').concat($.title, '" id="').concat($.title, '"></h2>\n     <button type="button" class="').concat($.close, '"></button>\n   </div>\n   <div class="').concat($.content, '">\n     <div id="').concat($.content, '" class="').concat($["html-container"], '"></div>\n     <input class="').concat($.input, '" />\n     <input type="file" class="').concat($.file, '" />\n     <div class="').concat($.range, '">\n       <input type="range" />\n       <output></output>\n     </div>\n     <select class="').concat($.select, '"></select>\n     <div class="').concat($.radio, '"></div>\n     <label for="').concat($.checkbox, '" class="').concat($.checkbox, '">\n       <input type="checkbox" />\n       <span class="').concat($.label, '"></span>\n     </label>\n     <textarea class="').concat($.textarea, '"></textarea>\n     <div class="').concat($["validation-message"], '" id="').concat($["validation-message"], '"></div>\n   </div>\n   <div class="').concat($.actions, '">\n     <div class="').concat($.loader, '"></div>\n     <button type="button" class="').concat($.confirm, '"></button>\n     <button type="button" class="').concat($.deny, '"></button>\n     <button type="button" class="').concat($.cancel, '"></button>\n   </div>\n   <div class="').concat($.footer, '"></div>\n   <div class="').concat($["timer-progress-bar-container"], '">\n     <div class="').concat($["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, ""), kt = function(t) {
        var e, n, o, i, r, a = !!(i = k()) && (i.parentNode.removeChild(i),
        bt([document.documentElement, document.body], [$["no-backdrop"], $["toast-shown"], $["has-column"]]),
        !0);
        pt() ? K("SweetAlert2 requires document to initialize") : ((r = document.createElement("div")).className = $.container,
        a && vt(r, $["no-transition"]),
        U(r, Ct),
        (i = "string" == typeof (e = t.target) ? document.querySelector(e) : e).appendChild(r),
        a = t,
        (e = A()).setAttribute("role", a.toast ? "alert" : "dialog"),
        e.setAttribute("aria-live", a.toast ? "polite" : "assertive"),
        a.toast || e.setAttribute("aria-modal", "true"),
        r = i,
        "rtl" === window.getComputedStyle(r).direction && vt(k(), $.rtl),
        t = P(),
        a = yt(t, $.input),
        e = yt(t, $.file),
        n = t.querySelector(".".concat($.range, " input")),
        o = t.querySelector(".".concat($.range, " output")),
        i = yt(t, $.select),
        r = t.querySelector(".".concat($.checkbox, " input")),
        t = yt(t, $.textarea),
        a.oninput = ft,
        e.onchange = ft,
        i.onchange = ft,
        r.onchange = ft,
        t.oninput = ft,
        n.oninput = function(t) {
            ft(t),
            o.value = n.value
        }
        ,
        n.onchange = function(t) {
            ft(t),
            n.nextSibling.value = n.value
        }
        )
    }, At = function(t, e) {
        t.jquery ? xt(e, t) : U(e, t.toString())
    }, xt = function(t, e) {
        if (t.textContent = "",
        0 in e)
            for (var n = 0; n in e; n++)
                t.appendChild(e[n].cloneNode(!0));
        else
            t.appendChild(e.cloneNode(!0))
    }, Bt = function() {
        if (pt())
            return !1;
        var t, e = document.createElement("div"), n = {
            WebkitAnimation: "webkitAnimationEnd",
            OAnimation: "oAnimationEnd oanimationend",
            animation: "animationend"
        };
        for (t in n)
            if (Object.prototype.hasOwnProperty.call(n, t) && void 0 !== e.style[t])
                return n[t];
        return !1
    }();
    function Pt(t, e, n) {
        ut(t, n["show".concat(m(e), "Button")], "inline-block"),
        U(t, n["".concat(e, "ButtonText")]),
        t.setAttribute("aria-label", n["".concat(e, "ButtonAriaLabel")]),
        t.className = $[e],
        F(t, n, "".concat(e, "Button")),
        vt(t, n["".concat(e, "ButtonClass")])
    }
    function Ot(t, e) {
        var n, o, i = k();
        i && (o = i,
        "string" == typeof (n = e.backdrop) ? o.style.background = n : n || vt([document.documentElement, document.body], $["no-backdrop"]),
        !e.backdrop && e.allowOutsideClick && W('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'),
        o = i,
        (n = e.position)in $ ? vt(o, $[n]) : (W('The "position" parameter is not valid, defaulting to "center"'),
        vt(o, $.center)),
        n = i,
        !(o = e.grow) || "string" != typeof o || (o = "grow-".concat(o))in $ && vt(n, $[o]),
        F(i, e, "container"),
        (e = document.body.getAttribute("data-swal2-queue-step")) && (i.setAttribute("data-queue-step", e),
        document.body.removeAttribute("data-swal2-queue-step")))
    }
    function Et(t, e) {
        t.placeholder && !e.inputPlaceholder || (t.placeholder = e.inputPlaceholder)
    }
    function St(t, e, n) {
        var o, i;
        n.inputLabel && (t.id = $.input,
        o = document.createElement("label"),
        i = $["input-label"],
        o.setAttribute("for", t.id),
        o.className = i,
        vt(o, n.customClass.inputLabel),
        o.innerText = n.inputLabel,
        e.insertAdjacentElement("beforebegin", o))
    }
    var Tt = {
        promise: new WeakMap,
        innerParams: new WeakMap,
        domCache: new WeakMap
    }
      , Lt = ["input", "file", "range", "select", "radio", "checkbox", "textarea"]
      , Dt = function(t) {
        if (!It[t.input])
            return K('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(t.input, '"'));
        var e = Mt(t.input)
          , n = It[t.input](e, t);
        rt(n),
        setTimeout(function() {
            nt(n)
        })
    }
      , qt = function(t, e) {
        var n = et(P(), t);
        if (n)
            for (var o in !function(t) {
                for (var e = 0; e < t.attributes.length; e++) {
                    var n = t.attributes[e].name;
                    -1 === ["type", "value", "style"].indexOf(n) && t.removeAttribute(n)
                }
            }(n),
            e)
                "range" === t && "placeholder" === o || n.setAttribute(o, e[o])
    }
      , jt = function(t) {
        var e = Mt(t.input);
        t.customClass && vt(e, t.customClass.input)
    }
      , Mt = function(t) {
        t = $[t] || $.input;
        return yt(P(), t)
    }
      , It = {};
    It.text = It.email = It.password = It.number = It.tel = It.url = function(t, e) {
        return "string" == typeof e.inputValue || "number" == typeof e.inputValue ? t.value = e.inputValue : w(e.inputValue) || W('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(r(e.inputValue), '"')),
        St(t, t, e),
        Et(t, e),
        t.type = e.input,
        t
    }
    ,
    It.file = function(t, e) {
        return St(t, t, e),
        Et(t, e),
        t
    }
    ,
    It.range = function(t, e) {
        var n = t.querySelector("input")
          , o = t.querySelector("output");
        return n.value = e.inputValue,
        n.type = e.input,
        o.value = e.inputValue,
        St(n, t, e),
        t
    }
    ,
    It.select = function(t, e) {
        var n;
        return t.textContent = "",
        e.inputPlaceholder && (n = document.createElement("option"),
        U(n, e.inputPlaceholder),
        n.value = "",
        n.disabled = !0,
        n.selected = !0,
        t.appendChild(n)),
        St(t, t, e),
        t
    }
    ,
    It.radio = function(t) {
        return t.textContent = "",
        t
    }
    ,
    It.checkbox = function(t, e) {
        var n = et(P(), "checkbox");
        n.value = 1,
        n.id = $.checkbox,
        n.checked = Boolean(e.inputValue);
        n = t.querySelector("span");
        return U(n, e.inputPlaceholder),
        t
    }
    ,
    It.textarea = function(e, t) {
        e.value = t.inputValue,
        Et(e, t),
        St(e, e, t);
        function n(t) {
            return parseInt(window.getComputedStyle(t).paddingLeft) + parseInt(window.getComputedStyle(t).paddingRight)
        }
        var o;
        return "MutationObserver"in window && (o = parseInt(window.getComputedStyle(A()).width),
        new MutationObserver(function() {
            var t = e.offsetWidth + n(A()) + n(P());
            A().style.width = o < t ? "".concat(t, "px") : null
        }
        ).observe(e, {
            attributes: !0,
            attributeFilter: ["style"]
        })),
        e
    }
    ;
    function Ht(t, e) {
        var o, i, r, n = O();
        F(n, e, "htmlContainer"),
        e.html ? (mt(e.html, n),
        rt(n, "block")) : e.text ? (n.textContent = e.text,
        rt(n, "block")) : at(n),
        t = t,
        o = e,
        i = P(),
        t = Tt.innerParams.get(t),
        r = !t || o.input !== t.input,
        Lt.forEach(function(t) {
            var e = $[t]
              , n = yt(i, e);
            qt(t, o.inputAttributes),
            n.className = e,
            r && at(n)
        }),
        o.input && (r && Dt(o),
        jt(o)),
        F(P(), e, "content")
    }
    function Vt() {
        return k() && k().getAttribute("data-queue-step")
    }
    function Rt(t, o) {
        var i = n();
        if (!o.progressSteps || 0 === o.progressSteps.length)
            return at(i),
            0;
        rt(i),
        i.textContent = "";
        var r = parseInt(void 0 === o.currentProgressStep ? Vt() : o.currentProgressStep);
        r >= o.progressSteps.length && W("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"),
        o.progressSteps.forEach(function(t, e) {
            var n, t = (n = t,
            t = document.createElement("li"),
            vt(t, $["progress-step"]),
            U(t, n),
            t);
            i.appendChild(t),
            e === r && vt(t, $["active-progress-step"]),
            e !== o.progressSteps.length - 1 && (t = o,
            e = document.createElement("li"),
            vt(e, $["progress-step-line"]),
            t.progressStepsDistance && (e.style.width = t.progressStepsDistance),
            e = e,
            i.appendChild(e))
        })
    }
    function Nt(t, e) {
        var n, o = M();
        F(o, e, "header"),
        Rt(0, e),
        n = t,
        o = e,
        t = Tt.innerParams.get(n),
        n = x(),
        t && o.icon === t.icon ? (Wt(n, o),
        Ft(n, o)) : o.icon || o.iconHtml ? o.icon && -1 === Object.keys(X).indexOf(o.icon) ? (K('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(o.icon, '"')),
        at(n)) : (rt(n),
        Wt(n, o),
        Ft(n, o),
        vt(n, o.showClass.icon)) : at(n),
        function(t) {
            var e = E();
            if (!t.imageUrl)
                return at(e);
            rt(e, ""),
            e.setAttribute("src", t.imageUrl),
            e.setAttribute("alt", t.imageAlt),
            it(e, "width", t.imageWidth),
            it(e, "height", t.imageHeight),
            e.className = $.image,
            F(e, t, "image")
        }(e),
        o = e,
        n = B(),
        ut(n, o.title || o.titleText),
        o.title && mt(o.title, n),
        o.titleText && (n.innerText = o.titleText),
        F(n, o, "title"),
        o = e,
        e = V(),
        U(e, o.closeButtonHtml),
        F(e, o, "closeButton"),
        ut(e, o.showCloseButton),
        e.setAttribute("aria-label", o.closeButtonAriaLabel)
    }
    function Ut(t, e) {
        var n, o, i;
        i = e,
        n = k(),
        o = A(),
        i.toast ? (it(n, "width", i.width),
        o.style.width = "100%") : it(o, "width", i.width),
        it(o, "padding", i.padding),
        i.background && (o.style.background = i.background),
        at(S()),
        Qt(o, i),
        Ot(0, e),
        Nt(t, e),
        Ht(t, e),
        ht(0, e),
        i = e,
        t = I(),
        ut(t, i.footer),
        i.footer && mt(i.footer, t),
        F(t, i, "footer"),
        "function" == typeof e.didRender ? e.didRender(A()) : "function" == typeof e.onRender && e.onRender(A())
    }
    function _t() {
        return T() && T().click()
    }
    var Ft = function(t, e) {
        for (var n in X)
            e.icon !== n && bt(t, X[n]);
        vt(t, X[e.icon]),
        Kt(t, e),
        zt(),
        F(t, e, "icon")
    }
      , zt = function() {
        for (var t = A(), e = window.getComputedStyle(t).getPropertyValue("background-color"), n = t.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix"), o = 0; o < n.length; o++)
            n[o].style.backgroundColor = e
    }
      , Wt = function(t, e) {
        t.textContent = "",
        e.iconHtml ? U(t, Yt(e.iconHtml)) : "success" === e.icon ? U(t, '\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    ') : "error" === e.icon ? U(t, '\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    ') : U(t, Yt({
            question: "?",
            warning: "!",
            info: "i"
        }[e.icon]))
    }
      , Kt = function(t, e) {
        if (e.iconColor) {
            t.style.color = e.iconColor,
            t.style.borderColor = e.iconColor;
            for (var n = 0, o = [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]; n < o.length; n++)
                st(t, o[n], "backgroundColor", e.iconColor);
            st(t, ".swal2-success-ring", "borderColor", e.iconColor)
        }
    }
      , Yt = function(t) {
        return '<div class="'.concat($["icon-content"], '">').concat(t, "</div>")
    }
      , Zt = []
      , Qt = function(t, e) {
        t.className = "".concat($.popup, " ").concat(wt(t) ? e.showClass.popup : ""),
        e.toast ? (vt([document.documentElement, document.body], $["toast-shown"]),
        vt(t, $.toast)) : vt(t, $.modal),
        F(t, e, "popup"),
        "string" == typeof e.customClass && vt(t, e.customClass),
        e.icon && vt(t, $["icon-".concat(e.icon)])
    };
    function Jt(t) {
        (e = A()) || Mn.fire();
        var e = A()
          , n = j()
          , o = D();
        !t && wt(T()) && (t = T()),
        rt(n),
        t && (at(t),
        o.setAttribute("data-button-to-replace", t.className)),
        o.parentNode.insertBefore(o, t),
        vt([e, n], $.loading),
        rt(o),
        e.setAttribute("data-loading", !0),
        e.setAttribute("aria-busy", !0),
        e.focus()
    }
    function $t() {
        return new Promise(function(t) {
            var e = window.scrollX
              , n = window.scrollY;
            te.restoreFocusTimeout = setTimeout(function() {
                te.previousActiveElement && te.previousActiveElement.focus ? (te.previousActiveElement.focus(),
                te.previousActiveElement = null) : document.body && document.body.focus(),
                t()
            }, 100),
            void 0 !== e && void 0 !== n && window.scrollTo(e, n)
        }
        )
    }
    function Xt() {
        if (te.timeout)
            return function() {
                var t = H()
                  , e = parseInt(window.getComputedStyle(t).width);
                t.style.removeProperty("transition"),
                t.style.width = "100%";
                var n = parseInt(window.getComputedStyle(t).width)
                  , n = parseInt(e / n * 100);
                t.style.removeProperty("transition"),
                t.style.width = "".concat(n, "%")
            }(),
            te.timeout.stop()
    }
    function Gt() {
        if (te.timeout) {
            var t = te.timeout.start();
            return dt(t),
            t
        }
    }
    var te = {}
      , ee = !1
      , ne = {};
    function oe(t) {
        for (var e = t.target; e && e !== document; e = e.parentNode)
            for (var n in ne) {
                var o = e.getAttribute(n);
                if (o)
                    return void ne[n].fire({
                        template: o
                    })
            }
    }
    function ie(t) {
        return Object.prototype.hasOwnProperty.call(se, t)
    }
    function re(t) {
        return ce[t]
    }
    function ae(t) {
        for (var e in t)
            ie(n = e) || W('Unknown parameter "'.concat(n, '"')),
            t.toast && (n = e,
            -1 !== le.indexOf(n) && W('The parameter "'.concat(n, '" is incompatible with toasts'))),
            re(e = e) && v(e, re(e));
        var n
    }
    var se = {
        title: "",
        titleText: "",
        text: "",
        html: "",
        footer: "",
        icon: void 0,
        iconColor: void 0,
        iconHtml: void 0,
        template: void 0,
        toast: !1,
        animation: !0,
        showClass: {
            popup: "swal2-show",
            backdrop: "swal2-backdrop-show",
            icon: "swal2-icon-show"
        },
        hideClass: {
            popup: "swal2-hide",
            backdrop: "swal2-backdrop-hide",
            icon: "swal2-icon-hide"
        },
        customClass: {},
        target: "body",
        backdrop: !0,
        heightAuto: !0,
        allowOutsideClick: !0,
        allowEscapeKey: !0,
        allowEnterKey: !0,
        stopKeydownPropagation: !0,
        keydownListenerCapture: !1,
        showConfirmButton: !0,
        showDenyButton: !1,
        showCancelButton: !1,
        preConfirm: void 0,
        preDeny: void 0,
        confirmButtonText: "OK",
        confirmButtonAriaLabel: "",
        confirmButtonColor: void 0,
        denyButtonText: "No",
        denyButtonAriaLabel: "",
        denyButtonColor: void 0,
        cancelButtonText: "Cancel",
        cancelButtonAriaLabel: "",
        cancelButtonColor: void 0,
        buttonsStyling: !0,
        reverseButtons: !1,
        focusConfirm: !0,
        focusDeny: !1,
        focusCancel: !1,
        showCloseButton: !1,
        closeButtonHtml: "&times;",
        closeButtonAriaLabel: "Close this dialog",
        loaderHtml: "",
        showLoaderOnConfirm: !1,
        showLoaderOnDeny: !1,
        imageUrl: void 0,
        imageWidth: void 0,
        imageHeight: void 0,
        imageAlt: "",
        timer: void 0,
        timerProgressBar: !1,
        width: void 0,
        padding: void 0,
        background: void 0,
        input: void 0,
        inputPlaceholder: "",
        inputLabel: "",
        inputValue: "",
        inputOptions: {},
        inputAutoTrim: !0,
        inputAttributes: {},
        inputValidator: void 0,
        returnInputValueOnDeny: !1,
        validationMessage: void 0,
        grow: !1,
        position: "center",
        progressSteps: [],
        currentProgressStep: void 0,
        progressStepsDistance: void 0,
        onBeforeOpen: void 0,
        onOpen: void 0,
        willOpen: void 0,
        didOpen: void 0,
        onRender: void 0,
        didRender: void 0,
        onClose: void 0,
        onAfterClose: void 0,
        willClose: void 0,
        didClose: void 0,
        onDestroy: void 0,
        didDestroy: void 0,
        scrollbarPadding: !0
    }
      , ue = ["allowEscapeKey", "allowOutsideClick", "background", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "denyButtonAriaLabel", "denyButtonColor", "denyButtonText", "didClose", "didDestroy", "footer", "hideClass", "html", "icon", "iconColor", "iconHtml", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "onAfterClose", "onClose", "onDestroy", "progressSteps", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "showDenyButton", "text", "title", "titleText", "willClose"]
      , ce = {
        animation: 'showClass" and "hideClass',
        onBeforeOpen: "willOpen",
        onOpen: "didOpen",
        onRender: "didRender",
        onClose: "willClose",
        onAfterClose: "didClose",
        onDestroy: "didDestroy"
    }
      , le = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "heightAuto", "keydownListenerCapture"]
      , de = Object.freeze({
        isValidParameter: ie,
        isUpdatableParameter: function(t) {
            return -1 !== ue.indexOf(t)
        },
        isDeprecatedParameter: re,
        argsToParams: function(n) {
            var o = {};
            return "object" !== r(n[0]) || C(n[0]) ? ["title", "html", "icon"].forEach(function(t, e) {
                e = n[e];
                "string" == typeof e || C(e) ? o[t] = e : void 0 !== e && K("Unexpected type of ".concat(t, '! Expected "string" or "Element", got ').concat(r(e)))
            }) : u(o, n[0]),
            o
        },
        isVisible: function() {
            return wt(A())
        },
        clickConfirm: _t,
        clickDeny: function() {
            return L() && L().click()
        },
        clickCancel: function() {
            return q() && q().click()
        },
        getContainer: k,
        getPopup: A,
        getTitle: B,
        getContent: P,
        getHtmlContainer: O,
        getImage: E,
        getIcon: x,
        getInputLabel: function() {
            return t($["input-label"])
        },
        getCloseButton: V,
        getActions: j,
        getConfirmButton: T,
        getDenyButton: L,
        getCancelButton: q,
        getLoader: D,
        getHeader: M,
        getFooter: I,
        getTimerProgressBar: H,
        getFocusableElements: R,
        getValidationMessage: S,
        isLoading: function() {
            return A().hasAttribute("data-loading")
        },
        fire: function() {
            for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++)
                e[n] = arguments[n];
            return i(this, e)
        },
        mixin: function(r) {
            return function(t) {
                !function(t, e) {
                    if ("function" != typeof e && null !== e)
                        throw new TypeError("Super expression must either be null or a function");
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            writable: !0,
                            configurable: !0
                        }
                    }),
                    e && l(t, e)
                }(i, t);
                var n, o, e = (n = i,
                o = d(),
                function() {
                    var t, e = c(n);
                    return p(this, o ? (t = c(this).constructor,
                    Reflect.construct(e, arguments, t)) : e.apply(this, arguments))
                }
                );
                function i() {
                    return a(this, i),
                    e.apply(this, arguments)
                }
                return s(i, [{
                    key: "_main",
                    value: function(t, e) {
                        return f(c(i.prototype), "_main", this).call(this, t, u({}, r, e))
                    }
                }]),
                i
            }(this)
        },
        queue: function(t) {
            var r = this;
            Zt = t;
            function a(t, e) {
                Zt = [],
                t(e)
            }
            var s = [];
            return new Promise(function(i) {
                !function e(n, o) {
                    n < Zt.length ? (document.body.setAttribute("data-swal2-queue-step", n),
                    r.fire(Zt[n]).then(function(t) {
                        void 0 !== t.value ? (s.push(t.value),
                        e(n + 1, o)) : a(i, {
                            dismiss: t.dismiss
                        })
                    })) : a(i, {
                        value: s
                    })
                }(0)
            }
            )
        },
        getQueueStep: Vt,
        insertQueueStep: function(t, e) {
            return e && e < Zt.length ? Zt.splice(e, 0, t) : Zt.push(t)
        },
        deleteQueueStep: function(t) {
            void 0 !== Zt[t] && Zt.splice(t, 1)
        },
        showLoading: Jt,
        enableLoading: Jt,
        getTimerLeft: function() {
            return te.timeout && te.timeout.getTimerLeft()
        },
        stopTimer: Xt,
        resumeTimer: Gt,
        toggleTimer: function() {
            var t = te.timeout;
            return t && (t.running ? Xt : Gt)()
        },
        increaseTimer: function(t) {
            if (te.timeout) {
                t = te.timeout.increase(t);
                return dt(t, !0),
                t
            }
        },
        isTimerRunning: function() {
            return te.timeout && te.timeout.isRunning()
        },
        bindClickHandler: function() {
            ne[0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : "data-swal-template"] = this,
            ee || (document.body.addEventListener("click", oe),
            ee = !0)
        }
    });
    function pe() {
        var t, e;
        Tt.innerParams.get(this) && (t = Tt.domCache.get(this),
        at(t.loader),
        (e = t.popup.getElementsByClassName(t.loader.getAttribute("data-button-to-replace"))).length ? rt(e[0], "inline-block") : wt(T()) || wt(L()) || wt(q()) || at(t.actions),
        bt([t.popup, t.actions], $.loading),
        t.popup.removeAttribute("aria-busy"),
        t.popup.removeAttribute("data-loading"),
        t.confirmButton.disabled = !1,
        t.denyButton.disabled = !1,
        t.cancelButton.disabled = !1)
    }
    function fe() {
        null === tt.previousBodyPadding && document.body.scrollHeight > window.innerHeight && (tt.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")),
        document.body.style.paddingRight = "".concat(tt.previousBodyPadding + function() {
            var t = document.createElement("div");
            t.className = $["scrollbar-measure"],
            document.body.appendChild(t);
            var e = t.getBoundingClientRect().width - t.clientWidth;
            return document.body.removeChild(t),
            e
        }(), "px"))
    }
    function me() {
        return !!window.MSInputMethodContext && !!document.documentMode
    }
    function he() {
        var t = k()
          , e = A();
        t.style.removeProperty("align-items"),
        e.offsetTop < 0 && (t.style.alignItems = "flex-start")
    }
    var ge = function() {
        navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i) || A().scrollHeight > window.innerHeight - 44 && (k().style.paddingBottom = "".concat(44, "px"))
    }
      , ve = function() {
        var e, t = k();
        t.ontouchstart = function(t) {
            e = be(t)
        }
        ,
        t.ontouchmove = function(t) {
            e && (t.preventDefault(),
            t.stopPropagation())
        }
    }
      , be = function(t) {
        var e = t.target
          , n = k();
        return !ye(t) && !we(t) && (e === n || !(ct(n) || "INPUT" === e.tagName || ct(P()) && P().contains(e)))
    }
      , ye = function(t) {
        return t.touches && t.touches.length && "stylus" === t.touches[0].touchType
    }
      , we = function(t) {
        return t.touches && 1 < t.touches.length
    }
      , Ce = {
        swalPromiseResolve: new WeakMap
    };
    function ke(t, e, n, o) {
        n ? Ee(t, o) : ($t().then(function() {
            return Ee(t, o)
        }),
        te.keydownTarget.removeEventListener("keydown", te.keydownHandler, {
            capture: te.keydownListenerCapture
        }),
        te.keydownHandlerAdded = !1),
        e.parentNode && !document.body.getAttribute("data-swal2-queue-step") && e.parentNode.removeChild(e),
        N() && (null !== tt.previousBodyPadding && (document.body.style.paddingRight = "".concat(tt.previousBodyPadding, "px"),
        tt.previousBodyPadding = null),
        _(document.body, $.iosfix) && (e = parseInt(document.body.style.top, 10),
        bt(document.body, $.iosfix),
        document.body.style.top = "",
        document.body.scrollTop = -1 * e),
        "undefined" != typeof window && me() && window.removeEventListener("resize", he),
        g(document.body.children).forEach(function(t) {
            t.hasAttribute("data-previous-aria-hidden") ? (t.setAttribute("aria-hidden", t.getAttribute("data-previous-aria-hidden")),
            t.removeAttribute("data-previous-aria-hidden")) : t.removeAttribute("aria-hidden")
        })),
        bt([document.documentElement, document.body], [$.shown, $["height-auto"], $["no-backdrop"], $["toast-shown"], $["toast-column"]])
    }
    function Ae(t) {
        var e, n, o, i = A();
        i && (t = xe(t),
        (e = Tt.innerParams.get(this)) && !_(i, e.hideClass.popup) && (n = Ce.swalPromiseResolve.get(this),
        bt(i, e.showClass.popup),
        vt(i, e.hideClass.popup),
        o = k(),
        bt(o, e.showClass.backdrop),
        vt(o, e.hideClass.backdrop),
        Be(this, i, e),
        n(t)))
    }
    function xe(t) {
        return void 0 === t ? {
            isConfirmed: !1,
            isDenied: !1,
            isDismissed: !0
        } : u({
            isConfirmed: !1,
            isDenied: !1,
            isDismissed: !1
        }, t)
    }
    function Be(t, e, n) {
        var o = k()
          , i = Bt && lt(e)
          , r = n.onClose
          , a = n.onAfterClose
          , s = n.willClose
          , n = n.didClose;
        Pe(e, s, r),
        i ? Oe(t, e, o, n || a) : ke(t, o, G(), n || a)
    }
    var Pe = function(t, e, n) {
        null !== e && "function" == typeof e ? e(t) : null !== n && "function" == typeof n && n(t)
    }
      , Oe = function(t, e, n, o) {
        te.swalCloseEventFinishedCallback = ke.bind(null, t, n, G(), o),
        e.addEventListener(Bt, function(t) {
            t.target === e && (te.swalCloseEventFinishedCallback(),
            delete te.swalCloseEventFinishedCallback)
        })
    }
      , Ee = function(t, e) {
        setTimeout(function() {
            "function" == typeof e && e(),
            t._destroy()
        })
    };
    function Se(t, e, n) {
        var o = Tt.domCache.get(t);
        e.forEach(function(t) {
            o[t].disabled = n
        })
    }
    function Te(t, e) {
        if (!t)
            return !1;
        if ("radio" === t.type)
            for (var n = t.parentNode.parentNode.querySelectorAll("input"), o = 0; o < n.length; o++)
                n[o].disabled = e;
        else
            t.disabled = e
    }
    var Le = function() {
        function n(t, e) {
            a(this, n),
            this.callback = t,
            this.remaining = e,
            this.running = !1,
            this.start()
        }
        return s(n, [{
            key: "start",
            value: function() {
                return this.running || (this.running = !0,
                this.started = new Date,
                this.id = setTimeout(this.callback, this.remaining)),
                this.remaining
            }
        }, {
            key: "stop",
            value: function() {
                return this.running && (this.running = !1,
                clearTimeout(this.id),
                this.remaining -= new Date - this.started),
                this.remaining
            }
        }, {
            key: "increase",
            value: function(t) {
                var e = this.running;
                return e && this.stop(),
                this.remaining += t,
                e && this.start(),
                this.remaining
            }
        }, {
            key: "getTimerLeft",
            value: function() {
                return this.running && (this.stop(),
                this.start()),
                this.remaining
            }
        }, {
            key: "isRunning",
            value: function() {
                return this.running
            }
        }]),
        n
    }()
      , De = {
        email: function(t, e) {
            return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid email address")
        },
        url: function(t, e) {
            return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid URL")
        }
    };
    function qe(t) {
        var e, n;
        (e = t).inputValidator || Object.keys(De).forEach(function(t) {
            e.input === t && (e.inputValidator = De[t])
        }),
        t.showLoaderOnConfirm && !t.preConfirm && W("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"),
        t.animation = Z(t.animation),
        (n = t).target && ("string" != typeof n.target || document.querySelector(n.target)) && ("string" == typeof n.target || n.target.appendChild) || (W('Target parameter is not valid, defaulting to "body"'),
        n.target = "body"),
        "string" == typeof t.title && (t.title = t.title.split("\n").join("<br />")),
        kt(t)
    }
    function je(t) {
        var e = k()
          , n = A();
        "function" == typeof t.willOpen ? t.willOpen(n) : "function" == typeof t.onBeforeOpen && t.onBeforeOpen(n);
        var o = window.getComputedStyle(document.body).overflowY;
        Je(e, n, t),
        setTimeout(function() {
            Ze(e, n)
        }, 10),
        N() && (Qe(e, t.scrollbarPadding, o),
        g(document.body.children).forEach(function(t) {
            t === k() || function(t, e) {
                if ("function" == typeof t.contains)
                    return t.contains(e)
            }(t, k()) || (t.hasAttribute("aria-hidden") && t.setAttribute("data-previous-aria-hidden", t.getAttribute("aria-hidden")),
            t.setAttribute("aria-hidden", "true"))
        })),
        G() || te.previousActiveElement || (te.previousActiveElement = document.activeElement),
        Ye(n, t),
        bt(e, $["no-transition"])
    }
    function Me(t) {
        var e = A();
        t.target === e && (t = k(),
        e.removeEventListener(Bt, Me),
        t.style.overflowY = "auto")
    }
    function Ie(t, e) {
        t.closePopup({
            isConfirmed: !0,
            value: e
        })
    }
    function He(t, e, n) {
        var o = R();
        if (o.length)
            return (e += n) === o.length ? e = 0 : -1 === e && (e = o.length - 1),
            o[e].focus();
        A().focus()
    }
    var Ve = ["swal-title", "swal-html", "swal-footer"]
      , Re = function(t) {
        var n = {};
        return g(t.querySelectorAll("swal-param")).forEach(function(t) {
            Ke(t, ["name", "value"]);
            var e = t.getAttribute("name")
              , t = t.getAttribute("value");
            "boolean" == typeof se[e] && "false" === t && (t = !1),
            "object" === r(se[e]) && (t = JSON.parse(t)),
            n[e] = t
        }),
        n
    }
      , Ne = function(t) {
        var n = {};
        return g(t.querySelectorAll("swal-button")).forEach(function(t) {
            Ke(t, ["type", "color", "aria-label"]);
            var e = t.getAttribute("type");
            n["".concat(e, "ButtonText")] = t.innerHTML,
            n["show".concat(m(e), "Button")] = !0,
            t.hasAttribute("color") && (n["".concat(e, "ButtonColor")] = t.getAttribute("color")),
            t.hasAttribute("aria-label") && (n["".concat(e, "ButtonAriaLabel")] = t.getAttribute("aria-label"))
        }),
        n
    }
      , Ue = function(t) {
        var e = {}
          , t = t.querySelector("swal-image");
        return t && (Ke(t, ["src", "width", "height", "alt"]),
        t.hasAttribute("src") && (e.imageUrl = t.getAttribute("src")),
        t.hasAttribute("width") && (e.imageWidth = t.getAttribute("width")),
        t.hasAttribute("height") && (e.imageHeight = t.getAttribute("height")),
        t.hasAttribute("alt") && (e.imageAlt = t.getAttribute("alt"))),
        e
    }
      , _e = function(t) {
        var e = {}
          , t = t.querySelector("swal-icon");
        return t && (Ke(t, ["type", "color"]),
        t.hasAttribute("type") && (e.icon = t.getAttribute("type")),
        t.hasAttribute("color") && (e.iconColor = t.getAttribute("color")),
        e.iconHtml = t.innerHTML),
        e
    }
      , Fe = function(t) {
        var n = {}
          , e = t.querySelector("swal-input");
        e && (Ke(e, ["type", "label", "placeholder", "value"]),
        n.input = e.getAttribute("type") || "text",
        e.hasAttribute("label") && (n.inputLabel = e.getAttribute("label")),
        e.hasAttribute("placeholder") && (n.inputPlaceholder = e.getAttribute("placeholder")),
        e.hasAttribute("value") && (n.inputValue = e.getAttribute("value")));
        t = t.querySelectorAll("swal-input-option");
        return t.length && (n.inputOptions = {},
        g(t).forEach(function(t) {
            Ke(t, ["value"]);
            var e = t.getAttribute("value")
              , t = t.innerHTML;
            n.inputOptions[e] = t
        })),
        n
    }
      , ze = function(t, e) {
        var n, o = {};
        for (n in e) {
            var i = e[n]
              , r = t.querySelector(i);
            r && (Ke(r, []),
            o[i.replace(/^swal-/, "")] = r.innerHTML)
        }
        return o
    }
      , We = function(e) {
        var n = Ve.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
        g(e.querySelectorAll("*")).forEach(function(t) {
            t.parentNode === e && (t = t.tagName.toLowerCase(),
            -1 === n.indexOf(t) && W("Unrecognized element <".concat(t, ">")))
        })
    }
      , Ke = function(e, n) {
        g(e.attributes).forEach(function(t) {
            -1 === n.indexOf(t.name) && W(['Unrecognized attribute "'.concat(t.name, '" on <').concat(e.tagName.toLowerCase(), ">."), "".concat(n.length ? "Allowed attributes are: ".concat(n.join(", ")) : "To set the value, use HTML within the element.")])
        })
    }
      , Ye = function(t, e) {
        "function" == typeof e.didOpen ? setTimeout(function() {
            return e.didOpen(t)
        }) : "function" == typeof e.onOpen && setTimeout(function() {
            return e.onOpen(t)
        })
    }
      , Ze = function(t, e) {
        Bt && lt(e) ? (t.style.overflowY = "hidden",
        e.addEventListener(Bt, Me)) : t.style.overflowY = "auto"
    }
      , Qe = function(t, e, n) {
        var o;
        (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && 1 < navigator.maxTouchPoints) && !_(document.body, $.iosfix) && (o = document.body.scrollTop,
        document.body.style.top = "".concat(-1 * o, "px"),
        vt(document.body, $.iosfix),
        ve(),
        ge()),
        "undefined" != typeof window && me() && (he(),
        window.addEventListener("resize", he)),
        e && "hidden" !== n && fe(),
        setTimeout(function() {
            t.scrollTop = 0
        })
    }
      , Je = function(t, e, n) {
        vt(t, n.showClass.backdrop),
        e.style.setProperty("opacity", "0", "important"),
        rt(e),
        setTimeout(function() {
            vt(e, n.showClass.popup),
            e.style.removeProperty("opacity")
        }, 10),
        vt([document.documentElement, document.body], $.shown),
        n.heightAuto && n.backdrop && !n.toast && vt([document.documentElement, document.body], $["height-auto"])
    }
      , $e = function(t) {
        return t.checked ? 1 : 0
    }
      , Xe = function(t) {
        return t.checked ? t.value : null
    }
      , Ge = function(t) {
        return t.files.length ? null !== t.getAttribute("multiple") ? t.files : t.files[0] : null
    }
      , tn = function(e, n) {
        function o(t) {
            return nn[n.input](i, on(t), n)
        }
        var i = P();
        b(n.inputOptions) || w(n.inputOptions) ? (Jt(T()),
        y(n.inputOptions).then(function(t) {
            e.hideLoading(),
            o(t)
        })) : "object" === r(n.inputOptions) ? o(n.inputOptions) : K("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(r(n.inputOptions)))
    }
      , en = function(e, n) {
        var o = e.getInput();
        at(o),
        y(n.inputValue).then(function(t) {
            o.value = "number" === n.input ? parseFloat(t) || 0 : "".concat(t),
            rt(o),
            o.focus(),
            e.hideLoading()
        }).catch(function(t) {
            K("Error in inputValue promise: ".concat(t)),
            o.value = "",
            rt(o),
            o.focus(),
            e.hideLoading()
        })
    }
      , nn = {
        select: function(t, e, i) {
            function o(t, e, n) {
                var o = document.createElement("option");
                o.value = n,
                U(o, e),
                o.selected = rn(n, i.inputValue),
                t.appendChild(o)
            }
            var r = yt(t, $.select);
            e.forEach(function(t) {
                var e, n = t[0], t = t[1];
                Array.isArray(t) ? ((e = document.createElement("optgroup")).label = n,
                e.disabled = !1,
                r.appendChild(e),
                t.forEach(function(t) {
                    return o(e, t[1], t[0])
                })) : o(r, t, n)
            }),
            r.focus()
        },
        radio: function(t, e, i) {
            var r = yt(t, $.radio);
            e.forEach(function(t) {
                var e = t[0]
                  , n = t[1]
                  , o = document.createElement("input")
                  , t = document.createElement("label");
                o.type = "radio",
                o.name = $.radio,
                o.value = e,
                rn(e, i.inputValue) && (o.checked = !0);
                e = document.createElement("span");
                U(e, n),
                e.className = $.label,
                t.appendChild(o),
                t.appendChild(e),
                r.appendChild(t)
            });
            e = r.querySelectorAll("input");
            e.length && e[0].focus()
        }
    }
      , on = function n(o) {
        var i = [];
        return "undefined" != typeof Map && o instanceof Map ? o.forEach(function(t, e) {
            "object" === r(t) && (t = n(t)),
            i.push([e, t])
        }) : Object.keys(o).forEach(function(t) {
            var e = o[t];
            "object" === r(e) && (e = n(e)),
            i.push([t, e])
        }),
        i
    }
      , rn = function(t, e) {
        return e && e.toString() === t.toString()
    }
      , an = function(t, e, n) {
        var o = function(t, e) {
            var n = t.getInput();
            if (!n)
                return null;
            switch (e.input) {
            case "checkbox":
                return $e(n);
            case "radio":
                return Xe(n);
            case "file":
                return Ge(n);
            default:
                return e.inputAutoTrim ? n.value.trim() : n.value
            }
        }(t, e);
        e.inputValidator ? sn(t, e, o) : t.getInput().checkValidity() ? ("deny" === n ? un : cn)(t, e, o) : (t.enableButtons(),
        t.showValidationMessage(e.validationMessage))
    }
      , sn = function(e, n, o) {
        e.disableInput(),
        Promise.resolve().then(function() {
            return y(n.inputValidator(o, n.validationMessage))
        }).then(function(t) {
            e.enableButtons(),
            e.enableInput(),
            t ? e.showValidationMessage(t) : cn(e, n, o)
        })
    }
      , un = function(e, t, n) {
        t.showLoaderOnDeny && Jt(L()),
        t.preDeny ? Promise.resolve().then(function() {
            return y(t.preDeny(n, t.validationMessage))
        }).then(function(t) {
            !1 === t ? e.hideLoading() : e.closePopup({
                isDenied: !0,
                value: void 0 === t ? n : t
            })
        }) : e.closePopup({
            isDenied: !0,
            value: n
        })
    }
      , cn = function(e, t, n) {
        t.showLoaderOnConfirm && Jt(),
        t.preConfirm ? (e.resetValidationMessage(),
        Promise.resolve().then(function() {
            return y(t.preConfirm(n, t.validationMessage))
        }).then(function(t) {
            wt(S()) || !1 === t ? e.hideLoading() : Ie(e, void 0 === t ? n : t)
        })) : Ie(e, n)
    }
      , ln = ["ArrowRight", "ArrowDown", "Right", "Down"]
      , dn = ["ArrowLeft", "ArrowUp", "Left", "Up"]
      , pn = ["Escape", "Esc"]
      , fn = function(t, e, n) {
        var o = Tt.innerParams.get(t);
        o.stopKeydownPropagation && e.stopPropagation(),
        "Enter" === e.key ? mn(t, e, o) : "Tab" === e.key ? hn(e, o) : -1 !== [].concat(ln, dn).indexOf(e.key) ? gn(e.key) : -1 !== pn.indexOf(e.key) && vn(e, o, n)
    }
      , mn = function(t, e, n) {
        e.isComposing || e.target && t.getInput() && e.target.outerHTML === t.getInput().outerHTML && -1 === ["textarea", "file"].indexOf(n.input) && (_t(),
        e.preventDefault())
    }
      , hn = function(t, e) {
        for (var n = t.target, o = R(), i = -1, r = 0; r < o.length; r++)
            if (n === o[r]) {
                i = r;
                break
            }
        t.shiftKey ? He(0, i, -1) : He(0, i, 1),
        t.stopPropagation(),
        t.preventDefault()
    }
      , gn = function(t) {
        -1 !== [T(), L(), q()].indexOf(document.activeElement) && (t = -1 !== ln.indexOf(t) ? "nextElementSibling" : "previousElementSibling",
        (t = document.activeElement[t]) && t.focus())
    }
      , vn = function(t, e, n) {
        Z(e.allowEscapeKey) && (t.preventDefault(),
        n(Q.esc))
    }
      , bn = function(e, t, n) {
        t.popup.onclick = function() {
            var t = Tt.innerParams.get(e);
            t.showConfirmButton || t.showDenyButton || t.showCancelButton || t.showCloseButton || t.timer || t.input || n(Q.close)
        }
    }
      , yn = !1
      , wn = function(e) {
        e.popup.onmousedown = function() {
            e.container.onmouseup = function(t) {
                e.container.onmouseup = void 0,
                t.target === e.container && (yn = !0)
            }
        }
    }
      , Cn = function(e) {
        e.container.onmousedown = function() {
            e.popup.onmouseup = function(t) {
                e.popup.onmouseup = void 0,
                t.target !== e.popup && !e.popup.contains(t.target) || (yn = !0)
            }
        }
    }
      , kn = function(n, o, i) {
        o.container.onclick = function(t) {
            var e = Tt.innerParams.get(n);
            yn ? yn = !1 : t.target === o.container && Z(e.allowOutsideClick) && i(Q.backdrop)
        }
    };
    function An(t, e) {
        var n = function(t) {
            t = "string" == typeof t.template ? document.querySelector(t.template) : t.template;
            if (!t)
                return {};
            t = t.content || t;
            return We(t),
            u(Re(t), Ne(t), Ue(t), _e(t), Fe(t), ze(t, Ve))
        }(t)
          , o = u({}, se.showClass, e.showClass, n.showClass, t.showClass)
          , i = u({}, se.hideClass, e.hideClass, n.hideClass, t.hideClass);
        return (n = u({}, se, e, n, t)).showClass = o,
        n.hideClass = i,
        !1 === t.animation && (n.showClass = {
            popup: "swal2-noanimation",
            backdrop: "swal2-noanimation"
        },
        n.hideClass = {}),
        n
    }
    function xn(a, s, u) {
        return new Promise(function(t) {
            function e(t) {
                a.closePopup({
                    isDismissed: !0,
                    dismiss: t
                })
            }
            var n, o, i, r;
            Ce.swalPromiseResolve.set(a, t),
            s.confirmButton.onclick = function() {
                return e = u,
                (t = a).disableButtons(),
                void (e.input ? an(t, e, "confirm") : cn(t, e, !0));
                var t, e
            }
            ,
            s.denyButton.onclick = function() {
                return e = u,
                (t = a).disableButtons(),
                void (e.returnInputValueOnDeny ? an(t, e, "deny") : un(t, e, !1));
                var t, e
            }
            ,
            s.cancelButton.onclick = function() {
                return t = e,
                a.disableButtons(),
                void t(Q.cancel);
                var t
            }
            ,
            s.closeButton.onclick = function() {
                return e(Q.close)
            }
            ,
            n = a,
            r = s,
            t = e,
            Tt.innerParams.get(n).toast ? bn(n, r, t) : (wn(r),
            Cn(r),
            kn(n, r, t)),
            o = a,
            r = u,
            i = e,
            (t = te).keydownTarget && t.keydownHandlerAdded && (t.keydownTarget.removeEventListener("keydown", t.keydownHandler, {
                capture: t.keydownListenerCapture
            }),
            t.keydownHandlerAdded = !1),
            r.toast || (t.keydownHandler = function(t) {
                return fn(o, t, i)
            }
            ,
            t.keydownTarget = r.keydownListenerCapture ? window : A(),
            t.keydownListenerCapture = r.keydownListenerCapture,
            t.keydownTarget.addEventListener("keydown", t.keydownHandler, {
                capture: t.keydownListenerCapture
            }),
            t.keydownHandlerAdded = !0),
            (u.toast && (u.input || u.footer || u.showCloseButton) ? vt : bt)(document.body, $["toast-column"]),
            r = a,
            "select" === (t = u).input || "radio" === t.input ? tn(r, t) : -1 !== ["text", "email", "number", "tel", "textarea"].indexOf(t.input) && (b(t.inputValue) || w(t.inputValue)) && en(r, t),
            je(u),
            Pn(te, u, e),
            On(s, u),
            setTimeout(function() {
                s.container.scrollTop = 0
            })
        }
        )
    }
    function Bn(t) {
        var e = {
            popup: A(),
            container: k(),
            content: P(),
            actions: j(),
            confirmButton: T(),
            denyButton: L(),
            cancelButton: q(),
            loader: D(),
            closeButton: V(),
            validationMessage: S(),
            progressSteps: n()
        };
        return Tt.domCache.set(t, e),
        e
    }
    var Pn = function(t, e, n) {
        var o = H();
        at(o),
        e.timer && (t.timeout = new Le(function() {
            n("timer"),
            delete t.timeout
        }
        ,e.timer),
        e.timerProgressBar && (rt(o),
        setTimeout(function() {
            t.timeout && t.timeout.running && dt(e.timer)
        })))
    }
      , On = function(t, e) {
        if (!e.toast)
            return Z(e.allowEnterKey) ? void (En(t, e) || He(0, -1, 1)) : Sn()
    }
      , En = function(t, e) {
        return e.focusDeny && wt(t.denyButton) ? (t.denyButton.focus(),
        !0) : e.focusCancel && wt(t.cancelButton) ? (t.cancelButton.focus(),
        !0) : !(!e.focusConfirm || !wt(t.confirmButton)) && (t.confirmButton.focus(),
        !0)
    }
      , Sn = function() {
        document.activeElement && "function" == typeof document.activeElement.blur && document.activeElement.blur()
    };
    function Tn(t) {
        "function" == typeof t.didDestroy ? t.didDestroy() : "function" == typeof t.onDestroy && t.onDestroy()
    }
    function Ln(t) {
        delete t.params,
        delete te.keydownHandler,
        delete te.keydownTarget,
        qn(Tt),
        qn(Ce)
    }
    var Dn, qn = function(t) {
        for (var e in t)
            t[e] = new WeakMap
    }, J = Object.freeze({
        hideLoading: pe,
        disableLoading: pe,
        getInput: function(t) {
            var e = Tt.innerParams.get(t || this);
            return (t = Tt.domCache.get(t || this)) ? et(t.content, e.input) : null
        },
        close: Ae,
        closePopup: Ae,
        closeModal: Ae,
        closeToast: Ae,
        enableButtons: function() {
            Se(this, ["confirmButton", "denyButton", "cancelButton"], !1)
        },
        disableButtons: function() {
            Se(this, ["confirmButton", "denyButton", "cancelButton"], !0)
        },
        enableInput: function() {
            return Te(this.getInput(), !1)
        },
        disableInput: function() {
            return Te(this.getInput(), !0)
        },
        showValidationMessage: function(t) {
            var e = Tt.domCache.get(this)
              , n = Tt.innerParams.get(this);
            U(e.validationMessage, t),
            e.validationMessage.className = $["validation-message"],
            n.customClass && n.customClass.validationMessage && vt(e.validationMessage, n.customClass.validationMessage),
            rt(e.validationMessage),
            (e = this.getInput()) && (e.setAttribute("aria-invalid", !0),
            e.setAttribute("aria-describedBy", $["validation-message"]),
            nt(e),
            vt(e, $.inputerror))
        },
        resetValidationMessage: function() {
            var t = Tt.domCache.get(this);
            t.validationMessage && at(t.validationMessage),
            (t = this.getInput()) && (t.removeAttribute("aria-invalid"),
            t.removeAttribute("aria-describedBy"),
            bt(t, $.inputerror))
        },
        getProgressSteps: function() {
            return Tt.domCache.get(this).progressSteps
        },
        _main: function(t) {
            var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {};
            return ae(u({}, e, t)),
            te.currentInstance && te.currentInstance._destroy(),
            te.currentInstance = this,
            qe(t = An(t, e)),
            Object.freeze(t),
            te.timeout && (te.timeout.stop(),
            delete te.timeout),
            clearTimeout(te.restoreFocusTimeout),
            e = Bn(this),
            Ut(this, t),
            Tt.innerParams.set(this, t),
            xn(this, e, t)
        },
        update: function(e) {
            var t = A()
              , n = Tt.innerParams.get(this);
            if (!t || _(t, n.hideClass.popup))
                return W("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
            var o = {};
            Object.keys(e).forEach(function(t) {
                Mn.isUpdatableParameter(t) ? o[t] = e[t] : W('Invalid parameter to update: "'.concat(t, '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'))
            }),
            n = u({}, n, o),
            Ut(this, n),
            Tt.innerParams.set(this, n),
            Object.defineProperties(this, {
                params: {
                    value: u({}, this.params, e),
                    writable: !1,
                    enumerable: !0
                }
            })
        },
        _destroy: function() {
            var t = Tt.domCache.get(this)
              , e = Tt.innerParams.get(this);
            e && (t.popup && te.swalCloseEventFinishedCallback && (te.swalCloseEventFinishedCallback(),
            delete te.swalCloseEventFinishedCallback),
            te.deferDisposalTimer && (clearTimeout(te.deferDisposalTimer),
            delete te.deferDisposalTimer),
            Tn(e),
            Ln(this))
        }
    }), jn = function() {
        function i() {
            if (a(this, i),
            "undefined" != typeof window) {
                "undefined" == typeof Promise && K("This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)"),
                Dn = this;
                for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++)
                    e[n] = arguments[n];
                var o = Object.freeze(this.constructor.argsToParams(e));
                Object.defineProperties(this, {
                    params: {
                        value: o,
                        writable: !1,
                        enumerable: !0,
                        configurable: !0
                    }
                });
                o = this._main(this.params);
                Tt.promise.set(this, o)
            }
        }
        return s(i, [{
            key: "then",
            value: function(t) {
                return Tt.promise.get(this).then(t)
            }
        }, {
            key: "finally",
            value: function(t) {
                return Tt.promise.get(this).finally(t)
            }
        }]),
        i
    }();
    u(jn.prototype, J),
    u(jn, de),
    Object.keys(J).forEach(function(t) {
        jn[t] = function() {
            if (Dn)
                return Dn[t].apply(Dn, arguments)
        }
    }),
    jn.DismissReason = Q,
    jn.version = "10.15.6";
    var Mn = jn;
    return Mn.default = Mn
}),
void 0 !== this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2);
