    $("#myChart").ready(function() {
        
        //Default Load
        $.post("pages/dashboard", {

            //Parameter get_post
            // tTime: 'year' ,
            // tToday: new Date().getFullYear()

        },function(data, status){
            
            // var tData =JSON.parse(data);
            // var jDatas = tData[0];
            // var sFormat = tData[1];
            // var canvasId = "chartGraph";
            // var pGraph = {};

            console.log(data);
            // callMe(pGraph, canvasId, sFormat); //data, id canvas, selected choix
            
        });
});