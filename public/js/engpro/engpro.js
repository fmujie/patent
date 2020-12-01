$(document).ready(function () {
    disbtn()
    let isend = false
    let introContain = document.querySelector('#introContain')
    let introText = $("#curIntro").html()
    let durationTime = $("#durationTime").html()
    let lan = $("#iflan").html()
    // console.log(lan)
    if (lan == 'ch') {
        disbtn()
        $("#introContain").css('font-family', "ysyrxk")
        $("#introContain").css('font-size', "28px")
        // $("#introContain").css('text-indent', "2em")
        // console.log($("#introContain").css('text-indent'))
    }
    let data = introText.split('')
    let index = 0
    let interval = (parseFloat(durationTime) * 1000) / data.length
    function writing() {
        var audio = document.getElementById('audio_element');
        if (!audio.paused && index < data.length) {
            introContain.innerHTML += data[index]
            $('#scroll_div').scrollTop( $('#scroll_div')[0].scrollHeight);
            setTimeout(writing.bind(this), interval, ++index)
        }
    }

    function disbtn()
    {
        let explbtn = $("#explbtn")
        explbtn.attr("disabled", true);
        explbtn.removeClass("btn-primary");
        explbtn.addClass("btn-secondary");
    }

    function ablebtn()
    {
        let explbtn = $("#explbtn")
        explbtn.attr("disabled", false);
        explbtn.removeClass("btn-secondary");
        explbtn.addClass("btn-primary");
    }

    function clearnInfor()
    {
        introContain.innerHTML = ''
    }

    $('audio').bind('play', function(){
        if (this.isend) {
            clearnInfor()
        }
        disbtn()
        writing()
    })
    $('audio').bind('pause', function(){
        this.isend = false
        writing(index)
    })
    $('audio').bind('ended', function(){
        index = 0
        this.isend = true
        ablebtn()
    })

});