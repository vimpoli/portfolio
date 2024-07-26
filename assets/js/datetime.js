function updateDateTime() {
    var topDateTime = document.getElementById("timeAndDate");
    var now = new Date();

    var date = now.toDateString();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var meridiem = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12;

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    var time = hours + ":" + minutes + ":" + seconds + " " + meridiem;

    topDateTime.innerHTML = date + " &nbsp;&mid;&nbsp; " + time;
}
setInterval(updateDateTime, 1000);
updateDateTime();