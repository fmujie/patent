<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    {{-- <link href="https://cdn.bootcss.com/limonte-sweetalert2/7.33.1/sweetalert2.css" rel="stylesheet"> --}}
    <title>Document</title>
    <style>
        .moderate_enlarged {
            width: 800px;
        }

        .larger_enlarged {
            width: 1000px;
        }

        .largest_enlarged {
            width: 1200px;
        }
    </style>
</head>

<body>

    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1597772532835&di=aa555f3c290a2dfb64479d832315b1d3&imgtype=0&src=http%3A%2F%2Fa2.att.hudong.com%2F36%2F48%2F19300001357258133412489354717.jpg" alt="" id="ms">
    <script>
        $(document).ready(function () {
            var magiCpurple = 'rgba(0,0,123,0.4)'
            var pureGreen = 'rgba(160,238,225,0.4)'
            var warmPinkRed = 'rgba(236,173,158,0.4)'
            $(document).dblclick(function (el) {
                var elment = $(el.target)
                var tagName = elment.prop('tagName')
                if (tagName == 'IMG') {
                    console.log(elment.attr('src'))
                    imgSrc = elment.attr('src')
                    activateAlert(imgSrc)
                }
            });

            function activateAlert(imgSrc, selectedCriteria = 'moderate_enlarged', ) {
                var imgWidth = 800
                var bg = ''
                var magiCpurple = 'rgba(0,0,123,0.4)'
                var pureGreen = 'rgba(160,238,225,0.4)'
                var warmPinkRed = 'rgba(236,173,158,0.4)'
                switch (selectedCriteria) {
                    case 'moderate_enlarged':
                        imgWidth = 800
                        break
                    case 'larger_enlarged':
                        imgWidth = 1000
                        break
                    case 'largest_enlarged':
                        imgWidth = 1200
                        break
                    default:
                        break
                }
                swal({
                    width: imgWidth,
                    padding: 20,
                    imageUrl: imgSrc,
                    imageClass: selectedCriteria,
                    backdrop: 'rgba(145,196,255,0.4)',
                    showConfirmButton: false,
                })
            }
        });
    </script>
</body>

</html>