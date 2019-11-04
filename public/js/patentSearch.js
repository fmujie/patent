$(document).ready(function () {
    $(function () {

        $('#title').bind('input propertychange', function () {
            $('#title_result').html($(this).attr('name') + '=' + "'" + $(this).val() + "'");
            var data = $(this).val().length;
            if (data == 0) {
                $('#title_result').empty();
            }
        });

        var inputAoptionVal = [
            ['abstract', '#select1'],
            ['demands', '#select2'],
            ['demand', '#select3'],
            ['introduction', '#select4'],
            ['public_number', '#select8'],
            ['ask_number', '#select9'],
            ['priority_number', '#select10'],
            ['ipc_number', '#select11'],
            ['ipc_primary_number', '#select12'],
            ['cpc_number', '#select13'],
            ['loc_number', '#select14'],
            ['origin_name', '#select15'],
            ['present_name', '#select16'],
            // ['origin_name', '#select17'],
            ['present_name_address', '#select18'],
            ['invent_name', '#select19'],
            ['agent_name', '#select20'],
            ['agent_company_name', '#select21']
        ];

        function judgeSelect(currentName) {
            var currentName = currentName;
            var returnSelect;
            for (var i = 0; i < inputAoptionVal.length; i++) {
                returnSelect = inputAoptionVal[i][0];
                if (returnSelect == currentName) {
                    returnSelect = inputAoptionVal[i][1];
                    break;
                }
            }
            return returnSelect;
        }

        function judgeTitle() {
            if ($('#title').val().length != 0) {
                $('#mergeVal').append($('#title_result').text());
                return true;
            } else {
                return false;
            }
        }

        function transferStorage() {
            var transferStr = $('#mergeVal').text();
            $("#submitVal").attr('value', transferStr);
            console.log($("#submitVal").val())
        }

        $('input:text').bind('input propertychange', function () {
            var currentName = $(this).attr('name');
            var idName = '#' + currentName;
            var result = '#' + $(this).attr('name') + '_result';
            var option = '#' + $(this).attr('name') + '_option';
            $(result).html($(this).attr('name') + ' LIKE ' + "'%" + $(this).val() + "%'");
            var select = judgeSelect(currentName);
            var data = $(this).val().length;
            if (data == 0) {
                $(result).empty();
                $(option).empty();
                $(select).val('AND');
            } else {
                $(option).html($(select).val());
                $(select).change(function () {
                    var selVal = $(select).val();
                    if (selVal == "NOT") {
                        $(option).html('AND ' + $(this).val());
                        $(result).html($(idName).attr('name') + ' LIKE ' + '(' + "'%" + $(idName).val() + "%'" + ')');
                    } else {
                        $(option).html($(this).val());
                    }
                });
            }
        });

        function mergeOption() {
            var currentVal;
            var currentResult;
            var currentOption;
            var titleCondition = judgeTitle();
            // console.log(titleCondition);
            for (var i = 0; i < inputAoptionVal.length; i++) {
                currentIdResult = '#' + inputAoptionVal[i][0];
                currentOption = '#' + inputAoptionVal[i][0] + '_option';
                currentResult = '#' + inputAoptionVal[i][0] + '_result';
                currentIdResult = $(currentIdResult).val().length;
                if (currentIdResult != 0) {
                    currentVal = ' ' + $(currentOption).text() + ' ' + $(currentResult).text();
                    $('#mergeVal').append(currentVal);
                } else {
                    continue;
                }
            }
            if (!titleCondition) {
                var endVal = $('#mergeVal').text();
                endVal = endVal.slice(5);
                $('#mergeVal').text(endVal);
            }
            transferStorage();
        }

        $('#clears').click(function () {
            $('span').empty();
            $('select').val('AND');
            $('input:text').val('');
        });

        $('#searchBtn').click(function () {
            mergeOption();
        });
    })
});