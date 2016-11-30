<script>
  var caloriesCalc = function() {
        var context, el, data;

        function init() {
            context = $('BODY');
            el = {
                'table': $('.js-calories-table', context),
                'calc': $('.js-calories-calc', context)
            };
            data = {};
            tableInit();
            calcInit();
        }

        function tableInit() {
            $.extend(el, {
                'tableRows': $('TBODY TR', el.table),
                'tableInputs': $('.js-calories-table-weight-value', el.table),
                'rowCalories': $('.js-calories-table-amount', el.table),
                'resultWeight': $('.js-calories-table-total-w', el.table),
                'resultCalories': $('.js-calories-table-total-c', el.table)
            });

            function updateTableResult() {
                var totalWeight = 0,
                    totalWeightText = '',
                    totalCalories = 0;
                el.tableRows.each(function() {
                    var $that = $(this),
                        rowWeight = parseInt($that.find(el.tableInputs).val(), 10) || 0,
                        rowCalories = parseInt($that.find(el.rowCalories).text(), 10) || 0;
                    totalWeight += rowWeight;
                    totalCalories += rowCalories;
                });
                if (totalWeight > 999) {
                    totalWeight = totalWeight / 1000;
                    totalWeightText = totalWeight.toFixed(1) + ' КГ'
                } else {
                    totalWeightText = totalWeight + ' Г'
                }
                el.resultWeight.text(totalWeightText);
                el.resultCalories.text(totalCalories);
            }
            el.tableInputs.attr('maxlength', 7).on('keyup', function() {
                var $that = $(this),
                    thatValue = $that.val(),
                    thatCalories = parseInt($that.data('cal'), 10) / 100,
                    relRow = $that.closest(el.tableRows),
                    relCalories = relRow.find(el.rowCalories),
                    totalCalories = 0;
                thatValue = parseInt(thatValue, 10) || 0;
                totalCalories = Math.round(thatCalories * thatValue);
                relCalories.text(totalCalories);
                updateTableResult();
            }).on('focusout', function() {
                var $that = $(this),
                    thatVal = parseInt($that.val(), 10);
                if (!thatVal) {
                    $that.val('0');
                }
            });
        }

        function calcInit() {
            $.extend(el, {
                'calcRows': $('.row', el.calc),
                'calcForm': $('> FORM', el.calc),
                'calcItems': $('.row .item', el.calc),
                'calcSubmit': $('.js-submit', el.calc),
                'calcActivitySelect': $('.row.activity SELECT', el.calc),
                'calcResult': $('.js-result', el.calc),
                'calcResultClose': $('.js-result .js-close', el.calc),
                'calcResultTitle': $('.js-result-total', el.calc),
                'calcResultVariant': $('.js-result .variant', el.calc),
                'calcResultVariantCalories': $('.js-variant-calories', el.calc)
            });

            function toggleItem() {
                var $that = $(this),
                    sibItems = $that.siblings(el.calcItems),
                    relRow = $that.closest(el.calcRows);
                if (!relRow.hasClass('data')) {
                    $that.addClass('active');
                    sibItems.removeClass('active');
                }
            }

            function calcWeight() {
                if (el.calcForm.valid()) {
                    var sex            = el.calcRows.filter('.gender').find('.item.active').data('value'),
                        age            = parseInt($('.js-age', el.calc).val(), 10),
                        weight         = parseInt($('.js-weight', el.calc).val(), 10),
                        height         = parseInt($('.js-growth', el.calc).val(), 10),
                        life           = parseFloat(el.calcActivitySelect.val()),
                        whant          = parseInt(el.calcRows.filter('.phys').find('.item.active').data('value'), 10),
                        tableCalories  = parseInt(el.resultCalories.text(), 10),
                        formCalories   = 0,
                        resultCalories = 0,
                        resultPanel;
                    if (sex == 'man') {
                        formCalories = (88.362 + 13.397 * weight + 4.799 * height - 5.677 * age) * life - whant;
                    } else {
                        formCalories = (447.593 + 9.247 * weight + 3.098 * height - 4.330 * age) * life - whant;
                    }
                    formCalories = Math.round(formCalories);
                    resultCalories = Math.round(tableCalories - formCalories);
                    el.calcResultTitle.html(el.calcResultTitle.data('template').replace('[resultCalories]', tableCalories));
                    if (resultCalories >= (formCalories * 0.1 * (-1)) && resultCalories <= (formCalories * 0.1)) {
                        resultPanel = 0;
                    } else if (resultCalories <= (formCalories * 0.3) && resultCalories > 0) {
                        resultPanel = 1;
                    } else if (resultCalories > (formCalories * 0.3)) {
                        resultPanel = 2;
                    } else {
                        resultPanel = 3;
                    }
                    el.calcResultVariantCalories.text(formCalories);
                    el.calcResultVariant.removeClass('active').filter(function() {
                        return $(this).data('var') == resultPanel;
                    }).addClass('active');
                    showResult();
                    return false;
                }
            }

            function showResult() {
                el.calcResult.addClass('active');
            }

            function closeResult() {
                el.calcResult.removeClass('active');
            }
            el.calcItems.on('click', toggleItem);
            el.calcSubmit.on('click', calcWeight);
            el.calcResultClose.on('click', closeResult);
            el.calcActivitySelect.dropkick({
                'theme': 'fullgreen'
            });
            el.calcForm.validate({
                'rules': {
                    'c-age': {
                        'required': true,
                        'digits': true
                    },
                    'c-growth': {
                        'required': true,
                        'digits': true
                    },
                    'c-weight': {
                        'required': true,
                        'digits': true
                    }
                }
            })
        }
        return {
            init: init
        }
    }();
    $(function() {
        caloriesCalc.init();
    });
</script>