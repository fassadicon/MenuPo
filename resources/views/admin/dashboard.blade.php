<x-admin.layout :notifs="$adminNotifs">
  <p>Dashboard</p>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
    @import "https://fonts.googleapis.com/css?family=Lato:300,300i,900,900i";
 .txt__normal {
	 font-family: "Lato", sans-serif;
	 font-weight: 400;
}
 .txt__normal--it {
	 font-family: "Lato", sans-serif;
	 font-weight: 400;
	 font-style: italic;
}
 .txt__bold {
	 font-family: "Lato", sans-serif;
	 font-weight: 900;
}
 .txt__bold--it {
	 font-family: "Lato", sans-serif;
	 font-weight: 900;
	 font-style: italic;
}
 .txt__awesome {
	 font: normal normal normal 14px/1 FontAwesome;
}
 body {
	 position: realative;
	 height: 100%;
}
 body.overlay:before {
	 position: fixed;
	 content: "";
	 display: block;
	 top: 0;
	 left: 0;
	 right: 0;
	 bottom: 0;
	 background-color: rgba(0,0,0,0.4);
	 z-index: 100;
}
 html {
	 height: 100%;
	 background: #ffffff;
	 color: #000000;
	 font-size: 14px;
	 font-family: "Lato", sans-serif;
	 font-weight: 400;
}
 .wrapper {
	 position: relative;
	 max-width: 1280px;
	 width: 100%;
	 height: 28px;
	 margin: 0 auto;
}
 a {
	 color: inherit;
	 text-decoration: none;
}
 .u-border-box {
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
}
 .u-transition {
	 transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
}
 .u-transition.long {
	 transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
}
 .u-transition.elastic {
	 transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
	 -webkit-transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
}
 .resetDefaultApparence {
	 -webkit-appearance: none;
	 -moz-appearance: none;
	 -ms-appearance: none;
	 appearance: none;
	 border-radius: 0px;
	 padding: 0;
	 border-width: 0;
	 resize: none;
}
 .resetDefaultApparence::-ms-expand {
	 display: none;
}
 header {
	 position: fixed;
	 height: 80px;
	 width: 100%;
	 z-index: 50;
	 background: #ffffff;
}
 header > .wrapper {
	 display: flex;
	 justify-content: space-between;
	 align-items: center;
	 padding: 0 20px;
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
	 color: #ffffff;
	 letter-spacing: 2px;
	 font-size: 13px;
}
 header > .wrapper a {
	 color: #ffffff;
	 text-decoration: none;
	 margin-left: 10px;
}
 .c-monthyear {
	 display: flex;
     margin-left: 14px;
}
 .c-month {
	 position: relative;
	 height: 80px;
	 line-height: 80px;
     
}
 .c-month #c-paginator {
	 position: relative;
	 width: 200px;
	 display: block;
	 height: 80px;
	 line-height: 80px;
	 text-align: center;
	 overflow: hidden;
}
 .c-month #c-paginator .c-paginator__month {
	 position: absolute;
	 width: 200px;
	 top: 0;
	 bottom: 0;
	 right: 0;
}
 .c-month #c-paginator .c-paginator__month:nth-child(1) {
	 left: 0;
}
 .c-month #c-paginator .c-paginator__month:nth-child(2) {
	 left: 200px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(3) {
	 left: 400px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(4) {
	 left: 600px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(5) {
	 left: 800px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(6) {
	 left: 1000px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(7) {
	 left: 1200px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(8) {
	 left: 1400px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(9) {
	 left: 1600px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(10) {
	 left: 1800px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(11) {
	 left: 2000px;
}
 .c-month #c-paginator .c-paginator__month:nth-child(12) {
	 left: 2200px;
}
 .c-month .prev, .c-month .next {
	 position: absolute;
	 display: block;
	 top: 50%;
	 width: 30px;
	 height: 30px;
	 padding: 9px 12px;
	 background-color: #ffc300;
	 cursor: pointer;
	 z-index: 10;
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
	 transform: translatey(-50%);
	 -webkit-transform: translatey(-50%);
	 border-radius: 50%;
	 -webkit-border-radius: 50%;
	 transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
}
 .c-month .prev.long, .c-month .next.long {
	 transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
}
 .c-month .prev.elastic, .c-month .next.elastic {
	 transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
	 -webkit-transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
}
 .c-month .prev {
	 left: 0;
}
 .c-month .prev:hover {
	 padding: 9px 10px;
	 background-color: #e6b000;
}
 .c-month .next {
	 right: 0;
     color: #ffffff;
}
 .c-month .next:hover {
	 padding: 9px 14px;
	 background-color: 	#e6b000;
}
 .c-paginator__year {
	 height: 80px;
	 line-height: 80px;
	 padding: 0 20px;
}
 .o-btn {
	 display: inline-block;
	 padding: 0 10px;
	 line-height: 30px;
	 height: 30px;
	 background-color: #ffc300;
	 text-transform: uppercase;
	 letter-spacing: 2px;
	 border-radius: 15px;
	 -webkit-border-radius: 15px;
	 transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
}
 .o-btn.long {
	 transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
}
 .o-btn.elastic {
	 transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
	 -webkit-transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
}
 .o-btn span {
	 margin-left: 10px;
}
 .o-btn:hover {
	 background-color: 	#e6b000;
}
 .c-calendar {
	 padding-top: 80px;
	 display: flex;
	 justify-content: space-between;
	 flex-direction: row;
}
 .c-calendar__style {
	 background-color: 	#e6b000b;
	 margin: 20px;
	 padding: 10px;
	 box-shadow: 0 0 30px 0 rgba(0,0,0,0.18);
	 -webkit-box-shadow: 0 0 30px 0 rgba(0,0,0,0.18);
	 border-radius: 6px;
	 -webkit-border-radius: 6px;
}
 .c-cal__container {
	 position: relative;
	 width: calc(100% - 300px);
	 height: 0;
	 padding-bottom: 65%;
	 overflow: hidden;
}
 .c-main {
	 position: absolute;
	 top: 0;
	 left: 0;
	 bottom: 0;
	 right: 0;
	 width: 100%;
	 padding: 10px;
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
}
 .c-main-01 {
	 left: 0;
}
 .c-main-02 {
	 left: 100%;
}
 .c-main-03 {
	 left: 200%;
}
 .c-main-04 {
	 left: 300%;
}
 .c-main-05 {
	 left: 400%;
}
 .c-main-06 {
	 left: 500%;
}
 .c-main-07 {
	 left: 600%;
}
 .c-main-08 {
	 left: 700%;
}
 .c-main-09 {
	 left: 800%;
}
 .c-main-10 {
	 left: 900%;
}
 .c-main-11 {
	 left: 1000%;
}
 .c-main-12 {
	 left: 1100%;
}
 .c-cal__row {
	 display: flex;
	 justify-content: flex-start;
}
 .c-cal__col {
	 width: calc(100% / 7);
	 text-align: center;
	 height: 50px;
	 line-height: 50px;
	 letter-spacing: 2px;
	 text-transform: uppercase;
}
 .c-cal__cel {
	 position: relative;
	 width: calc(100% / 7);
	 text-align: center;
	 cursor: pointer;
	 border-radius: 50%;
	 -webkit-border-radius: 50%;
}
 .c-cal__cel p {
	 position: absolute;
	 margin: 0;
	 top: 50%;
	 left: 50%;
	 width: 40px;
	 height: 40px;
	 line-height: 40px;
	 background: #ffc300;
	 transform: translate(-50%,-50%);
	 -webkit-transform: translate(-50%,-50%);
	 border-radius: 50%;
	 -webkit-border-radius: 50%;
}
 .c-cal__cel::before {
	 content: "";
	 display: block;
	 padding-top: 100%;
}
 .c-cal__cel:nth-child(1) p {
	 background: rgba(215,17,15,0.2);
}
 .c-cal__cel:nth-child(7) p {
	 background: #ffc300;
}
 .c-cal__cel:hover {
	 background-color: #ffe799 !important;
}
 .c-cal__cel:hover p {
	 background: #ffc300 !important;
}
 .c-cal__cel.isSelected {
	 background-color: #ffe799;
}
 .c-cal__cel.isSelected p {
	 background: #ffc300;
}
 .c-cal__cel.isToday {
	 background-color: rgba(245,113,112,0.2);
}
 .c-cal__cel.isToday p {
	 background: rgba(245,113,112,0.4);
}
 .c-cal__cel.other_month {
	 color: rgba(255,255,255,0.2);
}
 .event:before {
	 position: absolute;
	 content: "";
	 display: block;
	 width: 10px;
	 height: 10px;
	 background-color: #f5f5f5;
	 z-index: 10;
	 padding: 0;
	 top: 50%;
	 left: 50%;
	 border-radius: 50%;
	 -webkit-border-radius: 50%;
	 transform: translate(-50%,calc(50% + 10px));
	 -webkit-transform: translate(-50%,calc(50% + 10px));
}
 .event--birthday:before {
	 background-color: #facc2e;
}
 .event--festivity:before {
	 background-color: #10ddc2;
}
 .event--important:before {
	 background-color: #f57170;
}
 .c-aside {
	 width: 300px;
	 padding: 20px;
}
 .c-aside__day {
	 font-size: 28px;
	 margin: 50px 0;
}
 .c-aside__day .c-aside__num {
	 font-family: "Lato", sans-serif;
	 font-weight: 900;
}
 .c-aside__event {
	 position: relative;
	 padding-left: 20px;
	 margin: 20px 0;
}
 .c-aside__event:before {
	 position: absolute;
	 display: block;
	 content: "";
	 width: 16px;
	 height: 16px;
	 left: 0;
	 background-color: #f5f5f5;
	 border-radius: 50%;
	 -webkit-border-radius: 50%;
}
 .c-aside__event--birthday:before {
	 background-color: #facc2e;
}
 .c-aside__event--festivity:before {
	 background-color: #10ddc2;
}
 .c-aside__event--important:before {
	 background-color: #f57170;
}
 .c-event__creator {
	 position: fixed;
	 top: 50%;
	 left: 50%;
	 max-width: 500px;
	 max-height: 510px;
	 width: 100%;
	 height: 100%;
     background: #ffc300;
	 z-index: 100;
	 padding: 20px;
	 visibility: hidden;
	 opacity: 0;
	 transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
	 transform: translate(-50%,-50%) scale(0.9);
	 -webkit-transform: translate(-50%,-50%) scale(0.9);
}
 .c-event__creator.long {
	 transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
	 -webkit-transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
}
 .c-event__creator.elastic {
	 transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
	 -webkit-transition: all 0.25s cubic-bezier(0.175,0.885,0.32,1.275);
}
 .c-event__creator form {
	 display: flex;
	 flex-direction: column;
	 align-items: flex-start;
	 justify-content: space-between;
}
 .c-event__creator.isVisible {
	 transform: translate(-50%,-50%) scale(1);
	 -webkit-transform: translate(-50%,-50%) scale(1);
	 opacity: 1;
	 visibility: visible;
}
 input, textarea, select {
	 -webkit-appearance: none;
	 -moz-appearance: none;
	 -ms-appearance: none;
	 appearance: none;
	 border-radius: 0px;
	 padding: 0;
	 border-width: 0;
	 resize: none;
	 margin: 10px 0;
	 padding: 10px;
	 width: 100%;
	 border-radius: 20px;
	 -webkit-border-radius: 20px;
	 box-sizing: border-box;
	 -moz-box-sizing: border-box;
	 -webkit-box-sizing: border-box;
}
 input::-ms-expand, textarea::-ms-expand, select::-ms-expand {
	 display: none;
}
 input {
	 height: 40px;
}
 

/* Design adjustment */
.c-sort{
    margin-left: 14px;
}

#closemod{
    margin-left: 380px;
    background-color: #ff605c !important;
}

#savemod{
    color: #ffffff;
    background-color: #213559 !important;
}

/* modal */




</style>



<script>
    // fill the month table with column headings
  function day_title(day_name) {
      document.write("<div class='c-cal__col'>" + day_name + "</div>");
    }
    // fills the month table with numbers
  function fill_table(month, month_length, indexMonth) {
      day = 1;
      // begin the new month table
      document.write("<div class='c-main c-main-" + indexMonth + "'>");
      //document.write("<b>"+month+" "+year+"</b>")
  
      // column headings
      document.write("<div class='c-cal__row'>");
      day_title("Sun");
      day_title("Mon");
      day_title("Tue");
      day_title("Wed");
      day_title("Thu");
      day_title("Fri");
      day_title("Sat");
      document.write("</div>");
  
      // pad cells before first day of month
      document.write("<div class='c-cal__row'>");
      for (var i = 1; i < start_day; i++) {
        if (start_day > 7) {
        } else {
          document.write("<div class='c-cal__cel'></div>");
        }
      }
  
      // fill the first week of days
      for (var i = start_day; i < 8; i++) {
        document.write(
          "<div data-day='2022-" +
            indexMonth +
            "-0" +
            day +
            "'class='c-cal__cel'><p>" +
            day +
            "</p></div>"
        );
        day++;
      }
      document.write("</div>");
  
      // fill the remaining weeks
      while (day <= month_length) {
        document.write("<div class='c-cal__row'>");
        for (var i = 1; i <= 7 && day <= month_length; i++) {
          if (day >= 1 && day <= 9) {
            document.write(
              "<div data-day='2022-" +
                indexMonth +
                "-0" +
                day +
                "'class='c-cal__cel'><p>" +
                day +
                "</p></div>"
            );
            day++;
          } else {
            document.write(
              "<div data-day='2022-" +
                indexMonth +
                "-" +
                day +
                "' class='c-cal__cel'><p>" +
                day +
                "</p></div>"
            );
            day++;
          }
        }
        document.write("</div>");
        // the first day of the next month
        start_day = i;
      }
  
      document.write("</div>");
    }
  </script>

<div class="wrapper">
      <div class="c-monthyear">
      <div class="c-month">
          <span id="prev" class="prev fa fa-angle-left" aria-hidden="true"></span>
          <div id="c-paginator">
            <span class="c-paginator__month">JANUARY</span>
            <span class="c-paginator__month">FEBRUARY</span>
            <span class="c-paginator__month">MARCH</span>
            <span class="c-paginator__month">APRIL</span>
            <span class="c-paginator__month">MAY</span>
            <span class="c-paginator__month">JUNE</span>
            <span class="c-paginator__month">JULY</span>
            <span class="c-paginator__month">AUGUST</span>
            <span class="c-paginator__month">SEPTEMBER</span>
            <span class="c-paginator__month">OCTOBER</span>
            <span class="c-paginator__month">NOVEMBER</span>
            <span class="c-paginator__month">DECEMBER</span>
          </div>
          <span id="next" class="next fa fa-angle-right" aria-hidden="true"></span>
        </div>
        <span class="c-paginator__year">2022</span>
      </div>
      <div class="c-sort">
        <a class="o-btn c-today__btn" href="javascript:;">TODAY</a>
      </div>
    </div>

  <div class="wrapper">
    <div class="c-calendar">
      <div class="c-calendar__style c-aside">
        <a class="c-add o-btn js-event__add" href="javascript:;">Add Menu<span class="fa fa-plus"></span></a>
        <div class="c-aside__day">
          <span class="c-aside__num"></span> <span class="c-aside__month"></span>
        </div>
        <div class="c-aside__eventList">
        </div>
      </div>
      <div class="c-cal__container c-calendar__style">
        <script>
        
        // CAHNGE the below variable to the CURRENT YEAR
        year = 2022;
  
        // first day of the week of the new year
        today = new Date("January 1, " + year);
        start_day = today.getDay() + 1;
        fill_table("January", 31, "01");
        fill_table("February", 28, "02");
        fill_table("March", 31, "03");
        fill_table("April", 30, "04");
        fill_table("May", 31, "05");
        fill_table("June", 30, "06");
        fill_table("July", 31, "07");
        fill_table("August", 31, "08");
        fill_table("September", 30, "09");
        fill_table("October", 31, "10");
        fill_table("November", 30, "11");
        fill_table("December", 31, "12");
        </script>
      </div>
    </div>
  
    <div class="c-event__creator c-calendar__style js-event__creator">
      <a href="javascript:;" id="closemod" class="o-btn js-event__close">CLOSE</span></a>
      <form id="addEvent">
        <input placeholder="Food Items" type="text" name="name">
        <input type="date" name="date">
        <textarea placeholder="Notes" name="notes" cols="30" rows="10"></textarea>
        <select name="tags">
            <option value="event">Rice Meal</option>
            <option value="important">Snacks</option>
            <option value="birthday">Beverage</option>
            <option value="festivity">Others</option>
          </select>
      </form>
      <br>
      <a href="javascript:;" id="savemod" class="o-btn js-event__save">SAVE <span class="fa fa-save"></span></a>
    </div>
  </div>


  <script>
    //global variables
var monthEl = $(".c-main");
var dataCel = $(".c-cal__cel");
var dateObj = new Date();
var month = dateObj.getUTCMonth() + 1;
var day = dateObj.getUTCDate();
var year = dateObj.getUTCFullYear();
var monthText = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];
var indexMonth = month;
var todayBtn = $(".c-today__btn");
var addBtn = $(".js-event__add");
var saveBtn = $(".js-event__save");
var closeBtn = $(".js-event__close");
var winCreator = $(".js-event__creator");
var inputDate = $(this).data();
today = year + "-" + month + "-" + day;


// ------ set default events -------
function defaultEvents(dataDay,dataName,dataNotes,classTag){
  var date = $('*[data-day='+dataDay+']');
  date.attr("data-name", dataName);
  date.attr("data-notes", dataNotes);
  date.addClass("event");
  date.addClass("event--" + classTag);
}

defaultEvents('2022-12-25', 'MERRY CHRISTMAS','A lot of gift!!!!','festivity');
defaultEvents('2022-05-04', "LUCA'S BIRTHDAY",'Another gifts...?','birthday');
defaultEvents('2022-03-03', "MY LADY'S BIRTHDAY",'A lot of money to spent!!!!','birthday');


// ------ functions control -------

//button of the current day
todayBtn.on("click", function() {
  if (month < indexMonth) {
    var step = indexMonth % month;
    movePrev(step, true);
  } else if (month > indexMonth) {
    var step = month - indexMonth;
    moveNext(step, true);
  }
});

//higlight the cel of current day
dataCel.each(function() {
  if ($(this).data("day") === today) {
    $(this).addClass("isToday");
    fillEventSidebar($(this));
  }
});

//window event creator
addBtn.on("click", function() {
  winCreator.addClass("isVisible");
  $("body").addClass("overlay");
  dataCel.each(function() {
    if ($(this).hasClass("isSelected")) {
      today = $(this).data("day");
      document.querySelector('input[type="date"]').value = today;
    } else {
      document.querySelector('input[type="date"]').value = today;
    }
  });
});
closeBtn.on("click", function() {
  winCreator.removeClass("isVisible");
  $("body").removeClass("overlay");
});
saveBtn.on("click", function() {
  var inputName = $("input[name=name]").val();
  var inputDate = $("input[name=date]").val();
  var inputNotes = $("textarea[name=notes]").val();
  var inputTag = $("select[name=tags]")
    .find(":selected")
    .text();

  dataCel.each(function() {
    if ($(this).data("day") === inputDate) {
      if (inputName != null) {
        $(this).attr("data-name", inputName);
      }
      if (inputNotes != null) {
        $(this).attr("data-notes", inputNotes);
      }
      $(this).addClass("event");
      if (inputTag != null) {
        $(this).addClass("event--" + inputTag);
      }
      fillEventSidebar($(this));
    }
  });

  winCreator.removeClass("isVisible");
  $("body").removeClass("overlay");
  $("#addEvent")[0].reset();
});

//fill sidebar event info
function fillEventSidebar(self) {
  $(".c-aside__event").remove();
  var thisName = self.attr("data-name");
  var thisNotes = self.attr("data-notes");
  var thisImportant = self.hasClass("event--important");
  var thisBirthday = self.hasClass("event--birthday");
  var thisFestivity = self.hasClass("event--festivity");
  var thisEvent = self.hasClass("event");
  
  switch (true) {
    case thisImportant:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--important'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisBirthday:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--birthday'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisFestivity:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event c-aside__event--festivity'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
    case thisEvent:
      $(".c-aside__eventList").append(
        "<p class='c-aside__event'>" +
        thisName +
        " <span> • " +
        thisNotes +
        "</span></p>"
      );
      break;
   }
};
dataCel.on("click", function() {
  var thisEl = $(this);
  var thisDay = $(this)
  .attr("data-day")
  .slice(8);
  var thisMonth = $(this)
  .attr("data-day")
  .slice(5, 7);

  fillEventSidebar($(this));

  $(".c-aside__num").text(thisDay);
  $(".c-aside__month").text(monthText[thisMonth - 1]);

  dataCel.removeClass("isSelected");
  thisEl.addClass("isSelected");

});

//function for move the months
function moveNext(fakeClick, indexNext) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "-=100%"
    });
    $(".c-paginator__month").css({
      left: "-=100%"
    });
    switch (true) {
      case indexNext:
        indexMonth += 1;
        break;
    }
  }
}
function movePrev(fakeClick, indexPrev) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "+=100%"
    });
    $(".c-paginator__month").css({
      left: "+=100%"
    });
    switch (true) {
      case indexPrev:
        indexMonth -= 1;
        break;
    }
  }
}

//months paginator
function buttonsPaginator(buttonId, mainClass, monthClass, next, prev) {
  switch (true) {
    case next:
      $(buttonId).on("click", function() {
        if (indexMonth >= 2) {
          $(mainClass).css({
            left: "+=100%"
          });
          $(monthClass).css({
            left: "+=100%"
          });
          indexMonth -= 1;
        }
        return indexMonth;
      });
      break;
    case prev:
      $(buttonId).on("click", function() {
        if (indexMonth <= 11) {
          $(mainClass).css({
            left: "-=100%"
          });
          $(monthClass).css({
            left: "-=100%"
          });
          indexMonth += 1;
        }
        return indexMonth;
      });
      break;
  }
}

buttonsPaginator("#next", monthEl, ".c-paginator__month", false, true);
buttonsPaginator("#prev", monthEl, ".c-paginator__month", true, false);

//launch function to set the current month
moveNext(indexMonth - 1, false);

//fill the sidebar with current day
$(".c-aside__num").text(day);
$(".c-aside__month").text(monthText[month - 1]);

  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</x-admin.layout>