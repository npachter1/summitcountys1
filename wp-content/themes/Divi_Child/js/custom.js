jQuery(document).ready(function($) {
    $('#myButton').on('click', function() {
        $.ajax({
            // url: '/wp-json/custom/v1/data/',
            url: 'https://api.weather.gov/stations/KDEN/observations/latest',
            method: 'GET',
            success: function(response) {
                // Handle the API response here
                var str = "";
                str += 'Station: ' + response['properties']['station'] + '\n';
                str += 'Elevation: ' + response['properties']['elevation']['value'] + 'm\n';
                str += 'Current Weather: ' + response['properties']['textDescription'] + '\n';
                str += 'Current Temp: ' + Math.round(((response['properties']['temperature']['value'] * 9/5) + 32)) + ' degrees (F)' + '\n';
                str += 'Windchill: ' + Math.round(((response['properties']['windChill']['value'] * 9/5) + 32)) + ' degrees (F)' + '\n';
                str += 'Relative HumidityTemp: ' + Math.round(response['properties']['relativeHumidity']['value']) + '%' + '\n';
                if (response['properties']['cloudLayers'][0]) str += 'Cloud Amount: ' + response['properties']['cloudLayers'][0]['amount'] + ' ' + response['properties']['cloudLayers'][0]['base']['value'] + 'm\n';
                if (response['properties']['cloudLayers'][1]) str += 'Cloud Conditions: ' + response['properties']['cloudLayers'][1]['amount'] + ' ' + response['properties']['cloudLayers'][1]['base']['value'] + 'm\n';

                alert (str);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });

        $.ajax({
            url: '/wp-json/custom/v1/data/',
            method: 'GET',
            success: function(response) {
                // Handle the API response here
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });

    });
});