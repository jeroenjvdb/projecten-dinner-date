$(document).ready(function(){
    $('#searchForm').on('submit', findDates);
    console.log('ready');
    $('#searchForm input').on('change', findDates);


    function findDates(e){
        e.preventDefault();
        // console.log(e);

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
                makeSearch(data);
                for(var i = 0; i<data.length; i++)
                {
                    console.log('test');
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
        // console.log(data);
        $('#results').text(' ');
        for(var i = 0; i<data.length; i++)
        {

            $('#results').append(searchBlock(data[i]));
        }

    }

    function searchBlock(data)
    {
        var html = '<div class="col-md-6">';
        html += '<div class="row"><div class="col-md-4">';
        if(data.host.pic ){
            html += '<img src="' + data.host.pic['picture_url'] + '" alt="test" />';
        }
        html += '</div>';
        html += '<div class="col-md-8">';
        html += '<p>' + data.host.surname + ' ' + data.host.name + '</p>';
        html += '<p>' +data.date+'</p>';
        html += '</div></div>';
        return html;
    }
});