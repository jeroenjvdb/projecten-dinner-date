$(document).ready(function(){
    $('#searchForm').on('submit', findDates);
    console.log('ready');
    // $('#searchForm input').on('change', findDates);


    function findDates(e){
        e.preventDefault();
        // console.log(e);
        $('#results').html('');

        var sex = $('#searchForm input[name="sex"]:checked').val();
        console.log('gender: ' + sex);
        var type = $('#searchForm input[name="type"]:checked').val();
        console.log(type);
        var date = $('#searchForm input[name="datum"]').val();
        console.log(date);

        $.ajax({
            type: "POST",
            url: "/dates/find",
            data: {sex: sex, type:type, date:date},
            success: function(data, status){
                console.log(data);
                if(data.length>0){
                    makeSearch(data);
                }else{
                    $('#results').html('<h2>There are no search results.</h2>');
                }
            },
            error: function(data, status){
                console.log(data);
            }
        });

        // $.ajax({
        // 	type: "POST",
        // 	url: '/dates/find',
        // 	data: {distance: distance, type:type, date:date},
        // 	succes: function(data){
        // 		console.log(data);
        // 	}
        // });

    }

    function makeSearch(data){
        console.log('in');
        for(var i = 0; i<data.length; i++)
        {
            console.log(data[i]);

            $('#results').append(searchBlock(data[i]));
        }

    }

    function searchBlock(data)
    {
        console.log(data);
        var baseUrl = document.location.origin;
        var html = '<a class="color-black" href="/dates/show/' +  data["id"]+'">'
        html += '<div class="col-sm-6">';
        html +='<div class="col-sm-6">';

        if(data["photo_url"].indexOf('http')== -1)
        {
            var url = baseUrl +'/'+ data["photo_url"];
        }else{
            var url = data["photo_url"];
        }
        html += '<img src="' + url +'" class="img-responsive max-height-290" alt="'+data["name"]+'">';
        html += '</div> <div class="col-sm-6"> <div class="row"> <div class="col-sm-12">';
        html += '<h4>'+ data["dish_name"] + '</h4>';
        html += '<p>' + data["date"] + '<br>' + data["area"] + '</p>';
        html += '<p>' + data["description"].substring(0,100) + '</p>';
        html += '</div></div></div></div></a>';

        return html;
    }
});