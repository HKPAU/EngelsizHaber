$(document).ready(function(){
    var ChannelDivNumber    = 1;
    $(".RightClass").click(function(){
        $("#ChannelZone"+ChannelDivNumber).fadeOut(500);
        $("#ChannelZone"+ChannelDivNumber).css({
            "display":"none"
        });
        ChannelDivNumber    = (ChannelDivNumber % 3 ) + 1;

        $("#ChannelZone"+ChannelDivNumber).fadeIn(1000);

    });

    $(".LeftClass").click(function(){
        $("#ChannelZone"+ChannelDivNumber).fadeOut(500);
        $("#ChannelZone"+ChannelDivNumber).css({
            "display":"none"
        });
        if(ChannelDivNumber == 1){
            ChannelDivNumber += 2;
        }else{
            ChannelDivNumber -= 1;
        }


        $("#ChannelZone"+ChannelDivNumber).fadeIn(1000);
    });


    NewsDivNumber   = 1;
    $(".RightClassNews").click(function(){
        $("#NewsZone"+NewsDivNumber).fadeOut(500);
        $("#NewsZone"+NewsDivNumber).css({
            "display":"none"
        });
        
        if(NewsDivNumber == 1){
            NewsDivNumber++;
        }else{
            NewsDivNumber   = 1;
        }
        
        $("#NewsZone"+NewsDivNumber).fadeIn(1000);

    });

    $(".LeftClassNews").click(function(){
        $("#NewsZone"+NewsDivNumber).fadeOut(500);
        $("#NewsZone"+NewsDivNumber).css({
            "display":"none"
        });
        if(NewsDivNumber == 1){
            NewsDivNumber++;
        }else{
            NewsDivNumber   = 1;
        }


        $("#NewsZone"+NewsDivNumber).fadeIn(1000);
    });


    $("#Question1").click(function(){
        $("#Answer1").fadeToggle(500);
    });

    $("#Question2").click(function(){
        $("#Answer2").fadeToggle(500);
    });
    
});
