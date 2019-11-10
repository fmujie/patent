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
            ['demand', '#select3', ''],
            ['introduction', '#select4'],
            ['ask_begin_date', '#select5'],
            ['ask_over_date', '#select5'],
            ['public_begin_date', '#select6'],
            ['public_over_date', '#select6'],
            ['priority_begin_date', '#select7'],
            ['priority_over_date', '#select7'],
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

        var inputDataVal = [
            ['ask_begin_date', 'ask_over_date', '#select5', 'ask_result'],
            ['public_begin_date', 'public_over_date', '#select6', 'public_result'],
            ['priority_begin_date', 'priority_over_date', '#select7', 'priority_result']
        ]

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
            // console.log($("#submitVal").val());
        }

        function judgeTime(currentIdName) {
            var currentIdName = currentIdName;
            // console.log(currentIdName);
            currentIdNameLen = $(currentIdName).val().length;
            console.log(currentIdName, currentIdNameLen);
            if (currentIdNameLen != 0) {
                // console.log(currentIdNameLen);
                return true;
            } else {
                // console.log(currentIdNameLen);
                return false;
            }
        }

        function mergeOptionTime(condition1, condition2, condition3, condition4) {
            console.log(condition1, condition2, condition3, condition4);
            var res1 = $(condition1).text()
            var res2 = $(condition2).text()
            var currentOptionRest = $(condition3).val();
            // console.log(currentOptionRest);
            console.log(res1, res2);
            var endRes = ' ' + currentOptionRest + '(' + ' ' + res1 + ' ' + 'AND' + ' ' + res2 + ')';
            // console.log(endRes);
            $(condition4).append(endRes);
            console.log($(condition4).text());
            console.log($('#mergeVal').text());
            var resVal = $(condition4).text();
            console.log(endRes);
            $('#mergeVal').append(resVal);
            console.log($('#mergeVal').text());
        }

        function judgeTimeInput(currentName) {
            var currentName = currentName;
            console.log(currentName);
            console.log(inputAoptionVal.length);
            var i = 0;
            for (var j = 0; j < inputDataVal.length; j++) {
                if (currentName == inputDataVal[j][0]) {
                    i = 1;
                    break;
                } else if (currentName == inputDataVal[j][1]) {
                    i = 2;
                    break;
                } else {
                    i = 3;
                    continue;
                }
            }
            return i;
        }

        function mergeOption() {
            var currentVal;
            var currentResult;
            var currentOption;
            var titleCondition = judgeTitle();
            // console.log(titleCondition);
            for (var i = 0; i < inputAoptionVal.length; i++) {
                if ((i == 4) || (i == 5) || (i == 6) || (i == 7) || (i == 8) || (i == 9)) {
                    continue;
                } else {
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
            }
            if (!titleCondition) {
                var endVal = $('#mergeVal').text();
                endVal = endVal.slice(5);
                $('#mergeVal').text(endVal);
            }
            for (var i = 0; i < inputDataVal.length; i++) {
                var condition1 = judgeTime('#' + inputDataVal[i][0]);
                var condition2 = judgeTime('#' + inputDataVal[i][1]);
                var condition3 = inputDataVal[i][2];
                var condition4 = '#' + inputDataVal[i][3];
                console.log(condition1, condition2, condition3, condition4)
                if ((condition1) && (condition2)) {
                    condition1 = '#' + inputDataVal[i][0] + '_result';
                    condition2 = '#' + inputDataVal[i][1] + '_result';
                    console.log(condition1, condition2, condition3, condition4);
                    mergeOptionTime(condition1, condition2, condition3, condition4);
                } else {
                    continue;
                }
            }
            transferStorage();
        }


        $('input').bind('input propertychange', function () {
            var currentName = $(this).attr('name');
            console.log(currentName);
            var TypeOfInput = judgeTimeInput(currentName);
            console.log(TypeOfInput);
            var idName = '#' + currentName;
            var result = '#' + $(this).attr('name') + '_result';
            var option = '#' + $(this).attr('name') + '_option';
            console.log(result, option);
            if (TypeOfInput == 3) {
                $(result).html($(this).attr('name') + ' LIKE ' + "'%" + $(this).val() + "%'");
            } else if (TypeOfInput == 1) {
                $(result).html('(' + $(this).attr('name') + ' >= ' + "'" + $(this).val() + "'" + ')');
            } else {
                $(result).html('(' + $(this).attr('name') + ' <= ' + "'" + $(this).val() + "'" + ')');
            }
            console.log($(result).text(), $(option).text());
            var select = judgeSelect(currentName);
            console.log(select);
            var data = $(this).val().length;
            console.log(data);
            if (data == 0) {
                $(result).empty();
                $(option).empty();
                $(select).val('AND');
            } else {
                $(option).html($(select).val());
                console.log($(option).text());
                $(select).change(function () {
                    var selVal = $(select).val();
                    if (selVal == "NOT") {
                        $(option).html('AND ' + $(this).val());
                        if ((TypeOfInput == 1) || (TypeOfInput == 2)) {
                        } else {
                            $(result).html($(idName).attr('name') + ' LIKE ' + '(' + "'%" + $(idName).val() + "%'" + ')');
                        }
                    } else {
                        $(option).html($(this).val());
                    }
                });
            }
        });

        $('#clears').click(function () {
            $('span').empty();
            $('select').val('AND');
            $('input').val('');
        });

        $('#searchBtn').click(function () {
            mergeOption();
            // console.log()
            // console.log($('#mergeVal').text().length);
            // alert("123");
            // var endResLen = $('#mergeVal').text().length;
            // if (endResLen == 0) {
            //     alert("请完善查询字段信息");
            //     location.reload();
            //     console.log("刷新结束");
            // }
        });
        // $('#mergeOption').click(function () {
        //     mergeOption();
        // });


        $('#mergeOptionTime').click(function () {
            // location.reload();
            mergeOptionTime();
        });

    })
});
