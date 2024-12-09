<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url("resources/css/imprimir.css"); ?>" media="all">
    <script>
    String.prototype.extenso = function(c) {
        var ex = [
            ["zero", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove", "dez", "onze",
                "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove"
            ],
            ["dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"],
            ["cem", "cento", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos",
                "oitocentos", "novecentos"
            ],
            ["mil", "milhão", "bilhão", "trilhão", "quadrilhão", "quintilhão", "sextilhão", "setilhão",
                "octilhão", "nonilhão", "decilhão", "undecilhão", "dodecilhão", "tredecilhão", "quatrodecilhão",
                "quindecilhão", "sedecilhão", "septendecilhão", "octencilhão", "nonencilhão"
            ]
        ];
        var a, n, v, i, n = this.replace(c ? /[^,\d]/g : /\D/g, "").split(","),
            e = " e ",
            $ = "real",
            d = "centavo",
            sl;
        for (var f = n.length - 1, l, j = -1, r = [], s = [], t = ""; ++j <= f; s = []) {
            j && (n[j] = (("." + n[j]) * 1).toFixed(2).slice(2));
            if (!(a = (v = n[j]).slice((l = v.length) % 3).match(/\d{3}/g), v = l % 3 ? [v.slice(0, l % 3)] : [],
                    v = a ? v.concat(a) : v).length) continue;
            for (a = -1, l = v.length; ++a < l; t = "") {
                if (!(i = v[a] * 1)) continue;
                i % 100 < 20 && (t += ex[0][i % 100]) ||
                    i % 100 + 1 && (t += ex[1][(i % 100 / 10 >> 0) - 1] + (i % 10 ? e + ex[0][i % 10] : ""));
                s.push((i < 100 ? t : !(i % 100) ? ex[2][i == 100 ? 0 : i / 100 >> 0] : (ex[2][i / 100 >> 0] + e +
                        t)) +
                    ((t = l - a - 2) > -1 ? " " + (i > 1 && t > 0 ? ex[3][t].replace("ão", "ões") : ex[3][t]) :
                        ""));
            }
            a = ((sl = s.length) > 1 ? (a = s.pop(), s.join(" ") + e + a) : s.join("") || ((!j && (n[j + 1] * 1 >
                0) || r.length) ? "" : ex[0][0]));
            a && r.push(a + (c ? (" " + (v.join("") * 1 > 1 ? j ? d + "s" : (/0{6,}$/.test(n[0]) ? "de " : "") + $
                .replace("l", "is") : j ? d : $)) : ""));
        }
        return r.join(e);
    }
    </script>
    <script>
    function impressao() {
        window.print();
    }
    </script>

</head>

<body onload="impressao()">
    <div class="pagina">
        <div class="imprimir">
            <div class="table">
                <div class="titulo">
                    <p class="title-lead">NOTA PROMISSÓRIA</p>
                    <p style="margin-left: 10px !important;">Parcela <?= $emprestimo['Parcela_Atual']; ?> de <?= $emprestimo['Numero_Parcelas']; ?></p>
                </div>
                <div class="nota" style="text-align: right;">
                    <p>Nº <b>#<?= $emprestimo['ID_Emprestimo'];?>/<?= date('Y');?>#</b></p>
                </div>
                <div class="data" style="text-align: right;">
                    <p>Vencimento: <?= convertDateYmd($emprestimo['Data_Pagamento'],'-'); ?></p>
                    <p class="valor"><b>R$ <?= number_format($emprestimo['Valor_Emprestimo']+($emprestimo['Valor_Emprestimo']*$emprestimo['Percentual_Juros']/100),2,',','');?></b></p>
                </div>
                <br clear="all" />
                <div>
                    <p>No dia <b class="wordup">

                        <?= date('d',strtotime($emprestimo['Data_Pagamento']));?></b>

                         de <b class="wordup"><?= nomeMes(date('m',strtotime($emprestimo['Data_Pagamento']))); ?></b> 
                         de <b class="ano"> <?= date('Y', strtotime($emprestimo['Data_Pagamento']));?> </b>

                        </b> pagarei por esta única via de <b>NOTA PROMISSÓRIA</b> a <b class="wordup"> <?= $configuracao['Nome_Fantasia'];?>
                        </b> CPF <b class="wordup"><?= $configuracao['CNPJ_CPF'];?> </b> ou á sua ordem a quantia de <b class="wordup">
                            <script>
                            document.write("<?= number_format($emprestimo['Valor_Emprestimo']+($emprestimo['Valor_Emprestimo']*$emprestimo['Percentual_Juros']/100),2,',','');?>".extenso(true));
                            </script>
                        </b>em moeda corrente desse país</p>
                </div>
                <div class="data local">
                    <p>Local de pagamento: 
                    <br><b><?= $configuracao['Cidade'];?> - <?= $configuracao['UF'];?></b></p>
                </div>
                <div class="data emissao">
                    <p>Data da Emissão: <b> 
                    <br><?= date('Y/m/d H:i:s'); ?></b></p>
                </div>
                <div class="footer">
                    <p>Nome do Emitente: <b class="wordup"><?= $emprestimo['Nome_Investidor'];?></b></p>
                    <p>CPF: <b><?= $emprestimo['CPF'];?></b> Endereço: <b class="wordup"><?= $emprestimo['Rua'];?>, <?= $emprestimo['Numero'];?>, <?= $emprestimo['Bairro'];?></b></p>
                    <p class="assinatura">
                        ________________________________________________________________________________<br>Assinatura
                        do Emitente</p>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>