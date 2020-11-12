// $(document).ready(function(){
//     $(".page-item").click(function(){
//         var page_number = $(this).data('page');
//         var index=-1;
//
//         if(page_number!=="pre" && page_number!=="next")
//         {
//             $(".page-item").removeClass('active');
//             $(this).addClass("active");
//         }
//         else{
//             var count = $("#pagination").children().length;
//             for(var i=0;i<count;i++){
//                 if($("#pagination").children().eq(i).hasClass('active'))
//                 {
//                     index=parseInt($("#pagination").children().eq(i).data('page'));
//                 }
//             }
//
//             if(page_number=="pre" && index>1){
//                 $(".page-item").removeClass('active');
//                 $("#pagination").children().eq(index-1).addClass("active");
//             }
//             else if(page_number=="next" && parseInt($("#pagination").children().eq(index+1).data('page'))!=-1){
//                 $(".page-item").removeClass('active');
//                 $("#pagination").children().eq(index+1).addClass("active");
//             }
//         }
//     });
// });

$('#pagination').bootpag({
    total: Math.ceil(parseInt($("#maxcountbaiviet").val())/3),
    page: 1,
    maxVisible: 5
}).on('page', function(event, num){
    $(".content2").html("Page " + num); // or some ajax content loading...
    var start=3*(num-1);
    var end=3*num - 1;
    $.ajax({
        type: 'POST',
        url: 'frontend/ajax/getbaivietlienquan.php',
        data: {
            start: start,
            end: end
        },
        success: function(data) {
            //console.log(data);

        },
        error: function() {
            // code here
        }
    });
});
$('#pagination').children().addClass("pg-dark flex-center pt-4");
$('#pagination').children().children().addClass("page-item");
$('#pagination').children().children().children().addClass("page-link waves-effect waves-effect");