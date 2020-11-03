function verificaData(elemento) {
    var valor = elemento.val();
    if (valor != '' || null) {
        arrData = valor.split('/');
        if (arrData.length == 1) {
            M.toast({html: "Data Invalida!", classes: 'rounded'});
            elemento.focus();
            return false;
        }
        switch (arrData[1]) {
            case '01':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '02':
                if (parseInt(arrData[0]) > 29 && parseInt(arrData[2]) % 4 == 0) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;

                } else if (parseInt(arrData[0]) > 28 && parseInt(arrData[2]) % 4 != 0) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '03' || '05' || '07' || '08' || '01':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '10':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '12':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            default :
                if (parseInt(arrData[0]) > 30) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
        }
    }
    return true;
}

var negativo = true;
shift = false;

function moneyMask(elemento) {
    // elemento.val("R$ 0,00");
    valor = elemento.val();
    if (valor == '') {
        elemento.val("R$ 000");
        moneyMask(elemento);

    } else {
        valores = valor.split(" ");
        console.log("Valor 1 = " + valores[0]);
        console.log("Valor 2 = " + valores[1]);
        if (valores[1].toString() == "000") {
            console.log("Veio Zero")
            valor = "R$ 0,00";
        } else {
            console.log("Não veio Zero")
            if (valores[1].charAt(0) == "-") {
                console.log("veio negativo!");
                valores[1] = valores[1].replace("-", "");
                negativo = false;
                valores[0] = "-" + valores[0];
            }
            if (valores[1].length == 4
                && valores[1].charAt(0) == "0") {
                console.log("Primeiro IF");

                valores[1] = valores[1].replace(",", "");
                pedacos = valores[1].substr(0, (valores[1].length - 2)) + "," + valores[1].substr((valores[1].length - 2));
                valor = valores[0] + " " + pedacos.substr(1);
            } else {
                console.log("Primeiro ELSE");
                if (valores[1].length >= 4 && valores[1].charAt(0) != "0") {
                    console.log("SEGUNDO IF");
                    valores[1] = valores[1].replace(",", "");
                    pedacos = valores[1].substr(0, (valores[1].length - 2)) + "," + valores[1].substr((valores[1].length - 2));
                    valor = valores[0] + " " + pedacos;
                } else {
                    console.log("SEGUNDO ELSE");
                    if (valores[1].length < 4) {
                        console.log("TERCEIRO IF");
                        valores[1] = "0" + valores[1];
                        valores[1] = valores[1].replace(",", "");
                        pedacos = valores[1].substr(0, (valores[1].length - 2)) + "," + valores[1].substr((valores[1].length - 2));
                        valor = valores[0] + " " + pedacos;
                    }
                }
            }
        }
        elemento.val(valor);
        elemento.keydown(function (e) {
                if (e.keyCode == 16) {
                    shift = true;
                    return false;
                } else {
                    if (!shift) {
                        return mascaradora(e, elemento);
                    } else {
                        return false;
                    }
                }
            }
        )
        ;
        elemento.keyup(function (e) {
            if (e.keyCode == 16) {
                shift = false;
            }
        });
    }
}


function mascaradora(e, elemento) {
    console.log("Inicio");
    console.log("----------------------------");
    console.log(e.keyCode);
    permitidos = [96, 97, 98, 99, 100, 101, 102, 103, 116, 104, 105, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 8, 43, 107, 187, 45, 109, 189];
    if (!(permitidos.includes(parseInt(e.keyCode)))) {
        console.log("Não permitido" + String.fromCharCode(e.keyCode));
        return false;
    } else {
        lengttoend = 1;
        definezero = 4;
        if (e.keyCode == 8) {
            console.log("backspace");
            lengttoend = 3;
            definezero = 5;
        }
        if (e.keyCode == 43 || e.keyCode == 107 || e.keyCode == 187) {
            if (!negativo) {
                console.log("alternar para positivo");
                valor = elemento.val().replace("-", "");
                elemento.val(valor);
                negativo = true;
            }
            return false;
        } else if (e.keyCode == 45 || e.keyCode == 109 || e.keyCode == 189) {
            if (negativo) {
                console.log("alternar para negativo");
                valor = "-" + elemento.val();
                elemento.val(valor);
                negativo = false;
            }
            return false;
        } else {

            valor = elemento.val();
            valores = valor.split(" ");
            console.log("Valor 1 = " + valores[0]);
            console.log("Valor 2 = " + valores[1]);
            if (valores[1].toString() == "000") {
                console.log("Veio Zero")
                valor = "R$ 0,00";
            } else {
                console.log("Não veio Zero")
                if (valores[1].length == definezero
                    && valores[1].charAt(0) == "0") {
                    console.log("Primeiro IF");

                    valores[1] = valores[1].replace(",", "");
                    pedacos = valores[1].substr(0, (valores[1].length - lengttoend)) + "," + valores[1].substr((valores[1].length - lengttoend));
                    valor = valores[0] + " " + pedacos.substr(1);
                } else {
                    console.log("Primeiro ELSE");
                    if (valores[1].length >= definezero && valores[1].charAt(0) != "0") {
                        console.log("SEGUNDO IF");
                        valores[1] = valores[1].replace(",", "");
                        pedacos = valores[1].substr(0, (valores[1].length - lengttoend)) + "," + valores[1].substr((valores[1].length - lengttoend));
                        valor = valores[0] + " " + pedacos;
                    } else {
                        console.log("SEGUNDO ELSE");
                        if (valores[1].length < definezero) {
                            console.log("TERCEIRO IF");
                            valores[1] = "0" + valores[1].toString();
                            valores[1] = valores[1].replace(",", "");
                            pedacos = valores[1].substr(0, (valores[1].length - lengttoend)) + "," + valores[1].substr((valores[1].length - lengttoend));
                            valor = valores[0] + " " + pedacos;
                        }
                    }
                }
            }

            verifica = valor.split(",");
            if (verifica[1].length < 1) {
                valor = valor.replace(",", "");
                valor = valor.substr(0, valor.length - 1) + "," + valor.substr(valor.length - 1);
            }
            elemento.val(valor);
        }
    }
}


function createDatePicker(elemento) {
    elemento.datepicker({
        defaultDate: new Date(),
        setDefaultDate: true,
        autoClose: true,
        format: 'dd/mm/yyyy',
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok',
            months: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ],
            weekdays: [
                'Domingo',
                'Segunda-Feira',
                'Terça-Feira',
                'Quarta-Feira',
                'Quinta-Feira',
                'Sexta-Feira',
                'Sábado'
            ],
            monthsShort: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ],
            weekdaysShort: [
                'Dom',
                'Seg',
                'Ter',
                'Qua',
                'Qui',
                'Sex',
                'Sáb'
            ],
            weekdaysAbbrev: ['Do', 'Se', 'Te', 'Qa', 'Qi', 'Se', 'Sa']
        }
    });
    var instance = M.Datepicker.getInstance(elemento);
    elemento.focus(function () {
        instance.open();
    });
}

function createDatePickerWithDate(elemento, date) {
    elemento.datepicker({
        defaultDate: date,
        setDefaultDate: true,
        autoClose: true,
        format: 'dd/mm/yyyy',
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok',
            months: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ],
            weekdays: [
                'Domingo',
                'Segunda-Feira',
                'Terça-Feira',
                'Quarta-Feira',
                'Quinta-Feira',
                'Sexta-Feira',
                'Sábado'
            ],
            monthsShort: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ],
            weekdaysShort: [
                'Dom',
                'Seg',
                'Ter',
                'Qua',
                'Qui',
                'Sex',
                'Sáb'
            ],
            weekdaysAbbrev: ['Do', 'Se', 'Te', 'Qa', 'Qi', 'Se', 'Sa']
        }
    });
    var instance = M.Timepicker.getInstance(elemento);
    elemento.focus(function () {
        instance.open();
    });
}

function createTimePicker(elemento) {
    elemento.timepicker({
        i18n: {
            container: 'body',
            cancel: 'Volta',
            clear: 'Limpar',
            done: 'Ok'
        },
        twelveHour: false,
        autoClose: true,
        vibrate: true,
    });
    var instance = M.Timepicker.getInstance(elemento);
    elemento.focus(function () {
        instance.open();
    });
}

function createTimePickerWithTime(elemento, time) {
    elemento.timepicker({
        defaultTime: '15:14',
        i18n: {
            container: 'body',
            cancel: 'Volta',
            clear: 'Limpar',
            done: 'Ok'
        },
        twelveHour: false,
        autoClose: true,
        vibrate: true,
    });
    var instance = M.Timepicker.getInstance(elemento);
    elemento.focus(function () {
        instance.open();
    });
}


var classeAntiga = " ";
var timeout;
var init = 0;

function pulse(elemento, timeMS) {
    if (init == 1) {
        elemento.attr("class", classeAntiga);
        clearTimeout(timeout);
    }
    classeAntiga = elemento.attr("class");
    elemento.attr("class", elemento.attr("class") + " pulse-button");
    init = 1;
    timeout = setTimeout(function () {
        init = 0;
        elemento.attr("class", classeAntiga);
    }, timeMS);
}

function numberMonthForNameMonth(num) {
    switch (num) {
        case 1:
            return 'Jan';
        case 2:
            return 'Fev';
        case 3:
            return 'Mar';
        case 4:
            return 'Abr';
        case 5:
            return 'Mai';
        case 6:
            return 'Jun';
        case 7:
            return 'Jul';
        case 8:
            return 'Ago';
        case 9:
            return 'Set';
        case 10:
            return 'Out';
        case 11:
            return 'Nov';
        case 12:
            return 'Dez';
    }
}

// Para dar o efeito ellipsis nos textos
$(document).ready(function () {
    (function (a) {
        if (typeof define === "function" && define.amd) {
            define(["jquery"], a)
        } else {
            a(jQuery)
        }
    }(function (d) {
        var c = "ellipsis", b = '<span style="white-space: nowrap;">',
            e = {lines: "auto", ellipClass: "ellip", responsive: false};

        function a(h, q) {
            var m = this, w = 0, g = [], k, p, i, f, j, n, s;
            m.$cont = d(h);
            m.opts = d.extend({}, e, q);

            function o() {
                m.text = m.$cont.text();
                m.opts.ellipLineClass = m.opts.ellipClass + "-line";
                m.$el = d('<span class="' + m.opts.ellipClass + '" />');
                m.$el.text(m.text);
                m.$cont.empty().append(m.$el);
                t()
            }

            function t() {
                if (typeof m.opts.lines === "number" && m.opts.lines < 2) {
                    m.$el.addClass(m.opts.ellipLineClass);
                    return
                }
                n = m.$cont.height();
                if (m.opts.lines === "auto" && m.$el.prop("scrollHeight") <= n) {
                    return
                }
                if (!k) {
                    return
                }
                s = d.trim(m.text).split(/\s+/);
                m.$el.html(b + s.join("</span> " + b) + "</span>");
                m.$el.find("span").each(k);
                if (p != null) {
                    u(p)
                }
            }

            function u(x) {
                s[x] = '<span class="' + m.opts.ellipLineClass + '">' + s[x];
                s.push("</span>");
                m.$el.html(s.join(" "))
            }

            if (m.opts.lines === "auto") {
                var r = function (y, A) {
                    var x = d(A), z = x.position().top;
                    j = j || x.height();
                    if (z === f) {
                        g[w].push(x)
                    } else {
                        f = z;
                        w += 1;
                        g[w] = [x]
                    }
                    if (z + j > n) {
                        p = y - g[w - 1].length;
                        return false
                    }
                };
                k = r
            }
            if (typeof m.opts.lines === "number" && m.opts.lines > 1) {
                var l = function (y, A) {
                    var x = d(A), z = x.position().top;
                    if (z !== f) {
                        f = z;
                        w += 1
                    }
                    if (w === m.opts.lines) {
                        p = y;
                        return false
                    }
                };
                k = l
            }
            if (m.opts.responsive) {
                var v = function () {
                    g = [];
                    w = 0;
                    f = null;
                    p = null;
                    m.$el.html(m.text);
                    clearTimeout(i);
                    i = setTimeout(t, 100)
                };
                d(window).on("resize." + c, v)
            }
            o()
        }

        d.fn[c] = function (f) {
            return this.each(function () {
                try {
                    d(this).data(c, (new a(this, f)))
                } catch (g) {
                    if (window.console) {
                        console.error(c + ": " + g)
                    }
                }
            })
        }
    }));

    $('.overflow').ellipsis();
    $('.one-line').ellipsis({lines: 1});
    $('.two-lines').ellipsis({lines: 2});
    $('.box--responsive').ellipsis({responsive: true});
});

function getSaldo() {
    $.ajax({
        url: "../Controle/contaControle.php?function=getSaldoTotal",
        method: "POST",
        success: function (saldo) {
            if (saldo === "") {
                saldo = 0.00;
            }
            if (saldo >= 0) {
                $(".mostrarSaldo").html("R$ <span class='saldo'></span>");
                $(".mostrarSaldo").attr("style", "color: green;");
                $(".saldo").html(saldo).mask("#.###.###.###.###.###.###,##", {reverse: true});
            } else {
                $(".mostrarSaldo").html("R$ - <span class='saldo'></span>");
                $(".mostrarSaldo").attr("style", "color: red;");
                saldo = saldo.replace('-', '');
                $(".saldo").html(saldo).mask("#.###.###.###.###.###.###,##", {reverse: true});
            }
        }
    });
}