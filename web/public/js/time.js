function clock(){
    var currentTime = new Date();
    var currentHours = currentTime.getHours();
    var currentMinutes = currentTime.getMinutes();
    var currentSeconds = currentTime.getSeconds();
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
    $('#hour_min_sec').css({"font-size":"25px","color": "#ffe88b"}).text(currentHours + ':' + currentMinutes + ':' + currentSeconds);
//    $('#hour_min').css({"font-size":"15px","color": "#ffe88b"}).text(currentHours + ':' + currentMinutes);
//    $('#sec').css({"font-size":"15px","color": "#ffe88b"}).text(currentSeconds);
}

//создадим массив дней недели
var days = ['ВОСКРЕСЕНЬЕ', 'ПОНЕДЕЛЬНИК', 'ВТОРНИК', 'СРЕДА', 'ЧЕТВЕРГ', 'ПЯТНИЦА', 'СУББОТА'];
//и массив месяцев по-русски
var months = ['ЯНВАРЯ', 'ФЕВРАЛЯ', 'МАРТА', 'АПРЕЛЯ', 'МАЯ', 'ИЮНЯ', 'ИЮЛЯ',
    'АВГУСТА', 'СЕНТЯБРЯ', 'ОКТЯБРЯ', 'НОЯБРЯ', 'ДЕКАБРЯ'];

$(document).ready(function() {
    var currentTime = new Date();//Получаем текущую дату
    var currentDay = days[currentTime.getDay()];//Вытаскваем из нашего массива текущий день недели
    var currentDate = currentTime.getDate();//День
    var currentMonth = months[currentTime.getMonth()];//Месяц
    var currentYear = currentTime.getFullYear();//Год
//В элемент с id=date выводим текущую дату в красивом формате
    $('#today').css({"color":"#ffe88b"}).text(currentDay);
    $('#date').css({"color":"#ffe88b"}).text(currentDate + ' ' + currentMonth + ' ' + currentYear+'г');
    clock(); //вызываем функцию времени
    window.setInterval(clock, 1000); //вызываем функцию clock() каждую секунду
});
